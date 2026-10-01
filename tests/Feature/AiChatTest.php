<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AiChatTest extends TestCase
{
    public function test_ai_chat_answers_locally_without_api_key(): void
    {
        config(['services.gemini.key' => null]);

        Project::query()->create([
            'title' => 'Gestion de stock',
            'description' => 'Caisse et stock Laravel.',
            'tech_stack' => ['Laravel', 'MySQL'],
            'order' => 1,
            'is_published' => true,
            'status' => 'testing',
        ]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Quels sont tes projets Laravel ?',
        ]);

        $response->assertOk();
        $response->assertJsonPath('source', 'local');
        $response->assertJsonFragment(['reply' => $response->json('reply')]);
        $this->assertStringContainsString('Gestion de stock', (string) $response->json('reply'));
        $this->assertEquals(2, count(session('ai_chat_history')));
    }

    public function test_ai_chat_proxies_gemini_and_keeps_history(): void
    {
        config([
            'services.gemini.key' => 'test-key',
            'services.gemini.model' => 'gemini-flash-lite-latest',
        ]);

        Project::query()->create([
            'title' => 'Gestion de stock',
            'description' => 'Caisse et stock Laravel.',
            'tech_stack' => ['Laravel', 'MySQL'],
            'order' => 1,
            'is_published' => true,
            'status' => 'testing',
        ]);

        Http::fake([
            'generativelanguage.googleapis.com/*' => Http::response([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'Narcisse a livré une app de gestion de stock en Laravel.'],
                            ],
                        ],
                    ],
                ],
            ], 200),
        ]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Parle-moi de tes projets.',
        ]);

        $response->assertOk();
        $response->assertJson([
            'reply' => 'Narcisse a livré une app de gestion de stock en Laravel.',
            'source' => 'gemini',
        ]);

        $this->assertEquals(2, count(session('ai_chat_history')));

        Http::assertSent(function ($request) {
            $body = $request->data();
            $system = (string) data_get($body, 'systemInstruction.parts.0.text', '');
            $firstUser = (string) data_get($body, 'contents.0.parts.0.text', '');

            return str_contains($request->url(), 'generativelanguage.googleapis.com')
                && str_contains($request->url(), 'gemini-flash-lite-latest:generateContent')
                && ($request->header('x-goog-api-key')[0] ?? null) === 'test-key'
                && str_contains($system, 'Gestion de stock')
                && $firstUser === 'Parle-moi de tes projets.';
        });
    }

    public function test_ai_chat_falls_back_to_local_when_gemini_fails(): void
    {
        config([
            'services.gemini.key' => 'test-key',
            'services.gemini.model' => 'gemini-flash-lite-latest',
        ]);

        Http::fake([
            'generativelanguage.googleapis.com/*' => Http::response([
                'error' => [
                    'message' => 'This model is currently experiencing high demand.',
                    'status' => 'UNAVAILABLE',
                ],
            ], 503),
        ]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Bonjour, qui es-tu ?',
        ]);

        $response->assertOk();
        $response->assertJsonPath('source', 'local');
        $this->assertStringContainsString('Narcisse', (string) $response->json('reply'));
    }

    public function test_ai_chat_includes_contact_actions_when_relevant(): void
    {
        config(['services.gemini.key' => null]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Comment te contacter ?',
        ]);

        $response->assertOk();
        $response->assertJsonPath('source', 'local');
        $response->assertJsonPath('actions_intro', 'Vous pouvez contacter Narcisse sur WhatsApp.');
        $response->assertJsonPath('actions.0.type', 'whatsapp');
        $response->assertJsonPath('actions.0.label', 'Discuter sur WhatsApp');
        $response->assertJsonMissingPath('actions.1');
        $this->assertSame(
            (string) config('portfolio.whatsapp.url'),
            (string) $response->json('actions.0.url')
        );
    }

    public function test_ai_chat_offers_whatsapp_after_who_are_you(): void
    {
        config(['services.gemini.key' => null]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Qui es-tu ?',
        ]);

        $response->assertOk();
        $response->assertJsonPath('actions.0.type', 'whatsapp');
        $response->assertJsonPath('actions_intro', 'Vous pouvez contacter Narcisse sur WhatsApp.');
    }

    public function test_ai_chat_omits_contact_actions_for_project_questions(): void
    {
        config(['services.gemini.key' => null]);

        Project::query()->create([
            'title' => 'Gestion de stock',
            'description' => 'Caisse et stock Laravel.',
            'tech_stack' => ['Laravel', 'MySQL'],
            'order' => 1,
            'is_published' => true,
            'status' => 'testing',
        ]);

        $response = $this->postJson(route('ai.chat'), [
            'message' => 'Quels sont tes projets Laravel ?',
        ]);

        $response->assertOk();
        $response->assertJsonMissingPath('actions');
    }

    public function test_ai_chat_validates_message(): void
    {
        config(['services.gemini.key' => 'test-key']);

        $this->postJson(route('ai.chat'), [
            'message' => 'a',
        ])->assertStatus(422)->assertJsonValidationErrors(['message']);
    }

    public function test_home_includes_ai_chat_without_exposing_api_key(): void
    {
        config(['services.gemini.key' => 'secret-should-not-leak']);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('id="ai-chat"', false);
        $response->assertSee(route('ai.chat'), false);
        $response->assertSee('Assistant Narcisse', false);
        $response->assertSee('ironman-hero-480.webp', false);
        $response->assertSee('ai-chat__presence', false);
        $response->assertSee('Écrivez votre message...', false);
        $response->assertDontSee('ai-chat__action--whatsapp', false);
        $response->assertDontSee('secret-should-not-leak');
        $response->assertDontSee('GEMINI_API_KEY');
        $response->assertDontSee('ANTHROPIC_API_KEY');
    }
}
