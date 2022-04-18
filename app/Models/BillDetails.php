<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Bill
     */
    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }
}
