<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        $menus = Menu::with('dishes')->get();
        return view('fe.contact', compact('menus'));
    }

    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Send an email
        Mail::to('megataste2023@gmail.com') // Replace with the recipient's email address
            ->send(new ContactFormMail($request));

        // Optionally, you can flash a success message or handle the response as needed
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}
