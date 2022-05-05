@php use App\Enum\{RoleEnum, UserEnum} @endphp

<nav class="navbar navbar-light navbar-expand-lg top-header">
  <div class="container-md">
    <div class="row w-100">

      {{-- Logo --}}
      <div class="col-3">
        <a class="navbar-brand h4 text-decoration-none m-0" href="{{ route('home') }}">
          {{-- <img src="{{ asset('images/logo.svg') }}"> --}}
          <h1 class="text-primary-darker fs-3 fw-bold">PHARMACY <span
              class="fs-6 fw-normal text-primary-base">online</span></h1>
        </a>
      </div>

      {{-- Button collapse --}}
      <div class="d-lg-none">
        <button class="navbar-toggler btn btn-sm navbar-burger text-primary-dark" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
          aria-label="Toggle navigation">
          <svg class="d-block text-primary-dark" width="16" height="16" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <title>Mobile menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </button>
      </div>

      {{-- Nav collapse --}}
      <div class="col-5">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav ms-auto me-4">
            <li class="nav-item">
              <a class="nav-link text-primary-darker" href="{{ route('home') }}">
                الرئيسية
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary-darker" href="{{ route('pharmacies') }}">
                الصيدليات
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary-darker" href="#">
                عنَا
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary-darker" href="#">
                تواصل معنا
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-4">
        @if (Route::has('login'))
          @auth
            <div class="dropdown d-lg-inline-flex d-none">
              {{-- user info --}}
              <div class="nav-link dropdown-toggle text-primary-darker cursor-pointer" id="dropdown08"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img
                  src="@if (Auth::user()->avatar) {{ asset(UserEnum::USER_AVATAR_PATH . Auth::user()->avatar) }} @else {{ asset(UserEnum::USER_AVATAR_DEFAULT) }} @endif"
                  width="30" height="20" class="img-fluid rounded-circle border-1 border-secondary border shadow-sm"
                  alt="user avatar">

                <span class="me-2" style="cursor: pointer">{{ Auth::user()->name }}</span>
              </div>

              <ul class="dropdown-menu" style="z-index: 9999999999">
                @if (!Auth::user()->hasRole(\App\Enum\RoleEnum::CLIENT))
                  <li>
                    <a class="dropdown-item text-primary-dark d-flex align-items-center"
                      href="@if (Auth::user()->hasRole(\App\Enum\RoleEnum::SUPER_ADMIN)) {{ route('admin.profile') }}
                      @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::PHARMACY))
                        {{ route('pharmacy.profile', Auth::user()->pharmacy->id) }} @endif">
                      <i class="bi bi-person-fill text-primary-light m-2"></i> الملف الشخصي
                    </a>
                  </li>
                @endif
                <li>
                  <a class="dropdown-item text-primary-dark d-flex align-items-center"
                    href="@if (Auth::user()->hasRole(\App\Enum\RoleEnum::SUPER_ADMIN)) {{ route('admin.ads.index') }}
                         @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::PHARMACY))
                            {{ route('pharmacy.index') }}
                         @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::CLIENT))
                            {{ route('clients.dashboard') }} @endif">
                    <i class="bi bi-speedometer text-primary-light m-2"></i> لوحة التحكم
                  </a>
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button class="dropdown-item text-primary-dark d-flex align-items-center" type="submit">
                      <i class="bi bi-box-arrow-down-right text-primary-light m-2"></i> تسجيل الخروج
                    </button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            <div class="d-none d-lg-flex align-items-center gap-3">
              <a class="btn-rounded" href="{{ route('login') }}">
                تسجيل الدخول
              </a>
              @if (Route::has('register'))
                <a class="btn-rounded" href="{{ route('register') }}">إنشاء حساب</a>
              @endif
            </div>
          @endauth
        @endif
      </div>
    </div>
  </div>
</nav>
