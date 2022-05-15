<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * validation
     */
    public static function roles()
    {
      return [
        'phone'        => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:8|max:9|starts_with:77,73,71,70,0',
        'name'         => 'required|max:100|string',
        'type_address' => 'required',
        'desc'         => 'required'
      ];
    }

    /**
     * messages
     */
    public static function messages()
    {
      return
        [
          'phone.required'        => 'يجب إدخال رقم الهاتف.',
          'phone.not_regex'       => 'لا يمكنك ادخال حروف او رموز.',
          'phone.regex'           => 'لا يمكنك ادخال حروف او رموز.',
          'phone.min'             => 'يجب ألا يقل عن 8 أرقام.',
          'phone.max'             => 'يجب أن لا يزيد عن 9 أرقام.',
          'phone.starts_with'     => 'الرجاء إدخال رقم هاتف صحيح.',
          'name.required'         => 'يجب إدخال الاسم.',
          'name.max'              => 'يجب ألا يكون الاسم أكبر من 100 حرف.',
          'name.string'           => 'يجب ان يكون الاسم نصاً.',
          'type_address.required' => 'يجب تحديد نوع العنوان.',
          'desc.required'         => 'يجب إدخال الوصف.',
        ];
    }

    public function  order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
