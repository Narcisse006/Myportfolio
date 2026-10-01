<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'subject' => 'Proposition de stage',
            'message' => 'Bonjour, je souhaite échanger sur une opportunité de stage.',
            'company_website' => '',
        ], $overrides);
    }

    public function test_contact_form_sends_mail(): void
    {
        Mail::fake();

        $response = $this->from(route('home'))
            ->post(route('contact.store'), $this->validPayload());

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        Mail::assertSent(ContactMail::class, function (ContactMail $mail) {
            return $mail->hasTo(config('mail.contact.address'));
        });

        $this->assertDatabaseHas(Contact::class, [
            'email' => 'jean@example.com',
            'subject' => 'Proposition de stage',
        ]);
    }

    public function test_contact_form_sends_mail_via_ajax_without_redirect(): void
    {
        Mail::fake();

        $response = $this->postJson(route('contact.store'), $this->validPayload([
            'email' => 'ajax@example.com',
        ]));

        $response->assertOk()
            ->assertJson([
                'ok' => true,
                'message' => 'Message envoyé avec succès ! Je vous réponds dès que possible.',
            ]);

        Mail::assertSent(ContactMail::class);
        $this->assertDatabaseHas(Contact::class, [
            'email' => 'ajax@example.com',
        ]);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        Mail::fake();

        $response = $this->from(route('home'))
            ->post(route('contact.store'), [
                'name' => '',
                'email' => 'not-an-email',
                'subject' => 'ab',
                'message' => 'court',
            ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
        Mail::assertNothingSent();
        $this->assertDatabaseCount(Contact::class, 0);
    }

    public function test_contact_form_validates_via_ajax(): void
    {
        Mail::fake();

        $response = $this->postJson(route('contact.store'), [
            'name' => '',
            'email' => 'bad',
            'subject' => 'ab',
            'message' => 'court',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'ok' => false,
            ])
            ->assertJsonValidationErrors(['name', 'email', 'subject', 'message']);

        Mail::assertNothingSent();
    }

    public function test_contact_form_rejects_an_email_longer_than_255_characters(): void
    {
        Mail::fake();

        $response = $this->postJson(route('contact.store'), [
            'name' => 'Jean',
            'email' => str_repeat('a', 250).'@example.com',
            'subject' => 'Sujet du message',
            'message' => 'Bonjour, ceci est un message assez long.',
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['email']);
        Mail::assertNothingSent();
        $this->assertDatabaseCount(Contact::class, 0);
    }

    public function test_honeypot_returns_fake_success_without_sending_mail(): void
    {
        Mail::fake();

        $response = $this->from(route('home'))
            ->post(route('contact.store'), $this->validPayload([
                'company_website' => 'https://spam.example',
            ]));

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');
        Mail::assertNothingSent();
        $this->assertDatabaseCount(Contact::class, 0);
    }

    public function test_contact_form_is_rate_limited(): void
    {
        Mail::fake();

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('contact.store'), $this->validPayload([
                'email' => "user{$i}@example.com",
            ]))->assertRedirect();
        }

        $response = $this->from(route('home'))
            ->post(route('contact.store'), $this->validPayload([
                'email' => 'limited@example.com',
            ]));

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('error');
    }

    public function test_contact_form_keeps_message_when_mail_fails(): void
    {
        Mail::fake();
        Mail::shouldReceive('mailer')->andReturnSelf();
        Mail::shouldReceive('to')->andReturnSelf();
        Mail::shouldReceive('send')->andThrow(new \RuntimeException('SMTP unavailable'));

        $response = $this->from(route('home'))
            ->post(route('contact.store'), $this->validPayload([
                'email' => 'fail@example.com',
            ]));

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('error');
        $response->assertSessionMissing('success');

        $this->assertDatabaseHas(Contact::class, [
            'email' => 'fail@example.com',
            'subject' => 'Proposition de stage',
        ]);
    }

    public function test_contact_form_falls_back_to_resend_when_smtp_password_missing(): void
    {
        Mail::fake();

        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.password' => null,
            'services.resend.key' => 'test-resend-key',
        ]);

        $response = $this->postJson(route('contact.store'), $this->validPayload([
            'email' => 'fallback@example.com',
        ]));

        $response->assertOk()->assertJson(['ok' => true]);
        Mail::assertSent(ContactMail::class);
        $this->assertDatabaseHas(Contact::class, [
            'email' => 'fallback@example.com',
        ]);
    }

    public function test_section_routes_render_home_page(): void
    {
        foreach (['about', 'projects', 'skills', 'contact'] as $name) {
            $this->get(route($name))->assertOk()->assertSee('NARCISSE OGOUDIKPE', false);
        }
    }
}
