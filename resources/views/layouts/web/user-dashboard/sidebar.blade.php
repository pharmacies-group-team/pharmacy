<aside id="left-panel" class="left-panel bg-body">
  <nav class="navbar navbar-expand-sm navbar-default bg-body vh-100 align-items-start">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="">
          <a href="" class=" fw-normal text-primary-darker"><i class="menu-icon fa fa-laptop"></i>لوحة التحكم </a>
        </li>
        <li class="@if(Route::currentRouteName() === 'setting.index') active @endif">
          <a href="{{ route('setting.index') }}" class=" fw-normal text-primary-darker"><i class="menu-icon fa fa-cogs"></i>إعدادات الحساب</a>
        </li>
        <li class="">
          <a href="" class="d-flex align-items-center fw-normal text-primary-darker"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="menu-icon bi bi-box-arrow-down-right"></i>تسجيل الخروج
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside>
