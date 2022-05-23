<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Pusher\Pusher;

class NewOrderNotification extends Notification implements ShouldBroadcast
{
    public $sender, $receiver, $message, $link;

    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

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
      return ['new-order-notification'];
    }

    public function broadcastAs()
    {
      return 'NewOrderNotification';
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
