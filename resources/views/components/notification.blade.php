@php
use App\Enum\PharmacyEnum;
use App\Enum\UserEnum;

if (isset($notification)) {
    $message = $notification->data['message'];
    $link = $notification->data['link'];
    $name = $notification->data['sender']['name'];
    $isRead = $notification['read_at'] != null;
}

@endphp

@if (isset($notification))
  <li class='t-item'>
    <a href="{{ url($link) }}">
      <header class="t-item-header">
        {{-- avatar --}}
        <div @class(['is-not-read' => !$isRead, 't-avatar'])>
          {{-- admin and client --}}
          @if (isset($notification->data['sender']['avatar']))
            <img src="{{ asset(UserEnum::USER_AVATAR_PATH . $notification->data['sender']['avatar']) }}"
              alt="user avatar" class="t-avatar" width="40px">
          @endif

          {{-- pharmacy --}}
          @if (isset($notification->data['sender']['logo']))
            <img src="{{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $notification->data['sender']['logo']) }}"
              alt="user avatar" class="t-avatar" width="40px">
          @endif
        </div>

        {{-- user info --}}
        <div>
          <div class="t-user">
            <h4 class="t-name">{{ $name }}</h4>

            <span class="t-date">{{$notification->created_at->diffForHumans()}}</span>
          </div>

          <p class="t-desc" style="font-size: 14px; color: #588FF4">
            {{ mb_substr($message, 0, 32, 'utf-8') }}...
          </p>
        </div>
      </header>
    </a>
  </li>
@else
  <div class="t-param-error">

    <strong>x-notification</strong>
    <span>notification</span>
  </div>
@endif
