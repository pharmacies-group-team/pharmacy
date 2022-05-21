<nav class="sidebar" x-show="isSidebarOpen"
  @resize.window="isSidebarOpen = window.innerWidth >= 786 ? true : false">

  <x-logo />

  {{-- sidebar links --}}
  <ul class="list">

    {{-- orders --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.orders.index') active @endif"
        href="{{ route('client.orders.index') }}">
        <x-font-icon icon='store' />

        <span>إدارة الطلبات</span>
      </a>
    </li>

    {{-- periodic orders --}}
    {{-- TODO change icon --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.showTasks') active @endif" href="{{ route('client.showTasks') }}">
        <x-font-icon icon='calendar-days' />

        <span> الطلبات الدورية</span>
      </a>
    </li>

    {{-- invoice profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.financial.operations') active @endif"
        href="{{ route('client.financial.operations') }}">
        <x-font-icon icon='sack-dollar' />

        <span>@lang('heading.invoice-profile')</span>
      </a>
    </li>

    {{-- chat --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.chat') active @endif" href="{{ route('client.chat') }}">
        <x-font-icon icon='comments' />

        <span>@lang('heading.chat') </span>
      </a>
    </li>

    {{-- addresses --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.address') active @endif" href="{{ route('client.address') }}">
        <x-font-icon icon='map-location-dot' />

        <span>إدارة عناوين التوصيل </span>
      </a>
    </li>

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.account-settings') active @endif"
        href="{{ route('client.account-settings') }}">
        <x-font-icon icon='id-card' />

        <span>إعدادات الحساب </span>
      </a>
    </li>

  </ul>
</nav>
