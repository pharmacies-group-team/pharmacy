<?php

namespace App\Services;

use App\Events\NewOrderNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class NotificationService
{
  //********* when user create order *********//
  public static function newOrder($order)
  {
    $sender    = User::find($order->user_id);
    $receiver  = User::find($order->pharmacy_id);

    $data     = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => '/pharmacy/quotation/'. $order->id,
      'message'  => 'أرسل لك طلب جديد، يمكنك الإطلاع عليه.',
    ];

    // send and save notification in DB
    self::sendOrderNotification($receiver, $data);
  }

  //********* when user cancel order *********//
  public static function cancelOrder($order)
  {
    $sender    = User::find($order->user_id);
    $receiver  = User::find($order->pharmacy_id);

    $data     = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => '/pharmacy/quotation/'. $order->id,
      'message'  => 'قام بإلغاء الطلب.',
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
        'link'     => '/client/orders',
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
      'link'     => '/client/quotation/details/'.$order->quotation->id,
      'message'  => 'تم إرسال عرض سعر يُمكنك الإطلاع عليها'
    ];

    // send and save notification in DB
    self::sendOrderNotification($receiver, $data);
  }

  //********* when user pay order *********//
  public static function userPay($order)
  {
    $sender    = User::find($order->user_id);
    $receiver  = User::find($order->pharmacy_id);

    $data     = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => '/pharmacy/invoice/'.$order->id,
      'message'  => 'قام بدفع الفاتورة المُرسله إلية، يمكنك ايصال طلبه.',
    ];

    // send and save notification in DB
    self::sendOrderNotification($receiver, $data);
  }

  //********* when user confirmation delivered order *********//
  public static function deliveredOrder($order)
  {
    $sender   = User::find($order->user->id);
    $receiver = User::find($order->pharmacy_id);

    $data     = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => '/pharmacy/invoice/'.$order->id, // TODO
      'message'  => 'لقد تم إيصال الطلب من قبل '.$sender->name,
    ];

    // send and save notification in DB
    self::sendOrderNotification($receiver, $data);
  }

  //********* when user transfer amount to pharmacy *********//
  public static function transferAmountToPharmacy($order)
  {
    $sender   = User::find($order->user->id);
    $receiver = User::find($order->pharmacy_id);

    $data     = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => '/pharmacy/financial-operations',
      'message'  => 'تم الايداع الى حسابك من قبل '.$sender->name,
    ];

    // send and save notification in DB
    self::sendOrderNotification($receiver, $data);
  }

  //********* when user transfer amount from user *********//
  public static function transferAmountFromUser($order)
  {
    $sender   = User::find($order->pharmacy_id);
    $receiver = User::find($order->user_id);

    $data     = [
      'sender'   => $sender,
      'receiver' => $receiver->id,
      'link'     => '/client/financial-operations',
      'message'  => 'تم السحب من حسابك الى حساب '.$sender->name,
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
