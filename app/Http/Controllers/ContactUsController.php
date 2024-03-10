<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\PropertyDetail;

class ContactUsController extends Controller
{
    public function index(){
        $properties = PropertyDetail::all();
        return view('frontend.contact', compact('properties'));
    }

    public function sendEmail(ContactFormRequest $request)
    {
        $validated = $request->validated();

        // Fetch admin email from .env, or use a default value
        $adminEmail = env('ADMIN_EMAIL', 'codebengal@gmail.com');

        // Send email
        Mail::to($adminEmail)->send(new ContactMail($validated));

// Customize the success message
    return back()->with('success', 'Thank you for contacting us, we will soon get back to you!');
}

}
