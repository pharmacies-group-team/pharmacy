@extends('layouts.web.master')
@section('title') Register @stop
@section('content')

  <section class="mt-5 vh-100">
    <div class="container-lg px-lg-5 ">
      <div class="card card-blur w-75 m-auto"
        style="background-image: url({{ asset('images/login.svg') }});background-size: contain; background-repeat: no-repeat;background-position: bottom right;">
        <div class="row">
          <div class="col-lg-6 col-0">

          </div>
          <div class="col-lg-6 col-12 p-5">
            <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
              @csrf
              <input hidden value="{{ \App\Enum\RoleEnum::CLIENT }}" name="roles">
              <div class="col-12">
                <h1 class="text-primary-base fw-bold fs-3">إنشاء حساب</h1>
                <!-- <p class="fw-light fs-6 text-black-50">Sign in to your account using email and password provided during registration.</p> -->
              </div>

              <div class="col-12 input-group position-relative flex-nowrap">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-person text-black-50"></i>
                </div>
                <input name="name" value="{{ old('name') }}" type="text"
                  class="form-control @error('name') is-invalid @enderror rounded-2 pr" placeholder="اسم المستخدم"
                  aria-describedby="addon-wrapping" style="padding-right: 40px">
              </div>
              @error('name')
                <span id="exampleInputEmail1-error" class="error text-danger">{{ $message }}</span>
              @enderror

              <div class="col-12 input-group position-relative flex-nowrap">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-envelope text-black-50"></i>
                </div>
                <input name="email" value="{{ old('email') }}" type="email"
                  class="form-control @error('email') is-invalid @enderror rounded-2 pr" placeholder="البريد الإلكتروني"
                  aria-label="email" aria-describedby="addon-wrapping" style="padding-right: 40px">
              </div>
              @error('email')
                <span id="exampleInputEmail1-error" class="error text-danger">{{ $message }}</span>
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
                <span id="exampleInputEmail1-error" class="error text-danger">{{ $message }}</span>
              @enderror

              <div class="col-12 input-group position-relative flex-nowrap">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-lock text-black-50"></i>
                </div>
                <input name="password_confirmation" type="password" class="form-control rounded-2 pr"
                  placeholder="تأكيد كلمة السر" aria-label="email" aria-describedby="addon-wrapping"
                  style="padding-right: 40px">
              </div>
              <button class="btn btn-primary d-block w-100" type="submit">إنشاء حساب</button>
              <p class="fs-sm text-primary-darker mb-0 pt-3">هل لديك حساب ؟ <a href="{{ route('login') }}"
                  class="fw-medium text-primary-base" data-view="#modal-signup-view">تسجيل الدخول</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
