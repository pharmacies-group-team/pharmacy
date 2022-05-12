<nav class="sidebar" x-show="isSidebarOpen"
  @resize.window="isSidebarOpen = window.innerWidth >= 786 ? true : false">

  {{-- link to home page --}}
  <a class="sidebar-brand" href="{{ route('home') }}">
    <span>صيدلية اون لاين</span>
  </a>

  {{-- sidebar links --}}
  <ul class="list">
    {{-- index --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.index') active @endif" href="{{ route('pharmacy.index') }}">

        <x-icon icon="home" />

        <span>لوحة التحكم</span>
      </a>
    </li>

    {{-- message --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.messages') active @endif"
        href="{{ route('pharmacy.messages') }}">

        <x-icon icon="message" />

        <span>الرسائل </span>
      </a>
    </li>

    {{-- orders --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.orders.index') active @endif"
        href="{{ route('pharmacy.orders.index') }}">

        <x-icon icon="order" />

        <span>إدارة الطلبات</span>
      </a>
    </li>

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.profile') active @endif" href="{{ route('pharmacy.profile') }}">

        <x-icon icon="profile" />

        <span>بروفايل الصيدلية</span>
      </a>
    </li>

    {{-- account settings --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.account-settings') active @endif"
        href="{{ route('pharmacy.account-settings') }}">

        <x-icon icon="setting" />

        <span>أعدادات الحساب</span>
      </a>
    </li>

    {{-- invoice profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.invoice-profile') active @endif"
        href="{{ route('pharmacy.invoice-profile') }}">
        {{-- TODO --}}
        <x-icon icon="order" />

        <span>@lang('heading.invoice-profile')</span>
      </a>
    </li>
  </ul>
</nav>
