<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  @include('layouts/dashboard/header')

  <link href="{{ asset('css/dashboard/client.css') }}" rel="stylesheet" />

</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="right" data-sidebar-layout="compact">

  <div class="wrapper">
    {{-- sidebar --}}
    {{-- @include('layouts/dashboard/client-sidebar') //TODO --}}


    {{-- main --}}
    <div class="main">
      {{-- navbar --}}
      @include('layouts/dashboard/navbar')
      @yield('content')



    </div>

    {{-- footer --}}

    @include('layouts/dashboard/footer')
