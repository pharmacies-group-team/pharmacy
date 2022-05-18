<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function showChat()
    {
        return view('pharmacy.chat');
    }
}
