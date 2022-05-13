<?php

namespace App\Services;

use App\Enum\SettingEnum;
use App\Events\NewOrderNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationService
{
  //********* when user create order *********//
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

  //********* when pharmacy refusal order *********//
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

  //********* when pharmacy create quotation for user *********//
  public static function newQuotation($order)
  {
    $sender   = User::find($order->pharmacy_id)->pharmacy;
    $receiver = User::find($order->user_id);

    $data  = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => SettingEnum::DOMAIN.'client/quotation/details/'.$order->quotation->id,
      'message'  => 'تم إرسال عرض سعر يُمكنك الإطلاع عليها'
    ];

    // send and save notification in DB
    self::sendOrderNotification($receiver, $data);
  }

  //********* save notification in db and send to receiver *********//
  private static function sendOrderNotification($receiver, $data)
  {
    Notification::send($receiver, new NewOrderNotification($data));
  }
}
