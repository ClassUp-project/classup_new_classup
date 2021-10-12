<?php

namespace App\Http\Controllers;
use Mail;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Create Contact Form
    public function index(Request $request) {
        return view('contact.contact-form');
      }


    // Store Contact Form data
    public function store(Request $request) {

        // Form validation
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'message' => 'required'
         ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        Mail::send('emails.contact', array(
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('stephripa@gmail.com', 'Admin')->subject($request->get('message'));
        });

        //
        return redirect('contact.contact-form')->with('success', 'C\'est envoyé ! Nous avons bien reçu votre message. On vous répond rapidement dans les 3h.');
    }
}
