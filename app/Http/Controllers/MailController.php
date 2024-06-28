<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
use Illuminate\Support\Str;

class MailController extends Controller
{
public function sendEmail($to, $subject, $body) {
    $messageId = Str::random(32) . '@' . gethostname();

    $headers = [
      'In-Reply-To' => '',
      'References' => '',
      'Message-ID' => $messageId,
    ];

    Mail::to($to)->send(new TestMail($subject, $body), $headers);
}
}
