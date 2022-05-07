@extends('layouts/client/master')
@section('content')

  <div class="container px-5">
    @include('includes.alerts')
  </div>

  <main class="pharmacy-profile">

    <div class="pharmacy-info">

      <div class="profile-form">
        {{-- order --}}
        <div class="form-group" style="align-items: flex-start">
          <div>
            <div style="display: flex; gap: 12px;align-items: center; width: 50%; margin-bottom: 20px">

              <img src="@if(isset($order->user->avatar))
              {{ asset(\App\Enum\UserEnum::USER_AVATAR_PATH.$order->user->avatar) }}
              @else
              {{ asset(\App\Enum\UserEnum::USER_AVATAR_DEFAULT) }}
              @endif"
                   alt="profile avatar" style="border-radius: 50%; width: 15%; border: 1px solid #588FF4">

              <a style="color: #3869BA; display: flex; flex-direction: column">
                <span>{{ $order->user->name }}</span>
                <span>{{ $order->created_at->format('Y-m-d  h:m A') }}</span>
              </a>
            </div>
          </div>
          <h1 style="font-size: 18px; color: #588FF4; margin-bottom: 12px">تفاصيل الطلب </h1>
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


    @if($order->status === \App\Enum\OrderEnum::NEW_ORDER)
      <div style="display: flex; align-items: center; gap: 12px">
        <a style="background: #B13232;color: #fff;padding: 5px 20px;border-radius: 8px;" href="{{ route('pharmacy.orders.refusal', $order->id) }}"> رفض</a>
        <a style="background: #4e7dcb;color: #fff;padding: 5px 20px;border-radius: 8px;" href="{{ route('pharmacy.quotation.create', $order->id) }}">إنشاء عرض سعر</a>
        <a style="background: #4e7dcb;color: #fff;padding: 5px 20px;border-radius: 8px;" href="">إرسال رسالة</a>
      </div>
    @elseif($order->status === \App\Enum\OrderEnum::REFUSAL_ORDER)
      <div style="display: flex; align-items: center; gap: 12px">
        <a style="background: #B13232;color: #fff;padding: 5px 20px;border-radius: 8px;"> تم رفض الطلب</a>
        <a style="background: #4e7dcb;color: #fff;padding: 5px 20px;border-radius: 8px;" href="">إرسال رسالة</a>
      </div>
    @endif

  </main>

@stop

