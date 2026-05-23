<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

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

        return redirect()->route('contact.index')->with('status','Bericht verzonden!');
    }
}
