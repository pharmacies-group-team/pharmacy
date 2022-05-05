{{-- TODO --}}

@if (session()->has('message'))
  <div>
    {{ session('message') }}
  </div>
@endif

<div>
  <input hidden name="order" value="{{ $order }}">

  product_name<input type="text" wire:model="product_name.0">
  @error('product_name.0')
  <span>{{ $message }}</span>
  @enderror <hr>

  product_unit<input type="text" wire:model="product_unit.0">
  @error('product_unit.0')
  <span>{{ $message }}</span>
  @enderror <hr>

  quantity<input type="number" wire:model="quantity.0">
  @error('quantity.0')
  <span>{{ $message }}</span>
  @enderror <hr>

  price<input type="text" wire:model="price.0">
  @error('price.0')
  <span>{{ $message }}</span>
  @enderror <hr>

  currency<input type="text" wire:model.defer="currency.0">
  @error('currency.0')
  <span>{{ $message }}</span>
  @enderror <hr>

{{--  total<input type="text" wire:model.defer="total.0">--}}
{{--  @error('total.0')--}}
{{--  <span>{{ $message }}</span>--}}
{{--  @enderror--}}

  <button wire:click.prevent="add({{$i}})">Add</button> <hr>

{{--  <button wire:click.prevent="storeQuotation()">save</button>--}}

  @foreach($inputs as $key => $value)

    <input hidden name="order" value="{{ $order }}">

    product_name<input type="text" wire:model="product_name.{{ $value }}" >
    @error('product_name'.$value)
    <span>{{ $message }}</span>
    @enderror <hr>

    product_unit<input type="text" wire:model="product_unit.{{ $value }}">
    @error('product_unit'.$value)
    <span>{{ $message }}</span>
    @enderror <hr>

    quantity<input type="number" wire:model="quantity.{{ $value }}">
    @error('quantity'.$value)
    <span>{{ $message }}</span>
    @enderror <hr>

    price<input type="text" wire:model="price.{{ $value }}">
    @error('price'.$value)
    <span>{{ $message }}</span>
    @enderror <hr>

    currency<input type="text" wire:model.defer="currency.{{ $value }}">
    @error('currency'.$value)
    <span>{{ $message }}</span>
    @enderror <hr>

{{--    total<input type="text" wire:model.defer="total.{{ $value }}">--}}
{{--    @error('total'.$value)--}}
{{--    <span>{{ $message }}</span>--}}
{{--    @enderror--}}

    <button wire:click.prevent="remove({{$key}})">remove</button> <hr>

  @endforeach

  <button type="button" wire:click.prevent="storeQuotation()" class="btn btn-success btn-sm">Save</button>

</div>
