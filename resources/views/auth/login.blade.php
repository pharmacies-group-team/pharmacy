@extends('layouts.web.master')

@section('content')

  <section class="mt-5">
    <div class="container-lg p-lg-0 px-5">
      <div class="card card-blur w-75 m-auto" style="background-image: url({{ asset('images/login.svg') }});background-size: contain;
                background-repeat: no-repeat;
                background-position: bottom right;">
        <div class="row">
          <div class="col-lg-6  col-md-6 col-12">

          </div>
          <div class="col-lg-6 col-md-6 col-12 p-5">
            <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="col-12">
                <h1 class="text-primary-base fw-bold fs-3">تسجيل الدخول</h1>
                <!-- <p class="fw-light fs-6 text-black-50">Sign in to your account using email and password provided during registration.</p> -->
              </div>
              <div class="col-12 input-group flex-nowrap position-relative">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-envelope text-black-50"></i>
                </div>
                <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror rounded-2 pr" placeholder="البريد الإلكتروني" aria-label="email" aria-describedby="addon-wrapping">
              </div>
              @error('email')
              <span class="text-danger" role="alert">
                 {{ $message }}
              </span>
              @enderror
              <div class="col-12 input-group flex-nowrap position-relative">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-lock text-black-50"></i>
                </div>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-2 pr" placeholder="كلمة السر" aria-label="email" aria-describedby="addon-wrapping">
              </div>
              @error('password')
              <span class="text-danger" role="alert">
                  {{ $message }}
              </span>
              @enderror
              <div class="d-flex justify-content-between align-items-center mb-3 mb-3">
                <div class="form-check d-flex gap-4">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label fs-sm me-2" for="keep-signed">تذكرنى</label>
                </div><a class="nav-link-style fs-ms" href="{{ route('password.request') }}">هل نسيت كلمة السر ؟</a>
              </div>
              <button class="btn btn-primary d-block w-100" type="submit">تسجيل الدخول</button>
              <p class="fs-sm pt-3 mb-0 text-primary-darker">ليس لديك حساب ؟ <a href="{{ route('register') }}" class="fw-medium text-primary-base" data-view="#modal-signup-view">إنشاء حساب</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
