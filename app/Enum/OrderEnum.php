<?php

namespace App\Enum;

class OrderEnum
{
    const ORDER_IMAGE_PATH   = 'uploads/order/';

    // Order Status
    const NEW_ORDER          = 'NEW';
    const CONFIRMED_ORDER    = 'CONFIRMED';
    const UNPAID_ORDER       = 'UNPAID';
    const PAID_ORDER         = 'PAID';
}
