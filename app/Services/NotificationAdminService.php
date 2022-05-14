<?php

namespace App\Services;

use App\Enum\RoleEnum;
use App\Enum\SettingEnum;
use App\Events\AdminNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class NotificationAdminService
{
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

    //********* save notification in db and send to receiver *********//
    private static function sendNotification($receiver, $data)
    {
      Notification::send($receiver, new AdminNotification($data));
    }
}
