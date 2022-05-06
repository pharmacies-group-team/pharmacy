
<div class="security">
  {{-- title --}}
  <h2 class="text-base">الحماية والخصوصية</h2>

  {{-- form --}}
  <form>
    <div>
      @if (session()->has('message'))
        <div class="alert-box">
          {{ session('message') }}
        </div>
      @endif
    </div>
    <ul class="list">
      {{-- old password --}}
      <li class="item">
        <x-icon icon='facebook' />
        <input wire:model="oldPassword" type="password" class="form-control">
      </li>
      @error('oldPassword')
      <span class="error">{{ $message }}</span>
      @enderror

      {{-- new password --}}
      <li class="item">
        <x-icon icon='whatsapp' />
        <input wire:model="newPassword" type="password"  class="form-control">
      </li>
      @error('newPassword')
      <span class="error">{{ $message }}</span>
      @enderror

      {{-- confirm --}}
      <li class="item">
        <x-icon icon='website' />
        <input wire:model="confirmPassword" type="password"  class="form-control">
      </li>
      @error('confirmPassword')
      <span class="error">{{ $message }}</span>
      @enderror


    <button wire:click.prevent="store()" class="btn btn-full">حفظ</button>
  </form>
</div>
