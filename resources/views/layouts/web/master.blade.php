<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Tokyo">
  <meta name="keywords" content="pharmacy online">
  <meta name="description" content="pharmacy online">

  @include('layouts.web.style')

  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

  <title>@yield('title')</title>

  @livewireStyles()

</head>

<body>

  {{-- Navbar --}}
  @include('layouts.web.navbar')

  @if (Request::is('/') || Request::is('home'))
    {{-- Landing Section --}}
    @include('layouts.web.landing')
  @endif


  {{-- Content --}}
  @yield('content')


  {{-- Footer --}}
  @include('layouts.web.footer')

  {{-- scripts --}}
  @include('layouts.web.script')


  @yield('script')

  @livewireScripts()

  @yield('alpine-script')
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
</body>

</html>
