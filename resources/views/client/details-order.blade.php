@extends('layouts/client/master')
@section('content')

  <div class="container px-5">
{{--    @include('includes.alerts')--}}
  </div>

  <main class="pharmacy-profile">

    <div class="pharmacy-info">

      <div class="profile-form">
        {{-- order --}}
        <div class="form-group">
          <h1 style="font-size: 18px; color: #588FF4; margin-bottom: 12px">تفاصيل طلبك </h1>
          <p>{{ $order->order }}</p>
        </div>
      </div>

      {{-- image order --}}
      @if(isset($order->image))
        <div class="upload-image">
          <img src="{{ asset(\App\Enum\OrderEnum::ORDER_IMAGE_PATH.$order->image) }}" alt="order image" class="avatar">
        </div>
      @endif
    </div>

    {{--  status  --}}
    @if($order->status === \App\Enum\OrderEnum::NEW_ORDER)
      <div style="background: #DDE9FF; width: 50%; padding: 10px 20px; border-radius: 6px; display: flex; gap: 20px; align-items: center; ">
        <span style="color: #588FF4; font-size: 20px; font-weight: bold">!</span>
        <h2 style="color: #456687">طلبك قيد الإنتظار لم يتم الرد عليه من قبل صيدلية <a href="{{ route('show.pharmacy.profile', $order->pharmacy->id) }}" style="color: #588FF4; margin: 4px"> {{ $order->pharmacy->name }} </a></h2>
      </div>

    @elseif($order->status === \App\Enum\OrderEnum::UNPAID_ORDER)
      <div style="background: #DDE9FF; width: 50%; padding: 10px 20px; border-radius: 6px; display: flex; gap: 20px; align-items: center; ">
        <span style="color: #588FF4; font-size: 20px; font-weight: bold">!</span>
        <h2 style="color: #456687">لقد تم الرد على طلبك يمكنك الإطلاع على عرض السعر <a style="color: #588FF4; margin: 4px"> {{ $order->pharmacy->name }} </a></h2>
      </div>

    @elseif($order->status === \App\Enum\OrderEnum::REFUSAL_ORDER)
      <div style="background: #b1323226; width: 50%; padding: 10px 20px; border-radius: 6px; display: flex; gap: 20px; align-items: center; ">
        <span style="color: #588FF4; font-size: 20px; font-weight: bold">!</span>
        <h2 style="color: #456687">يبدوا أن طلبك غير متواجد عند صيدلية <a href="{{ route('show.pharmacy.profile', $order->pharmacy->id) }}" style="color: #588FF4; margin: 4px"> {{ $order->pharmacy->name }} </a></h2>
      </div>

    @endif
  </main>

@stop
