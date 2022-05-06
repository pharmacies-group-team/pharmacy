{{-- alerts --}}
{{-- success --}}
@if (session('status'))
  <div class="alert-box">
    {{ session('status') }}
  </div>
@elseif($errors->any())
  <div class="alert-box">
    يُرجى التأكد من إدخال البيانات الصحيحة
  </div>
@endif
<div>


  {{-- errors --}}
{{--  @if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--      <div class="container">--}}
{{--        <ul>--}}
{{--          @foreach ($errors->all() as $error)--}}
{{--            <li>{{ $error }}</li>--}}
{{--          @endforeach--}}
{{--        </ul>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  @endif--}}
</div>
