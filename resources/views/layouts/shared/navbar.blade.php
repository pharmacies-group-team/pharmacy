@php
use App\Enum\UserEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Enum\RoleEnum;

$user = User::find(Auth::id());
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
        <div class="wallet-box">
          <span>YER {{ \Illuminate\Support\Facades\Auth::user()->balance }}</span>
          <x-icon icon='wallet' />
        </div>
      </div>

      {{-- notification --}}
      <div class="t-notification" x-data="{ open: false }" @click="open = true" @click.away="open = false">
        {{-- icon --}}
        <div class="t-notification-icon dropdown-notifications-js">
          <a style="position: relative" data-toggle="dropdown">
            <x-icon icon="notification" />

            <span class="notif-count t-notification-counter"
              data-count="{{ auth()->user()->unreadNotifications()->count() }}">
              {{ auth()->user()->unreadNotifications()->count() }}
            </span>
          </a>
        </div>

        {{-- content --}}
        <ul class="t-notification-content js-dropdown-menu" :class="open ? 'is-open' : ''" style="width: 300px">
          {{-- notification item --}}
          <li class="t-item">
            <a>
              <p class="t-desc">الإشعارات</p>
            </a>
          </li>
          @if (isset(Auth::user()->unreadNotifications))
            @foreach (Auth::user()->unreadNotifications as $notification)
              @if ($notification->type == 'App\Events\NewOrderNotification')
                @if (Auth::user()->hasRole(RoleEnum::PHARMACY))
                  <x-pharmacy.notification :notification="$notification" />
                @elseif(Auth::user()->hasRole(RoleEnum::CLIENT))
                  <x-client.notification :notification="$notification" />
                @elseif($notification->type == 'App\Events\AdminNotification')
                  <x-admin.notification :notification="$notification" />
                @endif
              @endif
            @endforeach
          @endif
          <li class="t-item">
            <a>
              <a href="{{ route('notification') }}" class="t-desc">عرض جميع الإشعارات</a>
            </a>
          </li>
        </ul>
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
