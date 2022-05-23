<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerodicOrder extends Model
{
   use HasFactory, SoftDeletes;
   protected $guarded = [];

    /**
     * Get users
     */

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get orders
     */
    public function order(): BelongsTo
    {
      return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * validation
     */

    public static function roles()
    {
      return
        [
          'perodic_date_type'    => 'required|min:5|max:100|string',
          'start_date'           => 'required|date|after_or_equal:today'
        ];
    }

    public static function messages()
    {
      return [
        'start_date.after_or_equal' => 'يجب أن يكون تاريخاً لاحقاً أو مطابقاً لتاريخ اليوم ',
        'start_date.required'       => 'لايمكنك ترك الحقل فارغ',
      ];
    }
}
