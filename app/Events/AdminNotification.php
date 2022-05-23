<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class AdminNotification extends Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender, $receiver, $message, $link;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
      $this->sender   = $data['sender'];
      $this->receiver = $data['receiver'];
      $this->message  = $data['message'];
      $this->link     = $data['link'];
    }

    public function via($notifiable)
    {
      return ['database', 'broadcast'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
      return ['new-admin-notification'];
    }

    public function broadcastAs()
    {
      return 'AdminNotification';
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
      return [
        'sender'    => $this->sender,
        'receiver'  => $this->receiver,
        'link'      => $this->link,
        'message'   => $this->message
      ];
    }

    public function toBroadcast($notifiable)
    {
      return [
        'sender'    => $this->sender,
        'receiver'  => $this->receiver,
        'link'      => $this->link,
        'message'   => $this->message
      ];
    }
  }
