@php use App\Enum\{RoleEnum, UserEnum} @endphp

<header id="header" class="header top-header bg-blur">
  <div class="top-left">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}" alt="Logo"></a>
      <a class="navbar-brand hidden" href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}"
          alt="Logo"></a>
      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
    </div>
  </div>

  <div class="top-right">
    <div class="header-menu">
      <div class="header-left">
        {{-- <button class="search-trigger"><i class="fa fa-search"></i></button> --}}
        {{-- <div class="form-inline"> --}}
        {{-- <form class="search-form"> --}}
        {{-- <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search"> --}}
        {{-- <button class="search-close" type="submit"><i class="fa fa-close"></i></button> --}}
        {{-- </form> --}}
        {{-- </div> --}}

        {{-- <div class="dropdown for-notification"> --}}
        {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
        {{-- <i class="fa fa-bell"></i> --}}
        {{-- <span class="count bg-danger">3</span> --}}
        {{-- </button> --}}
        {{-- <div class="dropdown-menu" aria-labelledby="notification"> --}}
        {{-- <p class="red">You have 3 Notification</p> --}}
        {{-- <a class="dropdown-item media" href="#"> --}}
        {{-- <i class="fa fa-check"></i> --}}
        {{-- <p>Server #1 overloaded.</p> --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}

        {{-- <div class="dropdown for-message"> --}}
        {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
        {{-- <i class="fa fa-envelope"></i> --}}
        {{-- <span class="count bg-primary">4</span> --}}
        {{-- </button> --}}
        {{-- <div class="dropdown-menu" aria-labelledby="message"> --}}
        {{-- <p class="red">You have 4 Mails</p> --}}
        {{-- <a class="dropdown-item media" href="#"> --}}
        {{-- <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span> --}}
        {{-- <div class="message media-body"> --}}
        {{-- <span class="name float-left">Jonathan Smith</span> --}}
        {{-- <span class="time float-right">Just now</span> --}}
        {{-- <p>Hello, this is an example msg</p> --}}
        {{-- </div> --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
      </div>

      <div class="user-area dropdown float-right">
        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="user-avatar rounded-circle"
            src="@if (Auth::user()->avatar) {{ asset(UserEnum::USER_AVATAR_PATH . Auth::user()->avatar) }} @else {{ asset(UserEnum::USER_AVATAR_DEFAULT) }} @endif"
            alt="User Avatar">
        </a>

        <div class="user-menu dropdown-menu">
          <a class="dropdown-item text-primary-dark d-flex align-items-center" href="
                 @if (Auth::user()->hasRole(\App\Enum\RoleEnum::PHARMACY)) {{ route('pharmacy.profile', Auth::user()->pharmacy->id) }}
                 @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::CLIENT))
                   # @endif
               ">
            <i class="bi bi-person-fill text-primary-light m-2"></i> الملف الشخصي
          </a>
          <a class="dropdown-item text-primary-dark d-flex align-items-center" href="
                 @if (Auth::user()->hasRole(\App\Enum\RoleEnum::PHARMACY)) {{ route('setting.index') }}
                 @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::CLIENT))
                   # @endif
               ">
            <i class="bi bi-speedometer text-primary-light m-2"></i> إعدادات الحساب
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf

            <button type="submit" class="dropdown-item text-primary-dark d-flex align-items-center">
              <i class="bi bi-box-arrow-down-right text-primary-light m-2"></i> تسجيل الخروج
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>
