<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    /**
     * Get City Directorates
     */
    public function directorates(): HasMany
    {
        return $this->hasMany(Directorate::class);
    }
}
