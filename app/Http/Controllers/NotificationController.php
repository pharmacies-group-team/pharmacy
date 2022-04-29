<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAll()
    {
      $notifications = auth()->user()->unreadNotifications;

      return response($notifications);
    }
}
