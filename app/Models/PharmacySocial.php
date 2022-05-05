<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacySocial extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    /**
     * Get pharmacy
     */
    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class);
    }

    /**
     * validation
     */
    public static function roles()
    {
      return
        [
          'whatsapp' => 'nullable|url|active_url',
          'website'  => 'nullable|url|active_url',
          'facebook' => 'nullable|url|active_url',
          'twitter'  => 'nullable|url|active_url',
        ];
    }

    /**
     * messages
     */
    public static function messages()
    {
      return
        [
          'whatsapp.url'         => 'يجب أن يكون عنوان URL صحيحاً.',
          'website.url'          => 'يجب أن يكون عنوان URL صحيحاً.',
          'facebook.url'         => 'يجب أن يكون عنوان URL صحيحاً.',
          'twitter.url'          => 'يجب أن يكون عنوان URL صحيحاً.',
          'whatsapp.active_url'  => 'هذا العنوان غير صالحاً.',
          'website.active_url'   => 'هذا العنوان غير صالحاً.',
          'facebook.active_url'  => 'هذا العنوان غير صالحاً.',
          'twitter.active_url'   => 'هذا العنوان غير صالحاً.'
        ];
    }
}
