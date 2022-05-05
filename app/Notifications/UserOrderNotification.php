<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserOrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $order;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
      $this->user    = new User();
      $this->user    = $data['pharmacy'];

      $this->order   = new Order();
      $this->order   = $data['order'];

      $this->message = $data['message'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
      return [ 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
          'pharmacy_name' => $this->user->pharmacy->name,
          'pharmacy_logo' => $this->user->pharmacy->logo,
          'order_id'      => $this->order->id,
        ];
    }
}
