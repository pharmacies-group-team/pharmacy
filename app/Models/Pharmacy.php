<?php

namespace App\Models;

use Database\Factories\PharmacyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\PharmacyFilter;
use Illuminate\Database\Eloquent\Builder;

class Pharmacy extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get User Data
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get pharmacy worktimes
     */
    public function worktimes(): HasMany
    {
        return $this->hasMany(Worktime::class);
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

    protected static function newFactory()
    {
        return PharmacyFactory::new();
    }
}

