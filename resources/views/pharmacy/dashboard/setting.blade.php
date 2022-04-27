@extends('layouts.web.user-dashboard.master')

@section('title') Setting @stop

@php use App\Enum\UserEnum @endphp

@section('content')

  <div class="row p-lg-4 bg-body vh-100">
    <div class="col-10 mb-3 mx-auto">
      <div class="card card-blur p-3">
        <div class="card-header bg-transparent">
          <h1 class="fs-4 fw-bold text-primary-darker">إعدادات الحساب</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-0">
              <div class="d-lg-flex d-none justify-content-center align-items-center position-relative">
                <img src="@if (Auth::user()->avatar) {{ asset(UserEnum::USER_AVATAR_PATH.Auth::user()->avatar) }} @else {{ asset(UserEnum::USER_AVATAR_DEFAULT) }} @endif" width="100%" class="img-fluid rounded-circle" alt="">
                <button data-bs-toggle="modal" data-bs-target="#editImg" class="position-absolute btn btn-primary" style="bottom:0;left:0;"><i class="fa fa-edit"></i></button>
              </div>
            </div>
            <div class="col-lg-8 col-12">
              <form action="{{ route('setting.update.account') }}" method="post" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                  <div class="input-group flex-nowrap">
                    <input name="name" value="{{ Auth::user()->name }}" type="text" class="form-control @error('name') is-invalid @enderror rounded-2" placeholder="اسم المستخدم" aria-describedby="addon-wrapping" required>
                  </div>
                  @error('name') <span id="exampleInputEmail1-error" class="error ">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <div class="input-group flex-nowrap">
                    <input  name="email" value="{{ Auth::user()->email }}" type="email" class="form-control @error('email') is-invalid @enderror rounded-2 text-start " placeholder="البريد الإلكتروني" aria-label="email" aria-describedby="addon-wrapping" required>
                  </div>
                  @error('email') <span id="exampleInputEmail1-error" class="error ">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 mt-5">
                  <button class="btn btn-primary d-block w-100 rounded-pill" type="submit">حفظ</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-blur p-3">
        <div class="card-header bg-transparent">
          <h1 class="fs-4 fw-bold text-primary-darker">تحديث كلمة السر</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 col-12">
              <form action="{{ route('setting.update.password') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                  <div class="input-group flex-nowrap">
                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror rounded-2" placeholder="كلمة السر القديمة" aria-describedby="addon-wrapping" required>
                  </div>
                  @error('old_password') <span id="exampleInputEmail1-error" class="error ">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <div class="input-group flex-nowrap">
                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror rounded-2" placeholder="كلمة السر الجديدة" aria-label="الاسم" aria-describedby="addon-wrapping" required>
                  </div>
                  @error('new_password') <span id="exampleInputEmail1-error" class="error ">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <div class="input-group flex-nowrap">
                    <input name="new_password_confirmation"  type="password" class="form-control rounded-2" placeholder="تأكيد كلمة السر" aria-label="الاسم" aria-describedby="addon-wrapping" required>
                  </div>
                </div>
                <a class="nav-link-style fs-ms" href="{{ route('password.request') }}">هل نسيت كلمة السر ؟</a>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Modal Edit Image Profile -->
  <div class="modal fade" id="editImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h4 class="modal-title fw-bold text-center" id="exampleModalLabel">تعديل صورة الحساب</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('setting.update.avatar') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12">
              <div class="input-group mb-3">
                <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02">
              </div>
              @error('avatar') <span id="exampleInputEmail1-error" class="error ">{{ $message }}</span> @enderror

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
