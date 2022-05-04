<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Order
     */
    public function quotation(): BelongsTo
    {
      return $this->belongsTo(Quotation::class);
    }
}