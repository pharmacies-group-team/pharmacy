<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'phone',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Pharmacy
     */
    public function pharmacy(): HasOne
    {
        return $this->hasOne(Pharmacy::class);
    }

    /**
     * Get User Orders
     */
    public function userOrders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get Pharmacy Orders
     */
    public function pharmacyOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'pharmacy_id');
    }

    /**
     * Get User Payments
     */

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Payment::class, 'payment_users');
    }

    /**
     * get ads
     */
    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
