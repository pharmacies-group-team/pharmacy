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
      <a class="list-item-link @if (Route::currentRouteName() === 'client.index') active @endif" href="{{ route('client.index') }}">

        <div class="icon">
          <ion-icon src='{{ asset('images/icons/dashboard.svg') }}'></ion-icon>
        </div>

        <span>لوحة التحكم</span>
      </a>
    </li>

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.account-settings') active @endif"
        href="{{ route('client.account-settings') }}">

        <div class="icon">
          <ion-icon src='{{ asset('images/icons/profile.svg') }}'></ion-icon>
        </div>

        <span>بروفايل </span>
      </a>
    </li>

    {{-- orders --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.orders.index') active @endif"
        href="{{ route('client.orders.index') }}">

        <div class="icon">
          <ion-icon src='{{ asset('images/icons/orders.svg') }}'></ion-icon>
        </div>


        <span>إدارة الطلبات</span>
      </a>
    </li>

    {{-- addresses --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.address') active @endif" href="{{ route('client.address') }}">
        <div class="icon">
          <ion-icon src='{{ asset('images/icons/delivery.svg') }}'></ion-icon>
        </div>

        <span>إدارة عناوين التوصيل </span>
      </a>
    </li>

    {{-- chat --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.chat.index') active @endif"
        href="{{ route('client.chat.index') }}">
        <div class="icon">
          <ion-icon src='{{ asset('images/icons/messages.svg') }}'></ion-icon>
        </div>

        <span>@lang('heading.chat') </span>
      </a>
    </li>


    {{-- invoice profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.invoice-profile') active @endif"
        href="{{ route('client.invoice-profile') }}">
        <div class="icon">
          <ion-icon src='{{ asset('images/icons/money.svg') }}'></ion-icon>
        </div>

        <span>@lang('heading.invoice-profile')</span>
      </a>
    </li>

  </ul>
</nav>
