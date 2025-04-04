<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; // Hier gaan we een Mail Class voor het bericht maken
use App\Models\SentEmail;
use App\Models\Project;


class ContactController extends Controller
{

    public function index()
    {
        $sentEmails = SentEmail::latest()->get();
        return view('contact', compact('sentEmails'));
    }

    public function destroy($id){
    $email = SentEmail::findOrFail($id);
    $email->delete();

    return redirect()->back()->with('success', 'E-mail verwijderd.');
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

        // Terug naar de contactpagina met een succesbericht
        return redirect()->route('contact')->with('success', 'Je bericht is verzonden!');
    }
}
