<?php

namespace App\Http\Controllers;

use App\Mail\ActivateDeactivateMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
  //********* send Mail When Deactivate user *********//
  public function sendDeactivateMail($email)
  {
    $details = [ 'body' => 'لقد تم إيقاف حسابك لسببٍ ما، يرجى التواصل معنا لتفعيل الحساب ...' ];
    Mail::to($email)->send(new ActivateDeactivateMail($details));
  }

  //********* send Mail When activate user *********//
  public function sendactivateMail($email)
  {
    $details = ['body' => 'لقد تم تفعيل حسابك، مرحباً بك في صيدلية أونلاين ...'];
    Mail::to($email)->send(new ActivateDeactivateMail($details));
  }
}
