<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = [];

  /**
   * Get Order Invoice
   */
  public function invoice(): HasOne
  {
    return $this->hasOne(Invoice::class);
  }

  /**
   * Get Order Quotation
   */
  public function quotation(): HasOne
  {
    return $this->hasOne(Quotation::class);
  }

  /**
   * Get Pharmacy
   */
  public function pharmacy(): BelongsTo
  {
    return $this->belongsTo(User::class, 'pharmacy_id');
  }

  /**
   * Get Client
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  // get orders perodic orders
  public function PerodicOrders(): HasOne
  {
    return $this->hasOne(PerodicOrder::class);
  }

  /**
   * validation
   */
  public static function roles()
  {
    return
      [
        'image' => 'required_without:order|image|mimes:jpeg,jpg,png,svg|max:2048',
        'order' => 'required_without:image|string|max:255|nullable'
      ];
  }

  /**
   * messages
   */
  public static function messages()
  {
    return
      [
        'image.required_without' => 'يجب إدخال أحد الحقلين.',
        'image.image'            => 'يجب أن يكون الحقل المُدخل صورة.',
        'image.mimes'            => 'يجب أن تكون الصورة ملفًا من النوع jpeg,jpg,png,svg.',
        'image.max'              => 'يجب ألا تكون الصورة أكبر من 2048 كيلوبايت.',
        'order.required_without' => 'يجب إدخال أحد الحقلين',
        'order.string'           => 'يجب أن يكون الحقل سلسلة نصية.',
        'order.max'              => 'يجب ألا يكون النص أكبر من 255 من الأحرف.'
      ];
  }

  protected static function newFactory()
  {
    return OrderFactory::new();
  }
}