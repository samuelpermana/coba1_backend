<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function index (){
        $subject = 'Test Subject';
        $body = 'Test Body';

        Mail::to('rritmanto@gmail.com')->send(new TestMail($subject,$body));
    }
}
