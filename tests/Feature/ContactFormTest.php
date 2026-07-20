<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
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

        $response->assertRedirect(route('home').'#contact-section');
        $response->assertSessionHas('success');

        Mail::assertSent(ContactMail::class, function (ContactMail $mail) {
            return $mail->hasTo(config('mail.contact_to'));
        });
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

        $response->assertRedirect(route('home').'#contact-section');
        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
        Mail::assertNothingSent();
    }

    public function test_honeypot_returns_fake_success_without_sending_mail(): void
    {
        Mail::fake();

        $response = $this->from(route('home'))
            ->post(route('contact.store'), $this->validPayload([
                'company_website' => 'https://spam.example',
            ]));

        $response->assertRedirect(route('home').'#contact-section');
        $response->assertSessionHas('success');
        Mail::assertNothingSent();
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

        $response->assertRedirect(route('home').'#contact-section');
        $response->assertSessionHas('error');
    }
}
