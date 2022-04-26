@php use App\Enum\{RoleEnum, UserEnum} @endphp

<nav class="navbar navbar-light navbar-expand-lg top-header">
  <div class="container-md">
    <div class="row w-100">
      {{-- Logo --}}
      <div class="col-3">
        <a class="navbar-brand h4 text-decoration-none m-0" href="{{ route('home') }}">
          <img src="{{ asset('images/logo.svg') }}">
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
      <div class="col-6">
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
                عن شفاء
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
      <div class="col-3">
        @if (Route::has('login'))
          @auth
            <div class="dropdown d-lg-inline-flex d-none">
              <a class="nav-link dropdown-toggle text-primary-darker" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset(UserEnum::USER_AVATAR_DEFAULT) }}" width="15%" class="img-fluid rounded-circle border border-1 border-secondary shadow-sm" alt="">
                <span class="me-2">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown08">
                <li><a class="dropdown-item text-primary-dark d-flex align-items-center"
                       href="
                          @if(Auth::user()->hasRole(\App\Enum\RoleEnum::SUPER_ADMIN))
                            {{ route('admin.profile') }}
                          @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::PHARMACY))
                            {{ route('pharmacy.profile', Auth::id()) }}
                          @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::CLIENT))
                            #
                          @endif
                          ">
                    <i class="bi bi-person-fill m-2 text-primary-light"></i> الملف الشخصي
                  </a>
                </li>
                <li><a class="dropdown-item text-primary-dark d-flex align-items-center"
                       href="
                          @if(Auth::user()->hasRole(\App\Enum\RoleEnum::SUPER_ADMIN))
                            {{ route('admin.ads.index') }}
                         @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::PHARMACY))
                            {{ route('pharmacy.profile', Auth::user()->pharmacy->id) }}
                         @elseif(Auth::user()->hasRole(\App\Enum\RoleEnum::CLIENT))
                            #
                         @endif
                          ">
                    <i class="bi bi-speedometer m-2 text-primary-light"></i>  لوحة التحكم
                  </a>
                </li>
                <li>
                  <a class="dropdown-item text-primary-dark d-flex align-items-center"
                       href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-down-right m-2 text-primary-light"></i>  تسجيل الخروج
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
          @else
            <div class="d-none d-lg-flex gap-3 align-items-center">
              <a class="btn btn-primary__linear" href="#">تسجيل الدخول</a>
              @if (Route::has('register'))
                <a class="btn btn-primary__linear" href="{{ route('register') }}">إنشاء حساب</a>
              @endif
            </div>
          @endauth
        @endif
      </div>
    </div>
  </div>
</nav>
