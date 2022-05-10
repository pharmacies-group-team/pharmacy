@php
use App\Enum\UserEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
      {{-- notification --}}
      <div class="t-notification" x-data="{ open: false }" @click="open = true" @click.away="open = false">
        {{-- icon --}}
        <div class="t-notification-icon dropdown-notifications-js">
          <a style="position: relative" data-toggle="dropdown">
            <x-icon icon="notification" />
            <span class="notif-count" style="position: absolute;top: 0px;background: #e87e00; border-radius: 50%; width: 10px;height: 10px;"  data-count="9">9</span>
          </a>
        </div>

        {{-- content --}}
        <ul class="t-notification-content dropdown-menu" :class="open ? 'is-open' : ''">
          {{-- notification item --}}
          <li class="t-item">
            <a>
              <p class="t-desc">الإشعارات</p>
            </a>
          </li>
        </ul>
      </div>

      {{-- user avatar --}}
      @if (isset($user))
        <div class="nav-avatar t-dropdown" x-data="{ dropdown: false }" @mouseover="dropdown = true"
          @mouseover.away="dropdown = false">
          <img
            src="@if (isset($user->avatar)) {{ asset(UserEnum::USER_AVATAR_PATH . $user->avatar) }} @else {{ asset(UserEnum::USER_AVATAR_DEFAULT) }} @endif">

          <form class="t-dropdown-item" x-show="dropdown" action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit">Log out</button>
          </form>
        </div>
      @endif
    </div>
  </nav>
</header>
