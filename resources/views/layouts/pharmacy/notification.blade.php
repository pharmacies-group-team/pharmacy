@php use App\Enum\UserEnum; @endphp

<li class="t-item">
  <a href="{{ route($notification->data['link']) }}">
    <header class="t-header">
      <img src="@if (isset($notification->data['sender']['avatar']))
      {{ asset(UserEnum::USER_AVATAR_PATH . $notification->data['sender']['avatar']) }}
      @else {{ asset(UserEnum::USER_AVATAR_DEFAULT) }} @endif"
           alt="user avatar" class="t-avatar" width="40">
      <h4 class="t-name">{{ $notification->data['sender']['name'] }}</h4>
    </header>
    <p class="t-desc" style="font-size: 14px; color: #588FF4">{{ $notification->data['message'] }}</p>
  </a>
</li>
