<nav class="sidebar" x-show="isSidebarOpen"
  @resize.window="isSidebarOpen = window.innerWidth >= 786 ? true : false">

  {{-- link to home page --}}
  <a class="sidebar-brand" href="{{ route('pharmacies.dashboard.index') }}">
    <span>صيدلية اون لاين</span>
  </a>

  {{-- sidebar links --}}
  <ul class="list">
    {{-- index --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacies.dashboard.index') active @endif"
        href="{{ route('pharmacies.dashboard.index') }}">

        <x-icon icon="home" />

        <span>لوحة التحكم</span>
      </a>
    </li>

    {{-- message --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacies.dashboard.messages') active @endif"
        href="{{ route('pharmacies.dashboard.messages') }}">

        <x-icon icon="message" />

        <span>الرسائل </span>
      </a>
    </li>

    {{-- orders --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacies.dashboard.orders') active @endif"
        href="{{ route('pharmacies.dashboard.orders') }}">

        <x-icon icon="order" />

        <span>إدارة الطلبات</span>
      </a>
    </li>

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacies.dashboard.profile') active @endif"
        href="{{ route('pharmacies.dashboard.profile') }}">

        <x-icon icon="profile" />

        <span>بروفايل الصيدلية</span>
      </a>
    </li>

    {{-- account settings --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacies.dashboard.account-settings') active @endif"
        href="{{ route('pharmacies.dashboard.account-settings') }}">

        <x-icon icon="setting" />

        <span>أعدادات الحساب</span>
      </a>
    </li>
  </ul>
</nav>
