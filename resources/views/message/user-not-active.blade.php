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

{{-- Navbar --}}
@include('layouts.web.navbar')


{{-- Content --}}
<div class="container">
  <div class="pt-5">
    <div class="d-flex mt-5 flex-column gap-4 align-items-center justify-content-center">
      <img class="img-fluid w-25" src="{{ asset('vector/deactive-user.svg') }}">
      <p class="text-primary-darker fs-5 mt-5">يبدوا انه تم إلغاء تنشيط حسابك،
        يمكنك التواصل معنا..
      </p>
    </div>
  </div>
</div>



{{-- scripts --}}
@include('layouts.web.script')


</body>

</html>
