<?php

namespace App\Services;

use App\Enum\RoleEnum;
use App\Enum\SettingEnum;
use App\Events\AdminNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class NotificationAdminService
{
    //********* register new pharmacy *********//
    public static function newPharmacy($user)
    {
      $sender   = User::find($user->id);
      $admin    = User::role(RoleEnum::SUPER_ADMIN)->first();

      $data     = [
        'sender'   => $sender,
        'receiver' => $admin->id,
        'link'     => SettingEnum::DOMAIN.'admin/users/profile/'.$user->id,
        'message'  => 'يوجد عضوية تسجيل كصيدلي جديده يمكنك تفعيل حسابه.',
      ];

      // send and save notification in DB
      self::sendNotification($admin, $data);
    }

    //********* when user confirmation delivered order *********//
    public static function deliveredOrder($order)
    {
      $sender   = User::find($order->user->id);
      $admin    = User::role(RoleEnum::SUPER_ADMIN)->first();
      $pharmacy = User::find($order->pharmacy_id)->pharmacy;

      $data     = [
        'sender'   => $sender,
        'receiver' => $admin->id,
        'link'     => SettingEnum::DOMAIN.'client/invoice/'.$order->invoice->id,
        'message'  => 'لقد تم إيصال طلبي من قبل '.$pharmacy->name,
      ];

      // send and save notification in DB
      self::sendNotification($admin, $data);
    }

    public static function transferAmountToPharmacy($order)
    {
      $sender   = User::find($order->user->id);
      $admin    = User::role(RoleEnum::SUPER_ADMIN)->first();
      $pharmacy = User::find($order->pharmacy_id)->pharmacy;

      $data     = [
        'sender'   => $sender,
        'receiver' => $admin->id,
        'link'     => SettingEnum::DOMAIN.'admin/financial-operations',
        'message'  => 'لقد تم دفع الفاتورة من قبل '.$sender->name . ' إلى صيدلية ' . $pharmacy->name
      ];

      // send and save notification in DB
      self::sendNotification($admin, $data);
    }

    //********* save notification in db and send to receiver *********//
    private static function sendNotification($receiver, $data)
    {
      Notification::send($receiver, new AdminNotification($data));
    }
}
