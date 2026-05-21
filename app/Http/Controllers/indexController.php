<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class indexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function cv()
    {
        return view('cv', [
            'pdfUrl' => asset('CV_Narcisse_Ogoudikpe_DevWeb.pdf'),
            'pageUrl' => route('cv'),
        ]);
    }

    public function store(ContactRequest $request)
    {
        if (config('mail.default') === 'log' && app()->environment('production')) {
            report(new \RuntimeException('MAIL_MAILER non configuré en production (mode log actif).'));

            return redirect()
                ->route('home')
                ->withFragment('contact-section')
                ->withInput()
                ->with('error', 'Le serveur mail n\'est pas encore configuré. Contactez-moi sur WhatsApp ou par email directement.');
        }

        try {
            Mail::to('ogoudikpenarcisse@gmail.com')
                ->send(new ContactMail($request->validated()));
        } catch (\Throwable $e) {
            report($e);

            return redirect()
                ->route('home')
                ->withFragment('contact-section')
                ->withInput()
                ->with('error', 'L\'envoi a échoué. Vérifiez la configuration SMTP sur Render (Gmail + mot de passe d\'application). Vous pouvez aussi me joindre sur WhatsApp.');
        }

        return redirect()
            ->route('home')
            ->withFragment('contact-section')
            ->with('success', 'Message envoyé avec succès ! Je vous réponds dès que possible.');
    }
}
