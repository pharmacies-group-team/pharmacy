<div class="profile-form">
  <form>
    <x-alert type="message" />

    {{-- name --}}
    <div class="form-group">
      <label for="pharmacy-name" class="text-base">اسم المستخدم:</label>

      <input wire:model="name" type="text" class="form-control" placeholder="اسم المستخدم">
      @error('name')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>


    {{-- about --}}
    <div class="form-group">
      <label for="pharmacy-name" class="text-base">@lang('form.email')</label>
      <input wire:model="email" type="text" class="form-control" placeholder="@lang('form.email')">
      @error('email')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    {{-- phone --}}
    <div class="form-group">
      <label class="text-base">@lang('form.phone')</label>
      <input wire:model="phone" type="number" class="form-control" placeholder="@lang('form.phone')">

      @error('phone')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <button wire:click.prevent="store()" class="btn btn-full">@lang('form.update')</button>

  </form>
</div>
