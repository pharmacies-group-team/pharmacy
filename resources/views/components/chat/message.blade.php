@php
if (!isset($isMessageLeft)) {
    $isMessageLeft = false;
}
@endphp


<div @class([
    't-message',
    't-message-left' => $isMessageLeft,
])>
  {{-- avatar --}}
  <div class="t-message-avatar">
    <img src="{{ $userAvatar }}" alt="user avatar" width="50px" height="50px">
  </div>

  {{-- content --}}
  <div class="t-content">
    <p>{{ $content }}</p>
    {{-- time --}}
    <span>{{ $time }}</span>
  </div>
</div>
