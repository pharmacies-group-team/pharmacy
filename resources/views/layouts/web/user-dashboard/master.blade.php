<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Tokyo">
  <meta name="keywords" content="pharmacy online">
  <meta name="description" content="pharmacy online">

  @include('layouts.web.user-dashboard.style')

  <title>@yield('title')</title>
</head>

<body class="bg-body">

  @include('includes.alert-web')

  <!-- Left Panel -->
  @include('layouts.web.user-dashboard.sidebar')


  <div id="right-panel" class="right-panel">
    <!-- Header-->
    @include('layouts.web.user-dashboard.header')

    <!-- Content -->
    <div class="content bg-body">
      <div class="animated fadeIn">
        @yield('content')
      </div>
    </div>
    <div class="clearfix"></div>
  </div>

<!-- Scripts -->
@include('layouts.web.user-dashboard.script')
</body>
</html>
