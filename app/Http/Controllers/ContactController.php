<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255' ],
            'message' => ['required', 'string']
        ]);

        ContactMessage::create($validated);

        Mail::to('admin@ehb.be')->send(new ContactMail($validated));

        return redirect()->route('contact.index')->with('status','Bericht verzonden!');
    }
}
