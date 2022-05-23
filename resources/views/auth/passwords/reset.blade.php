@extends('layouts.web.master')

@section('content')
  <section class="mt-5 vh-100">
    <div class="container-lg p-lg-0 px-5">
      <div class="card card-blur w-75 m-auto"
        style="background-image: url({{ asset('images/login.svg') }}); background-repeat: no-repeat; background-position:  right; height: 350px;">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">

          </div>
          <div class="col-lg-6 col-md-6 col-12 p-5">
            <form method="POST" action="{{ route('password.update') }}" class="row g-3 needs-validation" novalidate>
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="col-12">
                <h1 class="text-primary-base fw-bold fs-3">إعادة تعيين كلمة المرور</h1>
              </div>
              <div class="col-12 input-group position-relative flex-nowrap">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-envelope text-black-50"></i>
                </div>
                <input name="email" value="{{ old('email') }}" type="email"
                  class="form-control @error('email') is-invalid @enderror rounded-2 pr" placeholder="البريد الإلكتروني"
                  aria-label="email" aria-describedby="addon-wrapping" style="padding-right: 40px">
              </div>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <div class="col-12 input-group position-relative flex-nowrap">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-lock text-black-50"></i>
                </div>
                <input name="password" type="password"
                  class="form-control @error('password') is-invalid @enderror rounded-2 pr" placeholder="كلمة السر"
                  aria-describedby="addon-wrapping" style="padding-right: 40px">
              </div>
              @error('password')
                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
              @enderror

              <div class="col-12 input-group position-relative flex-nowrap">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-lock text-black-50"></i>
                </div>
                <input name="password_confirmation" type="password" class="form-control rounded-2 pr"
                  placeholder="تأكيد كلمة السر" aria-label="email" aria-describedby="addon-wrapping"
                  style="padding-right: 40px">
              </div>
              <button class="btn btn-primary d-block w-100" type="submit">إرسال</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
