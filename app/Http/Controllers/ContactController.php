<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        return view('pages.contact', [
            'preselectedSubject' => $request->query('subject'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|in:general,sales,support,partnership',
            'message' => 'required|string|max:5000',
        ]);

        ContactSubmission::create($validated);

        return back()->with('success', 'Thank you for your message! We\'ll get back to you within 24 hours.');
    }
}
