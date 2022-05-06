<nav class="sidebar" x-show="isSidebarOpen"
  @resize.window="isSidebarOpen = window.innerWidth >= 786 ? true : false">

  {{-- link to home page --}}
  <a class="sidebar-brand" href="{{ route('client.index') }}">
    <span>صيدلية اون لاين</span>
  </a>

  {{-- sidebar links --}}
  <ul class="list">
    {{-- index --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.index') active @endif" href="{{ route('client.index') }}">

        <x-icon icon="home" />

        <span>لوحة التحكم</span>
      </a>
    </li>

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.profile') active @endif" href="{{ route('client.profile') }}">

        <x-icon icon="profile" />

        <span>بروفايل </span>
      </a>
    </li>

    {{-- orders --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.orders.index') active @endif"
        href="{{ route('client.orders.index') }}">

        <x-icon icon="order" />

        <span>إدارة الطلبات</span>
      </a>
    </li>
  </ul>
</nav>
