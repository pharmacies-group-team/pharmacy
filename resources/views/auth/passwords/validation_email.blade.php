@extends('layouts.web.master')

@section('content')
<div class="modal-body p-5">
        <h2 class="fw-bold mb-0">ارسلنا لك ايميل </h2>

        <ul class="d-grid gap-4 my-5 list-unstyled">
          <li class="d-flex gap-4">
            <svg class="bi text-muted flex-shrink-0" width="48" height="48"><use xlink:href="#grid-fill"></use></svg>
            <div>
         
             لطفا راجع بريدك الالكتروني لتاكيد حسابك
            </div>
          </li>
         
        </ul>
        <button type="button" class="btn btn-lg btn-primary mt-5 w-100" data-bs-dismiss="modal">الرجاء تأكيد حسابك </button>
      </div>
      @endsection