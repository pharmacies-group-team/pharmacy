@php
if (!isset($messageCount)) {
    $messageCount = 0;
}

if (!isset($time)) {
    $time = '1M';
}

if (!isset($isActive)) {
    $isActive = false;
}
@endphp

<div @class([
    't-item js-user-item',
    'is-active' => $isActive,
])>
  {{-- user avatar --}}
  <div class="t-item-avatar">
    <img src="{{ $userImage }}" alt="user avatar" width="40px" height="40px">

    {{-- message count --}}
    @if ((int) $messageCount > 0)
      <span class="t-item-message-count">{{ $messageCount }}</span>
    @endif
  </div>

  {{-- name --}}
  <div class="t-item-name">
    <header>
      {{-- title --}}
      <h3 class="t-item-title">{{ $name }}</h3>

      {{-- time --}}
      <span class="t-item-time">{{ $time }}</span>
    </header>
    <footer>
      <p>
        {{ mb_substr($message, 0, 40, 'utf-8') }}...
      </p>
    </footer>
  </div>
</div>
