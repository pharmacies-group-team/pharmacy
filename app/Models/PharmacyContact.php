<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyContact extends Model
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
      return ['phone' => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:8|max:9|starts_with:77,73,71,70,0',];
    }

    /**
     * messages
     */
    public static function messages()
    {
      return
        [
          'phone.required'    => 'يجب إدخال رقم الهاتف.',
          'phone.not_regex'   => 'لا يمكنك ادخال حروف او رموز.',
          'phone.regex'       => 'لا يمكنك ادخال حروف او رموز.',
          'phone.min'         => 'يجب ألا يقل عن 8 أرقام.',
          'phone.max'         => 'يجب أن لا يزيد عن 9 أرقام.',
          'phone.starts_with' => 'يمكنك إدخال (77,73,71,70,0) في البداية.',
        ];
    }
}
