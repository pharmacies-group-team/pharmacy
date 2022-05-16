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

        <div class="icon">
          <ion-icon src='{{ asset('images/icons/dashboard.svg') }}'></ion-icon>
        </div>

        <span>لوحة التحكم</span>
      </a>
    </li>

    {{-- orders --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.orders.index') active @endif"
        href="{{ route('pharmacy.orders.index') }}">

        <div class='icon'>
          <ion-icon src='{{ asset('images/icons/orders.svg') }}'></ion-icon>
        </div>

        <span>إدارة الطلبات</span>
      </a>
    </li>

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.profile') active @endif" href="{{ route('pharmacy.profile') }}">

        <div class='icon'>
          <ion-icon src='{{ asset('images/icons/pharmacy.svg') }}'></ion-icon>
        </div>

        <span>بروفايل الصيدلية</span>
      </a>
    </li>

    {{-- account settings --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.account-settings') active @endif"
        href="{{ route('pharmacy.account-settings') }}">

        <div class='icon'>
          <ion-icon src='{{ asset('images/icons/profile.svg') }}'></ion-icon>
        </div>

        <span>أعدادات الحساب</span>
      </a>
    </li>

    {{-- chat --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.chat.index') active @endif"
        href="{{ route('pharmacy.chat.index') }}">
        <div class="icon">
          <ion-icon src='{{ asset('images/icons/messages.svg') }}'></ion-icon>
        </div>

        <span>@lang('heading.chat') </span>
      </a>
    </li>

    {{-- invoice profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'pharmacy.invoice-profile') active @endif"
        href="{{ route('pharmacy.invoice-profile') }}">

        <div class='icon'>
          <ion-icon src='{{ asset('images/icons/invoice.svg') }}'></ion-icon>
        </div>

        <span>@lang('heading.invoice-profile')</span>
      </a>
    </li>
  </ul>
</nav>
