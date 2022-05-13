@php use App\Enum\PharmacyEnum; @endphp

<li class="t-item">
  <a href="{{ route($notification->data['link']) }}">
    <header class="t-header">
      <img src="@if (isset($notification->data['sender']['logo']))
      {{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $notification->data['sender']['logo']) }}
      @else {{ asset(PharmacyEnum::PHARMACY_LOGO_DEFAULT ) }} @endif"
           alt="user avatar" class="t-avatar" width="40">
      <h4 class="t-name">{{ $notification->data['sender']['name'] }}</h4>
    </header>
    <p class="t-desc" style="font-size: 14px; color: #588FF4">{{ $notification->data['message'] }}</p>
  </a>
</li>
