{{--TODO--}}
<div>
  @if (session()->has('message'))
    <div class="alert-box">
      {{ session('message') }}
    </div>
  @endif
  <div class="section-header">
    <h1 class="text-large">عرض السعر</h1>
  </div>
  <p style="text-align: left; margin: 20px 0">  تاريخ الإنشاء {{ $quotation->created_at->format('Y-m-d') }}  </p>
  @foreach($quotationDetails as $details)

    <div style="display:flex; gap: 55px; align-items: center">
      <div class="form-group">
        <label class="text-base">اسم المنتج </label>
        <p >{{ $details->product_name }} </p>
      </div>

      <div class="form-group">
        <label class="text-base">نوع المنتج </label>
        <p>
          @if($details->product_unit === \App\Enum\QuotationEnum::TYPE_BOTTLE)
            عبوه
          @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_CARTONS)
            كرتون
          @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_RIBBON)
            شريط
          @endif
        </p>
      </div>

      <div class="form-group">
        <label class="text-base">الكمية </label>

        <input type="number" wire:model="quantity" value="{{ $details->quantity }}">

      </div>

      <div class="form-group">
        <label class="text-base">سعر المنتج </label>
        <p>{{ $details->price }} {{ $details->currency }}</p>
      </div>

      <div class="form-group">
        <label class="text-base">المجموع</label>
        <p class=>{{ $details->total }} {{ $details->currency }}</p>
      </div>
      <button wire:click="edit({{ $details->id }})"  style="background: #4e7dcb;color: #fff;padding: 5px 20px;border-radius: 8px;" >تعديل</button>
      <button wire:click="delete({{ $details->id }})" class="badge-danger" style="color: #fff;padding: 5px 20px;border-radius: 8px;" >حذف</button>
    </div><hr>

  @endforeach
  <div><h1 style="text-align: left; margin: 20px 0 ">الأجمالي<span style="margin: 10px ">{{ $quotation->total }}</span></h1></div>

    <h3> حدد العنوان</h3>

    <div style="display:flex; flex-direction: column">
      <select wire:model="addressID" id="pharmacy-address" class="form-control">
        @foreach($addresses as $address)
          <option value="{{ $address->id }}">{{ $address->name }}</option>
        @endforeach
      </select>
      @error('addressID')
      <span class="error">{{ $message }}</span>
      @enderror
    </div>
</div>
