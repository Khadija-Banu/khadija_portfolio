<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFromMail;


class ContactPagesController extends Controller
{
    //security
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(){
        $contact_form_data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|min:5',
        ]);
        Mail::to('receipentemail@gmail.com')->send(new ContactFromMail($contact_form_data));
        return redirect()->back()->with('success','Message sent successfully');
        // $contact_form_data = request()->all();
        // Mail::to('                           ')->send(new ContactFromMail($contact_form_data));
        
       }
}
