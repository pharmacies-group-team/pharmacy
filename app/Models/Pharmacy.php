<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacy extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get pharmacy Orders
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get User Data
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get pharmacy Contacts
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(PharmacyContact::class);
    }

    /**
     * Get pharmacy Social Media
     */
    public function social(): HasOne
    {
        return $this->hasOne(PharmacySocial::class);
    }

    /**
     * Get pharmacy neighborhood
     */
    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }
}
