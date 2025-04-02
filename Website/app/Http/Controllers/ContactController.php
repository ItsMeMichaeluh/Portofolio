<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; // Hier gaan we een Mail Class voor het bericht maken
use App\Models\SentEmail;
use App\Models\Project;


class ContactController extends Controller
{

    public function sent()
    {
        $sentEmails = SentEmail::latest()->get();
        $projects = Project::where('user_id', auth()->id())->latest()->get();
        return view('contact', compact('projects', 'sentEmails'));
    }


    public function send(Request $request)
    {
        // Validatie van het formulier
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

            // Voeg de e-mail op in de database
    SentEmail::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'message' => $validated['message'],
    ]);

        // Verzenden van het e-mailbericht
        Mail::to('m.kalteren3101@gmail.com')->send(new ContactMail($validated));

        // Terug naar de contactpagina met een succesbericht
        return vieuw('contact')->with('success', 'Bericht verstuurd!');
    }
}
