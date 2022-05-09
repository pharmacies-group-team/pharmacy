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
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
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
   * Get User Address
   */

  public function addresses(): HasMany
  {
    return $this->hasMany(Address::class);
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

  /**
   * validation
   */
  // public static function role()
  // {
  //   return [
  //     'name'  => ['required', 'string', 'max:255', 'min:5'],
  //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
  //   ];
  // }

  public static function rolesAvatar()
  {
    return ['avatar'  => 'required|image|mimes:jpeg,jpg,png,svg|max:2048'];
  }

  /**
   * messages
   */
  public static function messages()
  {
    return
      [
        'name.required'     => 'يجب إدخال اسم المستخدم.',
        'name.string'       => 'يجب ان يكون الاسم نصاً.',
        'name.min'          => 'يجب ألا يقل الاسم عن 5 أحرف.',
        'email.required'    => 'يجب إدخال البريد الإلكتروني.',
        'email.email'       => 'يرجى التأكد من صحة البريد الإلكتروني',
        'email.unique'      => 'البريد الإلكتروني مُستخدم من قبل.',
        'email.string'      => 'يجب ان يكون البريد الإلكتروني نصاً.',
        'max'               => 'يجب ألا يزيد هذا الحقل عن 255 حرف.',
      ];
  }

  public static function messagesAvatar()
  {
    return
      [
        'avatar.required'         => 'يبدوا انك نسيت إدخال الصورة.',
        'avatar.image'            => 'يجب أن يكون الحقل المُدخل صورة.',
        'avatar.mimes'            => 'يجب أن تكون الصورة ملفًا من النوع jpeg,jpg,png,svg.',
        'avatar.max'              => 'يجب ألا تكون الصورة أكبر من 2048 كيلوبايت.',
      ];
  }
}
