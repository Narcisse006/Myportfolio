<?php

namespace Tests\Feature;

use App\Models\Contact;
use Tests\TestCase;

class ContactGmailReplyTest extends TestCase
{
    public function test_gmail_reply_url_contains_recipient_and_subject(): void
    {
        $contact = Contact::query()->create([
            'name' => 'Alice Doe',
            'email' => 'alice@example.com',
            'subject' => 'Mission Laravel',
            'message' => "Bonjour,\nje souhaite collaborer.",
        ]);

        $url = $contact->gmailReplyUrl();

        $this->assertStringContainsString('https://mail.google.com/mail/?', $url);
        $this->assertStringContainsString('to=alice%40example.com', $url);
        $this->assertStringContainsString('su=Re%3A%20Mission%20Laravel', $url);
        $this->assertStringContainsString('Alice%20Doe', $url);
        $this->assertStringContainsString('view=cm', $url);
        $this->assertStringContainsString('fs=1', $url);
    }

    public function test_gmail_reply_url_keeps_existing_re_prefix(): void
    {
        $contact = new Contact([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'subject' => 'Re: Suite',
            'message' => 'Suite du message',
        ]);

        $this->assertStringContainsString('su=Re%3A%20Suite', $contact->gmailReplyUrl());
        $this->assertStringNotContainsString('su=Re%3A%20Re%3A', $contact->gmailReplyUrl());
    }
}
