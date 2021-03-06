<div class="social">
  {{-- title --}}
  <h2 class="text-base">مواقع التواصل الإجتماعي</h2>

  {{-- form --}}
  <form>
    <x-alert type="message" />

    <ul class="list">
      {{-- facebook --}}
      <li class="item">
        <x-icon icon='facebook' />
        <input type="url" wire:model="facebook" class="form-control">
      </li>
      @error('facebook')
        <span class="error">{{ $message }}</span>
      @enderror

      {{-- whatsapp --}}
      <li class="item">
        <x-icon icon='whatsapp' />
        <input type="url" wire:model="whatsapp" class="form-control">
      </li>
      @error('whatsapp')
        <span class="error">{{ $message }}</span>
      @enderror

      {{-- website --}}
      <li class="item">
        <x-icon icon='website' />
        <input type="url" wire:model="website" class="form-control">
      </li>
      @error('website')
        <span class="error">{{ $message }}</span>
      @enderror

      {{-- twitter --}}
      <li class="item">
        <x-icon icon='twitter' />
        <input type="url" wire:model="twitter" class="form-control">
      </li>
      @error('twitter')
        <span class="error">{{ $message }}</span>
      @enderror
    </ul>

    <button wire:click.prevent="store()" class="btn btn-full">حفظ</button>
  </form>
</div>
