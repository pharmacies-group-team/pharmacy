<?php

namespace App\Services;

use App\Enum\SettingEnum;
use App\Events\NewOrderNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationService
{
  public static function newOrder($pharmacy_id)
  {
    $sender    = Auth::user();
    $receiver  = User::find($pharmacy_id);

    $data     = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => SettingEnum::DOMAIN.'pharmacy/orders',
      'message'  => 'أرسل لك طلب جديد، يمكنك الإطلاع عليه.',
    ];

    // send and save notification in DB
    self::sendOrderNotification($receiver, $data);
  }

  public static function refusalOrder($order)
  {
      $sender   = User::find($order->pharmacy_id)->pharmacy;
      $receiver = User::find($order->user_id);

      $data     = [
        'sender'   => $sender,
        'receiver' => $receiver->id,
        'link'     => SettingEnum::DOMAIN.'client/orders',
        'message'  => 'عذراً لا يتوفر لدينا طلبك..',
      ];

      // send and save notification in DB
      self::sendOrderNotification($receiver, $data);
  }

  private static function sendOrderNotification($receiver, $data)
  {
    Notification::send($receiver, new NewOrderNotification($data));
  }
}
