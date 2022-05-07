<div class="livewire-security">
  <x-alert type="message" />

  <div>
    <h2 class="text-large">@lang('heading.protection-and-privacy')</h2>

    <form wire:submit.prevent="submit">
      {{-- old password --}}
      <div class="form-group">
        <label class="text-base">@lang('form.old-password') </label>

        <input wire:model="oldPassword" type="password" class="form-control" placeholder="@lang('form.old-password')"
          autocomplete="current-password">
        @error('oldPassword')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- new password --}}
      <div class="form-group">
        <label class="text-base">@lang('form.new-password') </label>

        <input wire:model="newPassword" type="password" class="form-control" placeholder="@lang('form.new-password')"
          autocomplete="new-password">
        @error('newPassword')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- confirm new password --}}
      <div class="form-group">
        <label class="text-base">@lang('form.confirm-new-password') </label>

        <input placeholder="@lang('form.confirm-new-password') " wire:model="confirmPassword" type="password"
          class="form-control" autocomplete="new-password">

        @error('confirmPassword')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      <button wire:click.prevent="store" class="btn btn-full">@lang('form.update')</button>
    </form>
  </div>
</div>
