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
        <div class="nav-avatar t-dropdown" x-data="{ dropdown: false }" @mouseover="dropdown = true"
          @mouseover.away="dropdown = false">

          <img
            src="@if (isset($pharmacy->logo)) {{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $pharmacy->logo) }} @else {{ asset(PharmacyEnum::PHARMACY_LOGO_DEFAULT) }} @endif">


          <form class="dropdown-item" x-show="dropdown" action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit">Log out</button>
          </form>
        </div>
      @endif
    </div>
  </nav>
</header>
