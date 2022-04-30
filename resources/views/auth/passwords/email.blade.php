@extends('layouts.web.master')

@section('content')

  <section class="mt-5">
    <div class="container-lg p-lg-0 px-5">
      <div class="card card-blur w-75 m-auto" style="background-image: url({{ asset('images/login.svg') }});
        background-repeat: no-repeat;
        background-position:  right; height: 350px;">
        <div class="row">
          <div class="col-lg-6  col-md-6 col-12">

          </div>
          <div class="col-lg-6 col-md-6 col-12 p-5">
            <form method="POST" action="{{ route('password.email') }}" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="col-12">
                <h1 class="text-primary-base fw-bold fs-3">إعادة تعيين كلمة المرور</h1>
              </div>
              <div class="col-12 input-group flex-nowrap position-relative">
                <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  <i class="bi bi-envelope text-black-50"></i>
                </div>
                <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror rounded-2 pr" placeholder="البريد الإلكتروني" aria-label="email" aria-describedby="addon-wrapping">
              </div>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              <button class="btn btn-primary d-block w-100" type="submit">إرسال</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

{{--<div class="container-lg">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
