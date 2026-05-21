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
        if (app()->environment('production')) {
            $mailer = config('mail.default');
            $resendMissing = $mailer === 'resend' && empty(config('services.resend.key'));

            if ($mailer === 'log' || $resendMissing) {
                report(new \RuntimeException('Configuration mail manquante en production (Resend).'));

                return redirect()
                    ->route('home')
                    ->withFragment('contact-section')
                    ->withInput()
                    ->with('error', 'Le serveur mail n\'est pas configuré (clé Resend manquante sur Render). Contactez-moi sur WhatsApp.');
            }
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
                ->with('error', 'L\'envoi a échoué. Vérifiez la clé Resend (RESEND_KEY) sur Render. Vous pouvez aussi me joindre sur WhatsApp.');
        }

        return redirect()
            ->route('home')
            ->withFragment('contact-section')
            ->with('success', 'Message envoyé avec succès ! Je vous réponds dès que possible.');
    }
}
