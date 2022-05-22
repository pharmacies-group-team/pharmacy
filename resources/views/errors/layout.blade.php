<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Tokyo">
  <meta name="keywords" content="pharmacy online">
  <meta name="description" content="pharmacy online">
  <title>صيدلية أون لاين</title>

  @include('layouts.web.style')
  @include('layouts.shared.styles')



</head>

<body style="background: #F7F9FE">

  <div class="flex-center mt-5">
    <div class="content">
      @yield('message')
    </div>
  </div>

  {{-- scripts --}}
  @include('layouts.web.script')


</body>

</html>
