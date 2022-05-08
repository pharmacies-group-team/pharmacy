<nav class="sidebar" x-show="isSidebarOpen"
  @resize.window="isSidebarOpen = window.innerWidth >= 786 ? true : false">

  {{-- link to home page --}}
  <a class="sidebar-brand" href="{{ route('admin.index') }}">
    <span>صيدلية اون لاين</span>
  </a>

  {{-- sidebar links --}}
  <ul class="list">
    {{-- profile --}}
    <li>


      <a class="list-item-link @if (Route::currentRouteName() === 'admin.profile') active @endif" href="{{ route('admin.profile') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>الصفحة الشخصية</span>
      </a>
    </li>

    {{-- pharmacies --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'admin.pharmacies') active @endif" href="{{ route('admin.pharmacies') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>الصيدليات</span>
      </a>
    </li>

    {{-- clients --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'admin.clients') active @endif" href="{{ route('admin.clients') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>الزبائن</span>
      </a>
    </li>

    {{-- orders --}}
    {{-- <li>
      <div class="list-item-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-bell align-middle">
          <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
          <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
      </div>
      <a class="list-item-link  @if (Route::currentRouteName() === 'admin.orders') active @endif" href="{{ route('admin.orders') }}">الزبائن</a>
    </li> --}}

    {{-- ads --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'admin.ads.index') active @endif" href="{{ route('admin.ads.index') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>إدارة الإعلانات</span>
      </a>
    </li>

    {{-- Site Managment   --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'admin.site') active @endif" href="{{ route('admin.site') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>أدارة بيانات الموقع</span>
      </a>
    </li>

    {{-- Payment Method --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'admin.payments.index') active @endif" href="{{ route('admin.payments.index') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>إدارة طرق الدفع</span>
      </a>
    </li>

    {{-- City Method --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === '') active @endif" href="{{ route('admin.payments.index') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>إدارة المدن</span>
      </a>
    </li>

    {{-- City Method --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === '') active @endif" href="{{ route('admin.payments.index') }}">
        <div class="list-item-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-bell align-middle">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
        </div>

        <span>إدارة المناطق</span>
      </a>
    </li>

    {{-- account settings --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'admin.account-settings') active @endif"
         href="{{ route('admin.account-settings') }}">

        <x-icon icon="setting" />

        <span>أعدادات الحساب</span>
      </a>
    </li>
  </ul>
</nav>
