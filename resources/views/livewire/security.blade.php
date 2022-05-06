<div class="livewire-security">
  @if (session()->has('message'))
    <div class="alert-box">
      {{ session('message') }}
    </div>
  @endif

  <div class="profile-info">
    <h2 class="text-large">الحماية والخصوصية</h2>

    <form>
      {{-- old password --}}
      <div class="form-group">
        <label class="text-base">كلمه السر القديمة </label>

        <input wire:model="oldPassword" type="password" class="form-control" placeholder="كلمه السر القديمة ">
        @error('oldPassword')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- new password --}}
      <div class="form-group">
        <label class="text-base">كلمه السر الجديدة </label>

        <input wire:model="newPassword" type="password" class="form-control" placeholder="كلمه السر الجديدة ">
        @error('newPassword')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- confirm new password --}}
      <div class="form-group">
        <label class="text-base">تاكيد كلمه السر الجديدة </label>

        <input placeholder="تاكيد كلمه السر الجديدة " wire:model="confirmPassword" type="password"
          class="form-control">

        @error('confirmPassword')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      <button wire:click.prevent="store()" class="btn btn-full">حفظ</button>
    </form>
  </div>
</div>
