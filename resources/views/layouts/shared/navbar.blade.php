@php
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Enum\RoleEnum;
use App\Enum\UserEnum;
use App\Enum\PharmacyEnum;

$user = User::find(Auth::id());

if (Auth::user()->hasRole(RoleEnum::PHARMACY)) $type = 'pharmacy';
elseif (Auth::user()->hasRole(RoleEnum::CLIENT)) $type = 'client';
elseif (Auth::user()->hasRole(RoleEnum::SUPER_ADMIN)) $type = 'admin';

@endphp


<header>
  <nav class="nav">
    {{-- menu icon --}}
    <button class="menu-icon" @click="isSidebarOpen = !isSidebarOpen">
      <x-icon icon='menu' />
    </button>

    {{-- nav end --}}
    <div class="nav-end">

      {{-- wallet --}}
      <div class="wallet">
        <a href="{{ route($type.'.financial.operations') }}" class="wallet-box">
          <span>YER {{ Auth::user()->balance }}</span>
          <x-icon icon='wallet' />
        </a>
      </div>

      {{-- notification --}}
      <div class="t-notification" x-data="{ open: false }" @click="open = true" @click.away="open = false">
        {{-- icon --}}
        <div class="t-notification-icon dropdown-notifications-js">
          <a style="position: relative" data-toggle="dropdown">
            <x-icon icon="notification" />

            <span class="js-notify-count t-notification-counter"
              data-count="{{ auth()->user()->unreadNotifications()->count() }}">
              {{ auth()->user()->unreadNotifications()->count() }}
            </span>
          </a>
        </div>

        {{-- content --}}
        {{-- notification item --}}
        <div class="t-notification-content-wrapper" :class="open ? 'is-open' : ''">
          <div class="t-notification-header">
            <h5 class="t-title">الإشعارات</h5>
          </div>

          <ul class="t-notification-content js-dropdown-menu">

            @if (isset(Auth::user()->unreadNotifications))
              @foreach (Auth::user()->unreadNotifications as $notification)
                @if ($notification->type == 'App\Events\NewOrderNotification')
                  @if (Auth::user()->hasRole(RoleEnum::CLIENT))
                    {{-- pharmacy notification --}}
                    <x-notification :notification="$notification" />
                  @endif

                  {{-- client notification --}}
                  @if (Auth::user()->hasRole(RoleEnum::PHARMACY))
                    <x-notification :notification="$notification" />
                  @endif

                  {{-- admin notification --}}
                  @if ($notification->type == 'App\Events\AdminNotification')
                    <x-notification :notification="$notification" />
                  @endif
                @endif
              @endforeach
            @endif
          </ul>

          <div class="t-notification-footer">
            <a href="{{ route('notification') }}" class="t-desc">عرض جميع الإشعارات</a>
          </div>
        </div>
      </div>

      {{-- user avatar --}}
      @if (isset($user))
        <div class="nav-avatar t-dropdown" x-data="{ dropdown: false }" @mouseover="dropdown = true"
          @mouseover.away="dropdown = false">
          <img src="{{ asset(UserEnum::USER_AVATAR_PATH . $user->avatar) }}">

          <form class="t-dropdown-item" x-show="dropdown" action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit">Log out</button>
          </form>
        </div>
      @endif

    </div>
  </nav>
</header>
