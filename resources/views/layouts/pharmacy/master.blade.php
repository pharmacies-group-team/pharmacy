<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>صيدلية اون لاين</title>

  @include('layouts.shared.styles')

</head>

<body>
  <div class="dashboard" x-data="{ isSidebarOpen: window.innerWidth >= 786 ? true : false }">
    {{-- sidebar --}}
    @include('layouts.pharmacy.sidebar')

    <div class="dashboard-content">
      {{-- navbar --}}
      @include('layouts.shared.navbar')

      @yield('content')
    </div>
  </div>

  @livewireScripts()
  @include('layouts.shared.scripts')

  @yield('script')
</body>

</html>
