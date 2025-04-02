<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; // Hier gaan we een Mail Class voor het bericht maken
use App\Models\SentEmail;


class ContactController extends Controller
{
    // We tonen het formulier
    public function index()
    {
        return view('contact');
    }

    // We verwerken het formulier en sturen de e-mail
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
        return back()->with('success', 'Bericht verstuurd!');
    }
}
