<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function markAsRead(): void
    {
        if ($this->read_at !== null) {
            return;
        }

        $this->forceFill(['read_at' => now()])->save();
    }

    public function gmailReplyUrl(): string
    {
        $subject = str_starts_with(mb_strtolower((string) $this->subject), 're:')
            ? (string) $this->subject
            : 'Re: '.$this->subject;

        $body = "Bonjour {$this->name},\n\n\n\n"
            ."----------\n"
            ."Message reçu :\n"
            .$this->message;

        return 'https://mail.google.com/mail/?'.http_build_query([
            'view' => 'cm',
            'fs' => '1',
            'to' => (string) $this->email,
            'su' => $subject,
            'body' => $body,
        ], '', '&', PHP_QUERY_RFC3986);
    }
}
