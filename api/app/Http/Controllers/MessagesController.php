<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class MessagesController extends Controller
{
    public function mail($to_name, $to_email) {
        $name = 'Krunal';
        Mail::to('krunal@appdividend.com')->send(new SendMailable($name));
        return 'Email was sent';
    }

}
