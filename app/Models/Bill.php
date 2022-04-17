<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Bill Details
     */
    public function billDetails(): HasMany
    {
        return $this->hasMany(BillDetails::class);
    }

    /**
     * Get Order
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
