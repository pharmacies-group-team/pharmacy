<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
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
     * Get Order
     */
    public function details(): HasMany
    {
      return $this->hasMany(QuotationDetails::class);
    }
}
