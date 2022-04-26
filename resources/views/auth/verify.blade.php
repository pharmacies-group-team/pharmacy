@extends('layouts.web.master')

@section('content')
  <div class="modal-body col-8 mx-auto p-5">
    <h1 class="fw-bold text-primary mb-0">ارسلنا لك ايميل </h1>

    <div class="row align-items-center">
      <h3 class="col-md-4">
        لطفا راجع بريدك الالكتروني لتاكيد حسابك
      </h3>

      <div class="col">
        <img class="img-fluid" src="{{ asset('images/verification_email.png') }}" alt="email verification">
      </div>
    </div>

    <div dir="auto" class="mt-4">
      <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf

        <button type="submit" class="btn btn-big btn-primary w-100 mt-5" data-bs-dismiss="modal">اعاده ارسال رسالة التاكيد
        </button>
      </form>
    </div>
  </div>
@endsection
