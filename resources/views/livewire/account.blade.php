<div class="profile-form">
  <form>
    <div>
      @if (session()->has('message'))
        <div class="alert-box">
          {{ session('message') }}
        </div>
      @endif
    </div>

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
      <label for="pharmacy-name" class="text-base">البريد الإلكتروني:</label>
      <input wire:model="email" type="text" class="form-control" placeholder="البريد الإلكتروني ">
      @error('email')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <button wire:click.prevent="store()" class="btn btn-full">حفظ</button>
  </form>
</div>
