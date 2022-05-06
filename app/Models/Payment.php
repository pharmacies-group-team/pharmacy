<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Payment Users
     */

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'payment_users');
    }

    /**
     * validation
     */
    public static function roles()
    {
      return
        [
          'image'       => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
          'name'        => 'required|min:5|max:100|string',
          'bank_name'   => 'required|min:5|max:100|string',
        ];
    }

    /**
     * messages
     */
    public static function messages()
    {
      return
        [
          'image.required' => 'يرجى إدخال الصورة.',
          'image.image'    => 'يجب أن يكون الحقل المُدخل صورة.',
          'image.mimes'    => 'يجب أن تكون الصورة ملفًا من النوع jpeg,jpg,png,svg.',
          'image.max'      => 'يجب ألا تكون الصورة أكبر من 2048 كيلوبايت.',
          'required'       => 'يرجى إدخال الحقل المطلوب.',
          'string'         => 'يجب أن يكون الحقل سلسلة نصية.',
          'max'            => 'يجب ألا يكون الحقل أكبر من 100 من الأحرف.',
          'min'            => 'يجب ألا يكون الحقل أقل من 5 أحرف.'
        ];
    }
}
