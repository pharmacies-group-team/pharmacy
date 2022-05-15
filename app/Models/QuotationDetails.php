<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get Order
     */
    public function quotation(): BelongsTo
    {
      return $this->belongsTo(Quotation::class);
    }

    /**
     * validation
     */
    public static function roles()
    {
      return
        [
          'product_name.*' => 'required',
          'quantity.*'     => 'required|numeric',
          'price.*'        => 'required|numeric',
          'currency.*'     => 'required'
        ];
    }

    /**
     * messages
     */
    public static function messages()
    {
      return
        [
          'product_name.*.required' => 'يجب إدخال اسم المُنتج.',
          'quantity.*.required'     => 'يجب إدخال الكمية.',
          'price.*.required'        => 'يجب إدخال سعر المُنتج.',
          'currency.*.required'     => 'يجب إدخال العملة.',
        ];
    }
}
