<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Order Invoice
     */
    public function Invoice(): HasOne
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
        return $this->belongsTo(User::class,'pharmacy_id');
    }

    /**
     * Get Client
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
