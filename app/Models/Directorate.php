<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorate extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    /**
     * Get Directorate Neighborhoods
     */
    public function neighborhoods(): HasMany
    {
        return $this->hasMany(Neighborhood::class);
    }

    /**
     * Get City
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
