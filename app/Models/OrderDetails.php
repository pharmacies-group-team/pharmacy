<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Order
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * validation
     */
    public static function roles()
    {
        return
        [
          'image' => 'required_without:order|image|mimes:jpeg,jpg,png,svg|max:2048|file',
          'order' => 'required_without:image|string|max:255'
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
}
