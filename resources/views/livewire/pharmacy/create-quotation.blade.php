{{-- TODO --}}

<div class="profile-form">
  @if (session()->has('message'))
    <div class="alert-box">
      {{ session('message') }}
    </div>
  @endif
  {{-- form --}}
  <div style="display:flex; gap: 12px; align-items: center">
    <input hidden name="order" value="{{ $order }}">
    <div class="form-group">
      <label class="text-base">اسم المنتج </label>

      <input type="text" wire:model="product_name.0" class="form-control">
      @error('product_name.0')
      <span>{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label class="text-base">نوع المنتج </label>

{{--      <input type="text" wire:model="product_unit.0" class="form-control">--}}
      <select wire:model="product_unit.0" class="form-control">
        <option selected>حدد نوع المنتج</option>
        <option value="{{ \App\Enum\QuotationEnum::TYPE_BOTTLE }}">عبوه</option>
        <option value="{{ \App\Enum\QuotationEnum::TYPE_CARTONS }}">كرتون</option>
        <option value="{{ \App\Enum\QuotationEnum::TYPE_RIBBON }}">شريط</option>
      </select>
      @error('product_unit.0')
      <span>{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label class="text-base">الكمية </label>

      <input type="number" wire:model="quantity.0" class="form-control">
      @error('quantity.0')
      <span>{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label class="text-base">سعر المنتج </label>

      <input type="text" wire:model="price.0" class="form-control">
      @error('price.0')
      <span>{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label class="text-base">العملة</label>

      <input type="text" wire:model.defer="currency.0" class="form-control">
      @error('currency.0')
      <span>{{ $message }}</span>
      @enderror
    </div>
    <button style="background: #4e7dcb;color: #fff;padding: 5px 20px;border-radius: 8px;" wire:click.prevent="add({{$i}})">إضافة</button>
  </div>
  @foreach($inputs as $key => $value)

    <div style="display:flex; gap: 12px; align-items: center">
      <div class="form-group">
        <label class="text-base">اسم المنتج </label>

        <input type="text" wire:model="product_name.{{ $value }}" class="form-control">
        @error('product_name'.$value)
        <span>{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label class="text-base">نوع المنتج </label>

{{--        <input type="text" wire:model="product_unit.{{ $value }}" class="form-control">--}}
        <select wire:model="product_unit.{{ $value }}" class="form-control">
          <option selected>حدد نوع المنتج</option>
          <option value="{{ \App\Enum\QuotationEnum::TYPE_BOTTLE }}">عبوه</option>
          <option value="{{ \App\Enum\QuotationEnum::TYPE_CARTONS }}">كرتون</option>
          <option value="{{ \App\Enum\QuotationEnum::TYPE_RIBBON }}">شريط</option>
        </select>
        @error('product_unit'.$value)
        <span>{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label class="text-base">الكمية </label>

        <input type="number" wire:model="quantity.{{ $value }}" class="form-control">
        @error('quantity'.$value)
        <span>{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label class="text-base">سعر المنتج </label>

        <input type="text" wire:model="price.{{ $value }}" class="form-control">
        @error('price'.$value)
        <span>{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label class="text-base">العملة</label>

        <input type="text" wire:model.defer="currency.{{ $value }}" class="form-control">
        @error('currency'.$value)
        <span>{{ $message }}</span>
        @enderror
      </div>
      <button style="background: #B13232;color: #fff;padding: 5px 20px;border-radius: 8px;" wire:click.prevent="remove({{$key}})">حذف</button>

    </div>

  @endforeach
  <button wire:click.prevent="storeQuotation()" class="btn btn-full">حفظ</button>
</div>
