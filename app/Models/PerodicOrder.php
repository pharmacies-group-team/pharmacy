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
}
