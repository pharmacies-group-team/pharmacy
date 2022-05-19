<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
  // get all users
  public function getUsers(Request $request)
  {
    // TODO remove $request->query;
    $from = Auth::id() ?? $request->query('from');

    $usersMessageToList = DB::table('messages')
      ->where('from', $from)
      ->select('to')->groupBy('to')->get();


    $users = [];

    foreach ($usersMessageToList as $key) {
      $user = User::find($key->to);

      // last message
      $user['last_message'] = Message::where('to', $user->id)->latest()->first();

      // unread message
      $user['unread_message'] = Message::where(['is_read' => 0, 'to' => $user->id])
        ->count();

      $users[] = $user;
    }

    return $users;
  }

  // get all user Messages
  public function getUserMessages(Request $request, $to_user_id)
  {
    // remove $request->query()
    $from_user_id = Auth::id() ?? $request->query('from');

    // Make read all unread message sent
    // Message::where(['from' => $from_user_id, 'to' => $to_user_id])->update(['is_read' => 1]);

    // Get all message from selected user
    $messages = Message::with('fromUser')
      ->where(['to' => $to_user_id, 'from' => $from_user_id]) // current user message
      ->orWhere(['to' => $from_user_id, 'from' => $to_user_id]) // other user message
      ->get();

    return response($messages);
  }

  // send new message
  public function sendMessage(Request $request)
  {
    // TODO
    $from = Auth::id() ?? $request->from;
    $to = $request->input('to');
    $message = $request->input('message');

    $res = Message::create([
      "from" => $from,
      "to" => $to,
      "message" => $message,
    ]);

    return response($res);
  }
}
