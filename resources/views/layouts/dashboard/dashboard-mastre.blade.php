<!DOCTYPE html>
<html lang="ar" dir="rtl">

  <head>
    {{-- header --}}

    @include('layouts/dashboard/header')
</head>

<body
  data-theme="default"
  data-layout="fluid"
  data-sidebar-position="right"
  data-sidebar-layout="default"
>

  <div class="wrapper">
    {{-- sidebar --}}
  @include('layouts/dashboard/sidebar')

  {{-- main --}}
  <div class="main">
    {{-- navbar --}}
    @include('layouts/dashboard/navbar')
    @yield('content')



  </div>

  {{-- footer --}}

   @include('layouts/dashboard/footer')