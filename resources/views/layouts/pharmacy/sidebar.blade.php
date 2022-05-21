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
        <x-font-icon icon='chart-pie' />

        <span>الاحصائيات</span>
      </a>
    </li>

    {{-- orders --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.orders.index') active @endif"
        href="{{ route('pharmacy.orders.index') }}">

        <x-font-icon icon='store' />

        <span>إدارة الطلبات</span>
      </a>
    </li>

    {{-- invoice profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.financial.operations') active @endif"
        href="{{ route('pharmacy.financial.operations') }}">
        <x-font-icon icon='sack-dollar' />

        <span>@lang('heading.invoice-profile')</span>
      </a>
    </li>

    {{-- chat --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.chat') active @endif" href="{{ route('pharmacy.chat') }}">
        <x-font-icon icon='comments' />
        <span>@lang('heading.chat') </span>
      </a>
    </li>

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.profile') active @endif" href="{{ route('pharmacy.profile') }}">
        <x-font-icon icon='capsules' />

        <span>الملف الشخصي </span>
      </a>
    </li>

    {{-- account settings --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.account-settings') active @endif"
        href="{{ route('pharmacy.account-settings') }}">
        <x-font-icon icon='id-card' />

        <span>إعدادات الحساب</span>
      </a>
    </li>

  </ul>
</nav>
