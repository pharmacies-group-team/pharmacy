<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class MessageController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  // show all groups that User is Follow
  public function index()
  {
    // select all Users + count how many message are unread from the selected user


    return view('messages.messages');
  }
  // get all Messages
  public function getMessage($user_id)
  {
    $my_id = Auth::id();

    // Make read all unread message sent
    Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

    // Get all message from selected user
    $messages = Message::where(function ($query) use ($user_id, $my_id) {
      $query->where('from', $user_id)->where('to', $my_id);
    })->oRwhere(function ($query) use ($user_id, $my_id) {
      $query->where('from', $my_id)->where('to', $user_id);
    })->get();


    //gg
    return view('messages.index', ['messages' => $messages]);
  }

  // get all users
  public function getUsers()
  {
    $users = DB::select("select DISTINCT u.id, u.name, u.email from users as u inner JOIN messages as m ON u.id IN(m.from,m.to)
      where u.id<>" . Auth::id() . " and( m.from= " . Auth::id() . " or m.to="
      . Auth::id() . ") group by u.id, u.name, u.email;");

    $notifications = DB::select("select m.to,m.from,sum(is_read =0 )
     as unread from users as u inner JOIN messages as m ON u.id = m.to
     where (m.to=" . Auth::id() . " ) group by m.to,m.from;");


    foreach ($users as $user) {
      foreach ($notifications as $notification) {
        if ($notification->from == $user->id) {
          $user->unread = $notification->unread;
        } else {
          $user->unread = 0;
        }
      }
    }
    return view('messages.users', ['users' => $users]);
  }


  // send new message
  public function sendMessage(Request $request)
  {
    $from = Auth::id();
    $to = $request->receiver_id;
    $message = $request->message;

    $data = new Message();
    $data->from = $from;
    $data->to = $to;
    $data->message = $message;
    $data->is_read = 0; // message will be unread when sending message
    $data->save();

    return $this->sendRequest($from, $message, $to);
  }
  public function sendRequest($from, $message, $to)
  {
    // $users = DB::select("SELECT * FROM messages WHERE messages.to = " . Auth::id() . " ");
    // if(isset($users)){
    //     foreach ($users as $p) {
    //         $Data = $p->to;
    //     }}
    $options = array(
      'cluster' => env('PUSHER_APP_CLUSTER'),
      'encrypted' => true
    );
    $pusher = new Pusher(
      env('PUSHER_APP_KEY'),
      env('PUSHER_APP_SECRET'),
      env('PUSHER_APP_ID'),
      $options
    );

    $users = DB::select("select DISTINCT u.id, u.name, u.email from users as u inner JOIN messages as m ON u.id IN(m.from,m.to)
            where u.id<>" . Auth::id() . " and( m.from= " . Auth::id() . " or m.to="
      . Auth::id() . ") group by u.id, u.name, u.email;");

    $notifications = DB::select("select m.to,m.from,sum(is_read =0 )
           as unread from users as u inner JOIN messages as m ON u.id = m.to
           where (m.to=" . Auth::id() . " ) group by m.to,m.from;");


    foreach ($users as $user) {
      foreach ($notifications as $notification) {
        if ($notification->from == $user->id) {
          $user->unread = $notification->unread;
        } else {
          $user->unread = 0;
        }
      }
    }




    // notification
    $data = ['from' => $from, 'to' => $to, 'users' => $users];
    $notify = 'notify-channel';
    $pusher->trigger($notify, 'App\\Events\\Notify', $data);
  }
}