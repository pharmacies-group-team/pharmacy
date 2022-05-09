{{-- TODO --}}
<div>
  <x-alert type="message" />

  <div class="section-header">
    <h2 class="text-large">عرض السعر</h2>

    <p>
      تاريخ الإنشاء
      {{ $quotation->created_at->format('Y-m-d') }}
    </p>
  </div>



  {{-- table --}}
  <div class="table-wrapper">
    <table class="table">
      <thead>
        <tr>
          {{-- name --}}
          <th> اسم المنتج</th>

          {{-- type --}}
          <th>نوع المنتج</th>

          {{-- quantity --}}
          <th>الكمية</th>

          {{-- price --}}
          <th>سعر المنتج</th>

          {{-- total --}}
          <th>المجموع</th>

          {{-- actions --}}
          <th></th>
        </tr>
      </thead>

      <tbody>
        @if (isset($quotationDetails))
          @foreach ($quotationDetails as $details)
            <tr>
              <td> {{ $details->product_name }} </td>

              <td>
                <div>
                  @if ($details->product_unit === \App\Enum\QuotationEnum::TYPE_BOTTLE)
                    عبوه
                  @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_CARTONS)
                    كرتون
                  @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_RIBBON)
                    شريط
                  @endif
                </div>
              </td>

              <td> {{ $details->quantity }} </td>

              {{-- price --}}
              <td> {{ $details->price }} {{ $details->currency }} </td>

              {{-- total --}}
              <td> {{ $details->price }} {{ $details->total }} </td>

              {{-- action --}}
              <td>
                <button wire:click="delete({{ $details->id }})" class="badge badge-danger">حذف</button>
              </td>
            </tr>
          @endforeach
        @endif

        <tr>
          <td>
            الأجمالي
          </td>
          <td colspan="5"> {{ $quotation->total }} </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="t-address">
    <h3> حدد العنوان</h3>

    <div>
      <select wire:model="addressID" class="form-control">
        @foreach ($addresses as $address)
          <option value="{{ $address->id }}">{{ $address->name }}</option>
        @endforeach
      </select>

      @error('addressID')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>
  </div>
</div>
