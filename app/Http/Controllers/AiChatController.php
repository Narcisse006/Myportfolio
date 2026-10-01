<?php

namespace App\Http\Controllers;

use App\Models\PortfolioSetting;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AiChatController extends Controller
{
    private const SESSION_KEY = 'ai_chat_history';

    private const MAX_HISTORY = 12;

    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'message' => ['required', 'string', 'min:2', 'max:1000'],
        ], [
            'message.required' => 'Écrivez une question.',
            'message.min' => 'La question est trop courte.',
            'message.max' => 'La question est trop longue (1000 caractères max).',
        ]);

        $userMessage = $this->cleanMessage($data['message']);

        if (mb_strlen($userMessage) < 2) {
            return response()->json([
                'message' => 'Écrivez une question.',
            ], 422);
        }

        $projects = Project::query()
            ->where('is_published', true)
            ->orderBy('order')
            ->get(['title', 'description', 'tech_stack', 'status', 'url', 'github_url']);

        $apiKey = config('services.gemini.key');

        if (filled($apiKey)) {
            $geminiReply = $this->askGemini($apiKey, $userMessage, $projects);

            if ($geminiReply !== null) {
                $this->rememberTurn($userMessage, $geminiReply);

                return $this->chatResponse($userMessage, $geminiReply, 'gemini');
            }
        }

        $localReply = $this->localReply($userMessage, $projects);
        $this->rememberTurn($userMessage, $localReply);

        return $this->chatResponse($userMessage, $localReply, 'local');
    }

    private function chatResponse(string $userMessage, string $reply, string $source): JsonResponse
    {
        $payload = [
            'reply' => $reply,
            'source' => $source,
        ];

        if ($this->shouldOfferContactActions($userMessage, $reply)) {
            $payload['actions_intro'] = 'Vous pouvez contacter Narcisse sur WhatsApp.';
            $payload['actions'] = $this->contactActions();
        }

        return response()->json($payload);
    }

    /**
     * @return list<array{type: string, label: string, url: string, external?: bool}>
     */
    private function contactActions(): array
    {
        return [
            [
                'type' => 'whatsapp',
                'label' => 'Discuter sur WhatsApp',
                'url' => PortfolioSetting::current()->whatsappUrl(),
                'external' => true,
            ],
        ];
    }

    private function shouldOfferContactActions(string $userMessage, string $reply): bool
    {
        $haystack = Str::lower(Str::ascii($userMessage.' '.$reply));

        return $this->matchesAny($haystack, [
            'contact',
            'email',
            'mail',
            'whatsapp',
            'ecrire',
            'joindre',
            'telephone',
            'phone',
            'formulaire',
            'disponib',
            'mission',
            'freelance',
            'collab',
            'tarif',
            'prix',
            'budget',
            'hire',
            'recrut',
            'embauch',
            'wa.me',
            'qui es',
            'qui est',
            'profil',
            'presentation',
            'bonjour',
            'salut',
            'hello',
            'aide',
            'comment puis',
        ]);
    }

    private function askGemini(string $apiKey, string $userMessage, Collection $projects): ?string
    {
        if (! $this->consumeGeminiQuota()) {
            return null;
        }

        $history = session(self::SESSION_KEY, []);

        if (! is_array($history)) {
            $history = [];
        }

        $contents = [];
        foreach ($history as $turn) {
            if (! is_array($turn) || blank($turn['role'] ?? null) || blank($turn['content'] ?? null)) {
                continue;
            }

            $contents[] = [
                'role' => ($turn['role'] === 'assistant') ? 'model' : 'user',
                'parts' => [
                    ['text' => (string) $turn['content']],
                ],
            ];
        }

        $contents[] = [
            'role' => 'user',
            'parts' => [
                ['text' => $userMessage],
            ],
        ];

        $payload = [
            'systemInstruction' => [
                'parts' => [
                    ['text' => $this->systemPrompt($projects)],
                ],
            ],
            'contents' => $contents,
            'generationConfig' => [
                'maxOutputTokens' => 500,
                'temperature' => 0.6,
            ],
        ];

        foreach ($this->geminiModels() as $model) {
            $endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/'
                .rawurlencode($model)
                .':generateContent';

            try {
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-goog-api-key' => $apiKey,
                ])
                    ->timeout(25)
                    ->post($endpoint, $payload);
            } catch (\Throwable $e) {
                report($e);

                continue;
            }

            if (! $response->successful()) {
                report(new \RuntimeException('Gemini HTTP '.$response->status().' ['.$model.']: '.$response->body()));

                continue;
            }

            $reply = $this->extractText($response->json());

            if ($reply !== '') {
                return $reply;
            }
        }

        return null;
    }

    /**
     * @return list<string>
     */
    private function geminiModels(): array
    {
        $configured = (string) config('services.gemini.model', 'gemini-flash-lite-latest');
        $candidates = [
            $configured,
            'gemini-flash-lite-latest',
            'gemini-flash-latest',
            'gemini-3.1-flash-lite-preview',
        ];

        return array_values(array_unique(array_filter($candidates)));
    }

    private function cleanMessage(string $message): string
    {
        $cleaned = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $message) ?? '';

        return trim($cleaned);
    }

    /**
     * Plafond commun à tous les visiteurs, pour ne pas épuiser la clé Gemini.
     * Au-delà, le chat répond avec la FAQ locale.
     */
    private function consumeGeminiQuota(): bool
    {
        $limit = (int) config('services.gemini.daily_limit', 200);

        if ($limit < 1) {
            return false;
        }

        $key = 'ai-chat:gemini:'.now()->toDateString();

        if (RateLimiter::tooManyAttempts($key, $limit)) {
            return false;
        }

        RateLimiter::hit($key, 60 * 60 * 48);

        return true;
    }

    private function localReply(string $message, Collection $projects): string
    {
        $normalized = Str::lower(Str::ascii($message));

        if ($this->matchesAny($normalized, ['projet', 'project', 'realisation', 'portfolio', 'travail', 'app'])) {
            return $this->projectsReply($projects);
        }

        if ($this->matchesAny($normalized, ['competenc', 'stack', 'techno', 'laravel', 'php', 'mysql', 'git', 'skill'])) {
            return 'Stack principale : Laravel, PHP, MySQL et Filament. Narcisse conçoit surtout des backends et des applications métier (stock, suivi, admin, API). Pour le détail, la section Compétences du site liste aussi le front et les outils.';
        }

        if ($this->matchesAny($normalized, ['disponib', 'mission', 'freelance', 'collab', 'embauch', 'recrut', 'hire', 'available'])) {
            return 'Narcisse est disponible pour des missions et des collaborations. Le plus simple : formulaire /contact ou WhatsApp sur le site.';
        }

        if ($this->matchesAny($normalized, ['contact', 'email', 'mail', 'whatsapp', 'ecrire', 'joindre', 'telephone', 'phone'])) {
            $email = (string) config('portfolio.email');
            $settings = PortfolioSetting::current();
            $phones = $settings->phoneBjDisplay().' ou '.$settings->phoneBfDisplay();

            return 'Pour le joindre : formulaire /contact, e-mail '.$email.', téléphone '.$phones.' (le second est aussi sur WhatsApp). Réponse habituelle sous 24–48 h.';
        }

        if ($this->matchesAny($normalized, ['qui es', 'qui est', 'profil', 'propos', 'about', 'narcisse', 'toi', 'presentation', 'bonjour', 'salut', 'hello', 'hey'])) {
            return 'Je suis l’assistant du portfolio de Narcisse OGOUDIKPE, développeur Laravel (Laravel · PHP · MySQL · Filament). Il a fondé Nessium Academy, où il enseigne la programmation. Pose-moi une question sur ses projets, sa stack, sa dispo ou le contact.';
        }

        if ($this->matchesAny($normalized, ['simplon', 'formation', 'etude', 'parcours'])) {
            return 'Narcisse a été formé chez Simplon. Il se concentre sur le développement full-stack Laravel et la livraison d’outils métier concrets.';
        }

        if ($this->matchesAny($normalized, ['tarif', 'prix', 'cout', 'rate', 'budget'])) {
            return 'Pas de grille tarifaire affichée ici. Décris ton besoin via le formulaire /contact ou WhatsApp pour en discuter directement.';
        }

        return 'Je peux parler du profil, des projets publiés, de la stack Laravel/PHP, de la disponibilité et du contact. Reformule ta question, ou passe par /contact / WhatsApp.';
    }

    private function projectsReply(Collection $projects): string
    {
        if ($projects->isEmpty()) {
            return 'Aucun projet publié pour le moment. Tu peux quand même écrire via /contact.';
        }

        $lines = $projects->take(5)->map(function (Project $project): string {
            $stack = is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : '';
            $bits = array_filter([
                $project->title,
                '['.$project->statusLabel().']',
                $stack !== '' ? '· '.$stack : null,
            ]);

            return '- '.implode(' ', $bits);
        })->implode("\n");

        return "Voici les projets publiés :\n{$lines}\nTu peux aussi ouvrir la section Projets du site pour les détails et liens.";
    }

    /**
     * @param  list<string>  $needles
     */
    private function matchesAny(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    private function rememberTurn(string $userMessage, string $reply): void
    {
        $history = session(self::SESSION_KEY, []);

        if (! is_array($history)) {
            $history = [];
        }

        $history[] = ['role' => 'user', 'content' => $userMessage];
        $history[] = ['role' => 'assistant', 'content' => $reply];
        $history = array_slice($history, -self::MAX_HISTORY);
        session([self::SESSION_KEY => $history]);
    }

    private function systemPrompt(Collection $projects): string
    {
        $projectLines = $projects->map(function (Project $project): string {
            $stack = is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : '';
            $status = $project->statusLabel();
            $links = collect([
                $project->url ? 'site: '.$project->url : null,
                $project->github_url ? 'github: '.$project->github_url : null,
            ])->filter()->implode(' · ');

            return sprintf(
                '- %s [%s]%s%s',
                $project->title,
                $status,
                $stack !== '' ? ' · '.$stack : '',
                $links !== '' ? ' ('.$links.')' : ''
            );
        })->implode("\n");

        if ($projectLines === '') {
            $projectLines = '- Aucun projet publié pour le moment.';
        }

        $settings = PortfolioSetting::current();
        $phones = $settings->phoneBjDisplay().' et '.$settings->phoneBfDisplay();
        $address = $settings->addressDisplay();

        return <<<PROMPT
Tu es l’assistant du portfolio de Narcisse OGOUDIKPE, développeur Laravel (Laravel, PHP, MySQL, Filament).
Tu réponds en français, de façon courte, directe et humaine. Pas de jargon inutile.

Profil :
- Il code des applications Laravel pour des problèmes précis : une caisse reliée au stock, un suivi de colis pour le transport.
- Il a fondé Nessium Academy, où il enseigne la programmation.
- Disponible pour des missions et des collaborations.
- Adresse affichée sur le site : {$address}. Ne cite pas de ville, ni un lieu de travail actuel.
- Contact : formulaire /contact, e-mail affiché, téléphones {$phones}. Le second est aussi le WhatsApp.

Projets publiés :
{$projectLines}

Règles :
- Réponds uniquement sur le profil, les compétences, les projets, la disponibilité et comment le contacter.
- Ne invente pas de tarifs, d’expérience corporate, de clients ni de dates.
- Si on te demande quelque chose hors sujet, recentre poliment et propose le formulaire de contact.
- Maximum ~120 mots par réponse.
PROMPT;
    }

    private function extractText(mixed $payload): string
    {
        if (! is_array($payload)) {
            return '';
        }

        $parts = data_get($payload, 'candidates.0.content.parts', []);
        if (! is_array($parts)) {
            return '';
        }

        $chunks = [];
        foreach ($parts as $part) {
            if (is_array($part) && isset($part['text'])) {
                $chunks[] = (string) $part['text'];
            }
        }

        return trim(Str::of(implode("\n", $chunks))->toString());
    }
}
