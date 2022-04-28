@extends('layouts/dashboard/dashboard-master')
@section('content')

  @include('includes.alerts')

  <main class="content">
    <div class="card">
      <div class="card-header">

        <h2 class="text-primary mb-0">المعلومات الشخصية</h5>
      </div>
      <form class="card-body needs-validation" method="post" action="{{ route('admin.update-profile') }}" novalidate>

        @csrf
        @method('put')
        <div class="row">
          <div class="col-md-8">

            {{-- name --}}
            <div class="mb-3">
              <label class="form-label" for="inputUsername">الاسم</label>
              <input type="text" name="name" class="form-control" id="inputUsername" placeholder="الاسم"
                value="{{ $user->name }}">
            </div>

            {{-- email --}}
            <div class="mb-3">
              <label class="form-label" for="inputEmail4">الايميل</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="الايميل"
                value="{{ $user->email }}">
            </div>

            <button type="submit" class="btn btn-primary px-4">تعديل</button>
          </div>
      </form>
    </div>
  </main>

  <main class="content">
    <div class="card card-blur p-3">
      <div class="card-header bg-transparent">
        <h1 class="text-primary mb-0">تحديث كلمة السر</h1>
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
  </main>

@stop
