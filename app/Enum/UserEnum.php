<?php

namespace App\Enum;

class UserEnum
{
  const USER_AVATAR_PATH     = 'uploads/user/';
  const USER_AVATAR_DEFAULT  = self::USER_AVATAR_PATH . 'default_user.png';

  const TYPE_ADDRESS_HOME    = 'منزل';
  const TYPE_ADDRESS_WORK    = 'عمل';
}