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

  <title>@yield('title')</title>

</head>
<body>
  @include('includes.alert-web')
  {{-- Navbar --}}
  @include('layouts.web.navbar')

  @if(Request::is('/') || Request::is('home'))
    {{-- Landing Section --}}
    @include('layouts.web.landing')
  @endif

  <main>
    {{--  Content  --}}
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('layouts.web.footer')

@include('layouts.web.script')
</body>
</html>
