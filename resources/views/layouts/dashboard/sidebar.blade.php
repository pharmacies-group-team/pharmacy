<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    {{-- link to home page --}}
    <a class="sidebar-brand" href="{{ route('home') }}">
      <span class="align-middle">صيدلية اون لاين</span>
    </a>
    {{-- sidebar links --}}
    <ul class="sidebar-nav">
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('admin.profile') }}">
          <i class="align-middle" data-feather="user"></i>
          <span class="align-middle">الصفحة الشخصية</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('admin.ads.index') }}">
          <i class="fas fa-fw fa-bullhorn align-middle"></i>

          <span class="align-middle">الاعلانات</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a data-bs-target="#multi" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
          <i class="align-middle" data-feather="users"></i>

          <span class="align-middle">إدارات المستخدم </span>
        </a>
        <ul id="multi" class="list-unstyled collapse show" data-bs-parent="#sidebar">

          <li class="sidebar-item">
            <a data-bs-target="#multi-2" class="sidebar-link collapsed" aria-expanded="false"
              href="{{ route('admin.pharmacies') }}">الصيدليات</a>
          </li>

          <li class="sidebar-item">
            <a data-bs-target="#multi-2" class="sidebar-link collapsed" aria-expanded="false"
              href="{{ route('admin.clients') }}">الزبائن</a>
          </li>
        </ul>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('admin.site') }}">
          <i class="align-middle" data-feather="sliders"></i>
          <span class="align-middle">أدارة بيانات الموقع</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

{{-- <div class="mb-2">
    <i class="align-middle me-2 fas fa-fw fa-bullhorn"></i> <span class="align-middle">bullhorn</span>
  </div> --}}
