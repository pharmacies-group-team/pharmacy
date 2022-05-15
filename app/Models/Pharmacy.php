<?php

namespace App\Models;

use Database\Factories\PharmacyFactory;
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

  /**
   * validation
   */
  public static function roles()
  {
    return [
      'name'            => 'required|max:100|string',
      'about'           => 'nullable|min:50|string',
      'address'         => 'nullable|min:10|string',
      //        'neighborhood_id' => 'nullable'
    ];
  }

  public static function rolesLogo()
  {
    return ['logo'  => 'required|image|mimes:jpeg,jpg,png|max:2048'];
  }

  /**
   * messages
   */
  public static function messages()
  {
    return
      [
        'name.required'       => 'يجب إدخال اسم الصيدلية.',
        'name.max'            => 'يجب ألا يكون الاسم أكبر من 100 حرف.',
        'name.string'         => 'يجب ان يكون الاسم نصاً.',
        'about.min'           => 'يجب ألا تقل عن 50 حرف.',
        'address.min'         => 'يجب ألا يقل العنوان المُدخل عن 10 أحرف.',
        'address.string'      => 'يجب ان يكون العنوان نصاً.',

      ];
  }

  public static function messagesLogo()
  {
    return
      [
        'logo.required'         => 'يبدوا انك نسيت إدخال الصورة.',
        'logo.image'            => 'يجب أن يكون الحقل المُدخل صورة.',
        'logo.mimes'            => 'يجب أن تكون الصورة ملفًا من النوع jpeg,jpg,png,svg.',
        'logo.max'              => 'يجب ألا تكون الصورة أكبر من 2048 كيلوبايت.',
      ];
  }
}
