<?php

namespace App\Enum;

class OrderEnum
{
  const ORDER_IMAGE_PATH   = 'uploads/order/';

  // Order Status
  const NEW_ORDER          = 'NEW'; // طلب جديد
  const UNPAID_ORDER       = 'UNPAID'; // تم إنشاء عرض سعر ولكن لم يدفع العميل
  const PAID_ORDER         = 'PAID'; // تم الدفع ولكن لم يتم تاكيد وصول الطلب
  const DELIVERY_ORDER     = 'DELIVERY'; // قيد التوصيل
  const DELIVERED_ORDER    = 'DELIVERED'; // تم التوصيل
  const REFUSAL_ORDER      = 'REFUSAL'; // تم رفض الطلب من قبل الصيدلي
  const CANCELED_ORDER     = 'CANCELED'; // تم رفض الطلب من قبل العميل
}
