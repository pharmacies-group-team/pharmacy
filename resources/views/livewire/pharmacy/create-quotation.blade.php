{{-- TODO --}}
<div>
  <x-alert type="message" />

  {{-- form --}}
  <form>
    {{-- <input hidden name="order" value="{{ $order }}"> --}}
    <div class="t-order-item" x-data="{ quantity: '', price: '', total: 0 }">

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
        <label class="text-base">الوحده </label>

        <select wire:model="product_unit.0" class="form-control">
          <option selected disabled>حدد الوحده</option>
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

        <input x-model="quantity" type="number" wire:model="quantity.0" min="1" max="30" class="form-control">
        @error('quantity.0')
          <span>{{ $message }}</span>
        @enderror
      </div>

      {{-- price --}}
      <div class="t-form-group">

        <label class="text-base">سعر المنتج </label>
        <input x-model="price" type="number" min="1" max="50000" wire:model="price.0" class="form-control">
        @error('price.0')
          <span>{{ $message }}</span>
        @enderror
      </div>

      {{-- total --}}
      <div class="t-form-group" x-effect="total = (+price) * (+quantity)">
        <label class="text-base">@lang('heading.total') :</label>

        <input readonly :value="total" class='form-control' style="max-width: 100px" />
      </div>
    </div>



    @foreach ($inputs as $key => $value)
      <hr class="divided">

      <div class="t-order-item" x-data="{ quantity: '', price: '', total: 0 }">
        <div class="t-form-group">
          <label class="text-base">اسم المنتج </label>

          <input type="text" wire:model="product_name.{{ $value }}" class="form-control">
          @error('product_name' . $value)
            <span>{{ $message }}</span>
          @enderror
        </div>

        <div class="t-form-group">
          <label class="text-base"> الوحده </label>

          {{-- <input type="text" wire:model="product_unit.{{ $value }}" class="form-control"> --}}
          <select wire:model="product_unit.{{ $value }}" class="form-control">
            <option selected disabled>حدد الوحده</option>
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

          <input x-model="quantity" type="number" wire:model="quantity.{{ $value }}" min="1" max="30"
            class="form-control">
          @error('quantity' . $value)
            <span>{{ $message }}</span>
          @enderror
        </div>

        <div class="t-form-group">
          <label class="text-base">سعر المنتج </label>

          <input x-model="price" type="number" wire:model="price.{{ $value }}" min="1" max="50000"
            class="form-control">
          @error('price' . $value)
            <span>{{ $message }}</span>
          @enderror
        </div>

        {{-- total --}}
        <div class="t-form-group" x-effect="total = (+price) * (+quantity)">
          <label class="text-base">@lang('heading.total') :</label>

          <input readonly :value="total" class='form-control' style="max-width: 100px" />
        </div>

        <div class="t-form-group">
          {{-- TODO fixed later --}}
          <label class="text-base"></label>

          <div class="t-btn-remove-item" style="min-height: 64%;">
            <button wire:click.prevent="remove({{ $key }})">
              <x-icon icon="remove" />
            </button>
          </div>
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
