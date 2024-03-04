<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendEmail($to, $subject, $body) {
        Mail::to($to)->send(new TestMail($subject, $body));
    }
}
