{{-- TODO --}}
<div>
  <x-alert type="message" />

  {{-- form --}}
  <form>
    {{-- <input hidden name="order" value="{{ $order }}"> --}}
    <div class="t-order-item">

      {{-- name --}}
      <div class="t-form-group">
        <label class="text-base">اسم المنتج </label>

        <input type="text" wire:model="product_name.0" class="form-control">
        @error('product_name.0')
          <span>{{ $message }}</span>
        @enderror
      </div>

      {{-- type --}}
      <div class="t-form-group">
        <label class="text-base">نوع المنتج </label>

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

      {{-- quantity --}}
      <div class="t-form-group">
        <label class="text-base">الكمية </label>

        <input type="number" wire:model="quantity.0" class="form-control">
        @error('quantity.0')
          <span>{{ $message }}</span>
        @enderror
      </div>

      {{-- price --}}
      <div class="t-form-group">
        <label class="text-base">سعر المنتج </label>

        <input type="text" wire:model="price.0" class="form-control">
        @error('price.0')
          <span>{{ $message }}</span>
        @enderror
      </div>
    </div>



    @foreach ($inputs as $key => $value)
      <hr class="divided">

      <div class="t-order-item">
        <div class="t-form-group">
          <label class="text-base">اسم المنتج </label>

          <input type="text" wire:model="product_name.{{ $value }}" class="form-control">
          @error('product_name' . $value)
            <span>{{ $message }}</span>
          @enderror
        </div>

        <div class="t-form-group">
          <label class="text-base">نوع المنتج </label>

          {{-- <input type="text" wire:model="product_unit.{{ $value }}" class="form-control"> --}}
          <select wire:model="product_unit.{{ $value }}" class="form-control">
            <option selected>حدد نوع المنتج</option>
            <option value="{{ \App\Enum\QuotationEnum::TYPE_BOTTLE }}">عبوه</option>
            <option value="{{ \App\Enum\QuotationEnum::TYPE_CARTONS }}">كرتون</option>
            <option value="{{ \App\Enum\QuotationEnum::TYPE_RIBBON }}">شريط</option>
          </select>
          @error('product_unit' . $value)
            <span>{{ $message }}</span>
          @enderror
        </div>

        <div class="t-form-group">
          <label class="text-base">الكمية </label>

          <input type="number" wire:model="quantity.{{ $value }}" class="form-control">
          @error('quantity' . $value)
            <span>{{ $message }}</span>
          @enderror
        </div>

        <div class="t-form-group">
          <label class="text-base">سعر المنتج </label>

          <input type="text" wire:model="price.{{ $value }}" class="form-control"
            placeholder="بالريال اليمني">
          @error('price' . $value)
            <span>{{ $message }}</span>
          @enderror
        </div>

        <div class="t-btn-remove-item">
          <button wire:click.prevent="remove({{ $key }})">
            <x-icon icon="remove" />
          </button>
        </div>


      </div>
    @endforeach


    <div class="t-form-btn-action">

      <div class="t-btn-add-new">
        <button wire:click.prevent="add({{ $i }})">
          <x-icon icon="plus" />
        </button>
      </div>


      <div class="t-form-btn">
        <button wire:click.prevent="storeQuotation()" class="btn">
          @lang('action.send')
        </button>
      </div>
    </div>

  </form>

</div>
