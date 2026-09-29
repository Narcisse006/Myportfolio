<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Project;
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

    public function store(ContactRequest $request)
    {
        // Honeypot rempli = bot : faux succès, aucun mail envoyé
        if ($request->filled('company_website')) {
            return redirect()
                ->route('home')
                ->withFragment('contact-section')
                ->with('success', 'Message envoyé avec succès ! Je vous réponds dès que possible.');
        }

        $data = $request->validated();

        Contact::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

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
            Mail::to(config('mail.contact_to'))
                ->send(new ContactMail($data));
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
