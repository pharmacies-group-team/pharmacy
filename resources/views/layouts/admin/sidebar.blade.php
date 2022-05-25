<nav class="sidebar" x-show="isSidebarOpen"
    @resize.window="isSidebarOpen = window.innerWidth >= 786 ? true : false">

    {{-- link to home page --}}
    <x-logo />

    {{-- sidebar links --}}
    <ul class="list">

        {{-- users --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.index') active @endif"
                href="{{ route('admin.index') }}">
                <x-font-icon icon='chart-pie' />

                <span>الاحصائيات</span>
            </a>
        </li>

        {{-- users --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.users.index') active @endif"
                href="{{ route('admin.users.index') }}">
                <x-font-icon icon='user' />

                <span>إدارة المستخدمين</span>
            </a>
        </li>

        {{-- orders --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.orders') active @endif"
                href="{{ route('admin.orders') }}">

                <x-font-icon icon='store' />

                <span> الطلبات</span>
            </a>
        </li>

        {{-- invoice profile --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.financial.operations') active @endif"
                href="{{ route('admin.financial.operations') }}">

                <x-font-icon icon='sack-dollar' />

                <span>@lang('heading.invoice-profile')</span>
            </a>
        </li>

        {{-- orders --}}
        {{-- <li>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-bell align-middle">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
            </div>
            <a class="list-item-link  @if (Route::currentRouteName() === 'admin.orders') active @endif"
                href="{{ route('admin.orders') }}">الزبائن</a>
        </li> --}}

        {{-- ads --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.ads.index') active @endif"
                href="{{ route('admin.ads.index') }}">
                <x-font-icon icon='bullhorn' />

                <span>إدارة الإعلانات</span>
            </a>
        </li>

        {{-- Site Management --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.site') active @endif" href="{{ route('admin.site') }}">
                <x-font-icon icon='browser' />

                <span>أدارة بيانات الموقع</span>
            </a>
        </li>

        {{-- Payment Method --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.payments.index') active @endif"
                href="{{ route('admin.payments.index') }}">
                <x-font-icon icon='credit-card' />

                <span>إدارة طرق الدفع</span>
            </a>
        </li>

        {{-- City Method --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.cities.index') active @endif"
                href="{{ route('admin.cities.index') }}">
                <x-font-icon icon='city' />

                <span>إدارة المدن</span>
            </a>
        </li>

        {{-- City Method --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.directorates.index') active @endif"
                href="{{ route('admin.directorates.index') }}">
                <x-font-icon icon='signs-post' />

                <span>إدارة المديريات</span>
            </a>
        </li>

        {{-- City Method --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.neighborhoods.index') active @endif"
                href="{{ route('admin.neighborhoods.index') }}">
                <x-font-icon icon='house-building' />
                <span>إدارة المناطق</span>
            </a>
        </li>


        {{-- account settings --}}
        <li>
            <a class="list-item-link @if (Route::currentRouteName() === 'admin.account-settings') active @endif"
                href="{{ route('admin.account-settings') }}">
                <x-font-icon icon='id-card' />

                <span>إعدادات الحساب</span>
            </a>
        </li>

    </ul>
</nav>
