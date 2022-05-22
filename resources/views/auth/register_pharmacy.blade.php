@extends('layouts.web.master')

@section('title') Pharmacy Register @stop

@section('content')
  <!-- Start Register Pharmacy -->
  <section class="mt-5">
    <div class="container-lg p-lg-0 px-5">
      <div class="row">
        <div class="col-lg-7 col-md-6 col-12">
          <div class="p-5">
            <h1 class="text-primary-base fw-bold">هل تملك صيدلية ؟</h1>
            <p class="fs-6 text-primary-darker mt-5">صيدلية أونلاين توفر للعميل إمكانية طلب كافة احتياجاته من الصيدلية سواء
              أدوية أو منتجات غير دوائية أونلاين ليتم تحضير الطلب ثم توصيله بعد ذلك إلى عنوان العميل.</p>
            <p class="fs-6 text-primary-darker mt-3">الآن مع صيدلية أون لاين يمكنك زيادة عدد عملاء صيدليتك وبالتالى زيادة
              مبيعاتك ،فقط قم بتسجيل صيدليتك معنا واجعل طلب الأدوية والمنتجات غير الدوائية من صيدليتك اونلاين</p>
          </div>
        </div>

        <div class="col-lg-5 col-md-6 col-12 card card-blur p-5">
          <form action="{{ route('register.pharmacy.store') }}" method="post" class="row g-3 needs-validation"
            novalidate>
            <input hidden name="roles" value="{{ \App\Enum\RoleEnum::PHARMACY }}">

            <h1 class="text-primary-base fw-bold fs-3">إنشاء حساب</h1>

            <!-- User's Info  -->
            <fieldset class="form-group border p-3">
              {{-- <legend class="w-auto px-2">User Information</legend> --}}
              <div class="mt-3">
                <label class="text-primary-base">
                  اسم المستخدم
                </label>

                <div class="input-group position-relative">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                    <i class="bi bi-person text-black-50"></i>
                  </div>

                  <input name="name" value="{{ old('name') }}" type="text"
                    class="form-control @error('name') is-invalid @enderror rounded-2 pr" placeholder="اسم المستخدم"
                    aria-describedby="addon-wrapping" style="padding-right: 40px">
                </div>
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>


              <div class="mt-3">
                <label class="text-primary-base">
                  البريد الإلكتروني
                </label>

                <div class="input-group position-relative">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                    <i class="bi bi-envelope text-black-50"></i>
                  </div>
                  <input name="email" value="{{ old('email') }}" type="email"
                    class="form-control @error('email') is-invalid @enderror rounded-2 pr" placeholder="البريد الإلكتروني"
                    style="padding-right: 40px">
                </div>
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mt-3">
                <label class="text-primary-base">
                  كلمة السر
                </label>

                <div class="input-group position-relative">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                    <i class="bi bi-lock text-black-50"></i>
                  </div>
                  <input name="password" type="password"
                    class="form-control @error('password') is-invalid @enderror rounded-2 pr" placeholder="كلمة السر"
                    aria-describedby="addon-wrapping" style="padding-right: 40px">
                </div>
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mt-3">
                <label class="text-primary-base">
                  تأكيد كلمة السر
                </label>
                <div class="input-group position-relative">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                    <i class="bi bi-lock text-black-50"></i>
                  </div>
                  <input name="password_confirmation" type="password" class="form-control rounded-2 pr"
                    placeholder="تأكيد كلمة السر" style="padding-right: 40px">
                </div>
                @error('password_confirmation')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </fieldset>
            <!-- Pharmacy Info  -->
            <fieldset class="form-group border p-3">
              <div class="mt-3">
                <label class="text-primary-base">
                  اسم الصيدلية
                </label>
                <div class="input-group position-relative">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                    {{-- <i class="bi bi-plus-circle text-black-50"></i> --}}
                  </div>
                  <input name="namePharma" value="{{ old('namePharma') }}" type="text"
                    class="form-control @error('namePharma') is-invalid @enderror rounded-2 pr" placeholder="اسم الصيدلية"
                    aria-describedby="addon-wrapping" style="padding-right: 40px">
                </div>
                @error('namePharma')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mt-3">
                <label class="text-primary-base">
                  رقم الهاتف
                </label>
                <div class="input-group position-relative">
                  <div class="position-absolute top-50 end-0 translate-middle-y me-4" style="z-index: 999;">
                  </div>
                  <input name="phone" value="{{ old('phone') }}" type="text"
                    class="form-control @error('phone') is-invalid @enderror rounded-2 pr" placeholder="رقم الهاتف"
                    aria-describedby="addon-wrapping" style="padding-right: 40px">
                </div>
                @error('phone')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- <div class=" input-group  position-relative"> --}}
              {{-- <select class="ui search selection dropdown" id="search-select"> --}}

              {{-- </select> --}}
              {{-- </div> --}}
            </fieldset>
            <button class="btn btn-primary d-block w-100" type="submit">إنشاء حساب</button>
            <p class="fs-sm text-primary-darker mb-0 pt-3">هل لديك حساب ؟ <a href="{{ route('register') }}"
                class="fw-medium text-primary-base" data-view="#modal-signup-view">تسجيل الدخول</a></p>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Register Pharmacy -->
@stop
