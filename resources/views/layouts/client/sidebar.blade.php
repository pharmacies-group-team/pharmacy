<nav class="sidebar" x-show="isSidebarOpen"
  @resize.window="isSidebarOpen = window.innerWidth >= 786 ? true : false">

  {{-- link to home page --}}
  <a class="sidebar-brand" href="{{ route('home') }}">
    <span>صيدلية اون لاين</span>
  </a>

  {{-- sidebar links --}}
  <ul class="list">

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

    {{-- invoice profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.financial.operations') active @endif"
         href="{{ route('client.financial.operations') }}">
        <div class="icon">
          <ion-icon src='{{ asset('images/icons/money.svg') }}'></ion-icon>
        </div>

        <span>@lang('heading.invoice-profile')</span>
      </a>
    </li>

    {{-- chat --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.chat') active @endif" href="{{ route('client.chat') }}">
        <div class="icon">
          <ion-icon src='{{ asset('images/icons/messages.svg') }}'></ion-icon>
        </div>

        <span>@lang('heading.chat') </span>
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

    {{-- profile --}}
    <li>
      <a class="list-item-link @if (Route::currentRouteName() === 'client.account-settings') active @endif"
         href="{{ route('client.account-settings') }}">

        <div class="icon">
          <ion-icon src='{{ asset('images/icons/profile.svg') }}'></ion-icon>
        </div>

        <span>إعدادات الحساب </span>
      </a>
    </li>

  </ul>
</nav>
