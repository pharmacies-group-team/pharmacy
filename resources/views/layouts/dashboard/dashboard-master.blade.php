<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>صيدلية اون لاين</title>

  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="dashboard" x-data="{ isSidebarOpen: true }">
    {{-- sidebar --}}
    @include('layouts.dashboard.sidebar')

    <div class="dashboard-content">
      {{-- navbar --}}
      @include('layouts.dashboard.navbar')

      @yield('content')
    </div>
  </div>

  <script src="{{ asset('js/alpine.min.js') }}"></script>
</body>

</html>
