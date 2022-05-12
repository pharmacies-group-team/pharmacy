@if (isset($open))
  <div class="t-modal" :class="{{ $open }} ? 'open' : ''" x-show="{{ $open }}">

    <div class="t-modal-container" @click.away="{{ $open }} = false">
      {{-- header --}}
      <div class="t-modal-header">
        {{-- modal title --}}
        @if (isset($title))
          <div class="title"> {{ $title }} </div>
        @endif

        <button class="close-btn" @click="{{ $open }} = false">
          <x-icon icon="close" />
        </button>
      </div>

      {{-- content --}}
      <div class="t-modal-content">
        {{ $slot }}
      </div>

      {{-- footer --}}
      @if (isset($footer))
        <div class="t-modal-footer">
          {{ $footer }}
        </div>
      @endif
    </div>
  </div>
@else
  bro you missed <strong>open</strong> param 😩
@endif
