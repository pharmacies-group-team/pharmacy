<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function showChat()
    {
        return view('client.chat');
    }
}
