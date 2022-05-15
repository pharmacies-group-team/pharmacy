<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>صيدلية اون لاين</title>

  @livewireStyles()
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

  @livewireStyles()



</head>

<body>


  <div class="dashboard" x-data="{ isSidebarOpen: window.innerWidth >= 786 ? true : false }">
    {{-- sidebar --}}
    @include('layouts.client.sidebar')

    <div class="dashboard-content">
      {{-- navbar --}}
      @include('layouts.client.navbar')

      @yield('content')
    </div>
  </div>

  @livewireScripts()

  @yield('alpine-script')
  <script src="{{ asset('js/alpine.min.js') }}"></script>
</body>

</html>
