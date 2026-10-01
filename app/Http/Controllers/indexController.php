<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class indexController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        return view('index', compact('projects'));
    }

    public function cv()
    {
        return view('cv', [
            'pdfUrl' => asset('CV-Narcisse.pdf'),
            'pageUrl' => route('cv'),
        ]);
    }

    public function store(ContactRequest $request): JsonResponse|RedirectResponse
    {
        $wantsJson = $request->expectsJson() || $request->ajax();

        // Honeypot rempli = bot : faux succès, aucun mail envoyé
        if ($request->filled('company_website')) {
            return $this->contactSuccess(
                $wantsJson,
                'Message envoyé avec succès ! Je vous réponds dès que possible.'
            );
        }

        $data = $request->validated();

        Contact::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        $recipient = config('mail.contact.address');

        if (blank($recipient)) {
            report(new \RuntimeException('MAIL_TO_ADDRESS manquant.'));

            return $this->contactError(
                $wantsJson,
                'L\'envoi est temporairement indisponible. Contactez-moi plutôt sur WhatsApp.'
            );
        }

        $mailer = $this->resolveContactMailer();

        if ($mailer === null) {
            report(new \RuntimeException('Configuration mail manquante pour le formulaire de contact.'));

            return $this->contactError(
                $wantsJson,
                'L\'envoi est temporairement indisponible. Contactez-moi plutôt sur WhatsApp.'
            );
        }

        try {
            Mail::mailer($mailer)
                ->to($recipient)
                ->send(new ContactMail($data));
        } catch (\Throwable $e) {
            report($e);

            $message = 'L\'envoi a échoué. Réessayez plus tard ou contactez-moi sur WhatsApp.';
            if (app()->hasDebugModeEnabled()) {
                $message .= ' ('.$e->getMessage().')';
            }

            return $this->contactError($wantsJson, $message);
        }

        return $this->contactSuccess(
            $wantsJson,
            'Message envoyé avec succès ! Je vous réponds dès que possible.'
        );
    }

    /**
     * Choisit un mailer utilisable. Si SMTP est configuré sans mot de passe
     * mais qu’une clé Resend est présente, bascule sur Resend.
     */
    private function resolveContactMailer(): ?string
    {
        $mailer = (string) config('mail.default');

        if ($mailer === 'smtp' && blank(config('mail.mailers.smtp.password')) && filled(config('services.resend.key'))) {
            $mailer = 'resend';
        }

        if ($mailer === 'resend' && blank(config('services.resend.key'))) {
            return null;
        }

        if ($mailer === 'smtp' && (
            blank(config('mail.mailers.smtp.host'))
            || blank(config('mail.mailers.smtp.username'))
            || blank(config('mail.mailers.smtp.password'))
        )) {
            return null;
        }

        if ($mailer === 'log' && app()->environment('production')) {
            return null;
        }

        return $mailer;
    }

    private function contactSuccess(bool $wantsJson, string $message): JsonResponse|RedirectResponse
    {
        if ($wantsJson) {
            return response()->json([
                'ok' => true,
                'message' => $message,
            ]);
        }

        return redirect()
            ->route('contact')
            ->with('success', $message);
    }

    private function contactError(bool $wantsJson, string $message): JsonResponse|RedirectResponse
    {
        if ($wantsJson) {
            return response()->json([
                'ok' => false,
                'message' => $message,
            ], 422);
        }

        return redirect()
            ->route('contact')
            ->withInput()
            ->with('error', $message);
    }
}
