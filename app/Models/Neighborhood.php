<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Neighborhood extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Neighborhood Pharmacies
     */
    public function pharmacies(): HasMany
    {
        return $this->hasMany(Pharmacy::class);
    }

    /**
     * Get Neighborhood Addresses
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get Directorate
     */
    public function directorate(): BelongsTo
    {
        return $this->belongsTo(Directorate::class);
    }
}
