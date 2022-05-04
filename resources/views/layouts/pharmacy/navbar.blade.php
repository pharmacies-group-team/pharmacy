@php
use App\Enum\PharmacyEnum;
@endphp

<header>
  <nav class="nav">
    {{-- menu icon --}}
    <button class="menu-icon" @click="isSidebarOpen = !isSidebarOpen">
      <x-icon icon='menu' />
    </button>

    {{-- nav end --}}
    <div class="nav-end">
      {{-- notification --}}
      <div class="notification">
        {{-- icon --}}
        <div class="notification-icon active">
          <x-icon icon="notification" />
        </div>

        {{-- content --}}
        <div class="notification-content">
        </div>
      </div>

      {{-- user avatar --}}
      @if (isset($pharmacy))
        <div class="nav-avatar">
          <img
            src="@if (isset($pharmacy->logo)) {{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $pharmacy->logo) }} @else {{ asset(PharmacyEnum::PHARMACY_LOGO_DEFAULT) }} @endif"
            width="50%" class="rounded-circle img-fluid" alt="">
        </div>
      @endif
    </div>
  </nav>
</header>
