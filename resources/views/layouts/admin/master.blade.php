<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>صيدلية اون لاين</title>

  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />

  @livewireStyles()

</head>

<body>
  <div class="dashboard" x-data="{ isSidebarOpen: window.innerWidth >= 786 ? true : false }">
    {{-- sidebar --}}
    @include('layouts.admin.sidebar')

    <div class="dashboard-content">
      {{-- navbar --}}
      @include('layouts.shared.navbar')


      @yield('content')
    </div>
  </div>

  @livewireScripts()
  <script>
    function imageViewer() {
      return {
        imageUrl: '',

        fileChosen(event) {
          this.fileToDataUrl(event, src => this.imageUrl = src)
        },

        fileToDataUrl(event, callback) {
          if (!event.target.files.length) return

          let file = event.target.files[0],
            reader = new FileReader()

          reader.readAsDataURL(file)
          reader.onload = e => callback(e.target.result)
        },
      }
    }
  </script>
  <script src="{{ asset('js/alpine.min.js') }}"></script>

  {{-- ionicons --}}
  <script def type="module" src="{{ asset('js/icons/ionicons.esm.js') }}"></script>
  <script def nomodule src="{{ asset('js/icons/ionicons.js') }}"></script>

</body>

</html>
