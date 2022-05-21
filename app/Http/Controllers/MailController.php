<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ActivateDeactivateMail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{

  public function sendDeactivateMail($email)
  {

    $details = [
      'body' => 'لقد تم تعطيل حسابك'
    ];
    \Mail::to($email)->send(new ActivateDeactivateMail($details));
  }

  public function sendactivateMail($email)
  {

    $details = [
      'body' => 'لقد تم تفعيل حسابك'
    ];

    \Mail::to($email)->send(new ActivateDeactivateMail($details));
  }
}