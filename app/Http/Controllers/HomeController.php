<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
//use Notification;
use App\Notifications\SendEmailNotification;

class HomeController extends Controller
{
    public function sendnotification()
    {
        $user=User::all();

        $details=[
           'greeting'=>"Hi",
           'body'=>'body',
           'actiontext'=>'Subscribe',
           'actionurl'=>'/',
           'lastline'=>'lastline'

        ];

        Notification::send($user, new SendEmailNotification($details));
        dd('done');
    }
}
