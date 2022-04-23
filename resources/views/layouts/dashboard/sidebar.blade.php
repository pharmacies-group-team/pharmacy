<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
      <a class="sidebar-brand" href="{{asset('index')}}">
        <span class="align-middle">صحتي</span>
      </a>

        

        <ul class="sidebar-nav">
         

          <li class="sidebar-item">
            <a class="sidebar-link"  href="{{asset('profile')}}">
              <i class="align-middle" data-feather="user"></i>
              <span class="align-middle">الصفحة الشخصية</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="{{asset('ads')}}">
              <i class="align-middle  fas fa-fw  fa-bullhorn"></i>

              <span class="align-middle">الاعلانات</span>
            </a>
          </li>

        <li class="sidebar-item">
          <a
            data-bs-target="#multi"
            data-bs-toggle="collapse"
            class="sidebar-link"
            aria-expanded="true"
          >
            <i class="align-middle" data-feather="users"></i>

            <span class="align-middle">إدارات المستخدم </span>
          </a>
          <ul
            id="multi"
            class="list-unstyled collapse show"
            data-bs-parent="#sidebar"
          >
            <li class="sidebar-item">
              <a
                data-bs-target="#multi-2"
                class="sidebar-link collapsed"
                aria-expanded="false"
                href="{{asset('admins')}}"
              >
                الادمن</a
              >
            </li>

            <li class="sidebar-item">
              <a
                data-bs-target="#multi-2"
                class="sidebar-link collapsed"
                aria-expanded="false"
                href="{{asset('pharmacies')}}"
                >الصيدليات</a
              >
            </li>

            <li class="sidebar-item">
              <a
                data-bs-target="#multi-2"
                class="sidebar-link collapsed"
                aria-expanded="false"
                href="{{asset('clients')}}"

                
                >المستخدمين</a
              >
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link"                 
          href="{{asset('manage-pages')}}"
          >
            <i class="align-middle" data-feather="sliders"></i>
            <span class="align-middle">أدارة بيانات الموقع</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>

{{-- 

  <div class="mb-2">
    <i class="align-middle me-2 fas fa-fw fa-bullhorn"></i> <span class="align-middle">bullhorn</span>
  </div> --}}