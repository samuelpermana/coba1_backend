<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class TestController extends Controller
{
    public function index()
    {
        $subject = 'Ormawa 1 nambahin di cms contoh';
        $body = 'Ormawa 1 nambahin cms ini ini ini ini dll';

        Mail::to('slobe@gmail.com')->send(new TestMail($subject, $body));
    }
    
}
