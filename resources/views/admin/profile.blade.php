@extends('layouts/dashboard/dashboard-mastre')
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

@stop
