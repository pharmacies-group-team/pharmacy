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
        <div class="t-notification-icon active">
          <x-icon icon="notification" />
        </div>

        {{-- content --}}
        <div class="t-notification-content" :class="open ? 'is-open' : ''">
          {{-- notification item --}}
          <div class="t-item">
            <a href="#body=hi">
              <header class="t-header">
                {{-- user avatar --}}
                <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" class="t-avatar"
                  width="40">

                {{-- name --}}
                <h4 class="t-name">Ali</h4>
              </header>

              {{-- desc --}}
              <p class="t-desc">bla bla bal</p>
            </a>
          </div>
          {{-- notification item --}}
          <div class="t-item">
            <a href="#">
              <header class="t-header">
                {{-- user avatar --}}
                <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" class="t-avatar"
                  width="40">

                {{-- name --}}
                <h4 class="t-name">Ali</h4>
              </header>

              {{-- desc --}}
              <p class="t-desc">bla bla bal</p>
            </a>
          </div>
        </div>
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
