<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRulFormRequest;
use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function store(ContactRulFormRequest $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->msg = $request->msg;
        $message->save();
        $malla =  new ContactMail($message);
        Mail::to(config('admail.admin-mail'))->send($malla);
        flashy('Merci! '.$request->name.', nous vous contacterons dans de bref delai');
        return view('home0');
    }
}
