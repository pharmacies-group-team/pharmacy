
@extends('layouts/pharmacy/master')

@php use App\Enum\OrderEnum; @endphp

@section('content')

  <x-alert type="status" />


  <main class="page-pharmacy-orders">
    <div class="container">
      <section class="section-header">
        <h2 class="text-large">أدارة الطلبات</h2>
      </section>

      <div class="table-wrapper">
        <table class="table">
          <thead>
            <tr>
              {{-- order id --}}
              <th> رقم الطلب</th>

              {{-- pharmacy name --}}
              <th>اسم العميل</th>

              {{-- date --}}
              <th>التاريخ</th>

              {{-- hour --}}
              <th>التوقيت</th>

              {{-- status --}}
              <th>حالة الطلب</th>

              {{-- actions --}}
              <th></th>
            </tr>
          </thead>

          <tbody>
            @if (isset($orders))
              @foreach ($orders as $order)
                <tr>
                  {{-- id --}}
                  <td>
                    {{ $order->id }}
                  </td>

                  {{-- client name --}}
                  <td>
                    <div style="display: flex; justify-content: center;gap: 12px;align-items: center;">

                      <img class="t-profile"
                        src="{{ asset(\App\Enum\UserEnum::USER_AVATAR_PATH . $order->user->avatar) }}"
                        alt="profile avatar">

                      <span class="text-base">
                        {{ $order->user->name }}
                      </span>
                    </div>
                  </td>

                  {{-- Date --}}
                  <td>{{ $order->created_at->format('Y-m-d') }} </td>

                  {{-- Date --}}
                  <td>{{ $order->created_at->format('h:m A') }} </td>

                  {{-- status --}}
                  <td>
                    @if ($order->status === OrderEnum::NEW_ORDER)
                      <div class="badge badge-info">
                        طلب جديد
                      </div>
                    @elseif($order->status === OrderEnum::UNPAID_ORDER)
                      <div class="badge bg-light text-dark">
                        <a href="{{ route('pharmacy.quotation.details', $order->quotation->id) }}">قيد الدفع</a>
                      </div>
                    @elseif($order->status === OrderEnum::PAID_ORDER)
                      <div class="badge bg-success">
                        تم الدفع
                      </div>
                    @elseif($order->status === OrderEnum::DELIVERY_ORDER)
                      <div class="badge badge-danger">
                        قيد التسليم
                      </div>
                    @elseif($order->status === OrderEnum::DELIVERED_ORDER)
                      <div class="badge badge-danger">
                        تم التسليم
                      </div>
                    @elseif($order->status === OrderEnum::REFUSAL_ORDER)
                      <div class="badge badge-danger">
                        تم رفض الطلب
                      </div>
                    @endif
                  </td>

                  {{-- action --}}
                  <td>
                    <x-order-details :order="$order">
                      @slot('footer')
                        @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
                          <a href="{{ route('pharmacy.quotation.create', $order->id) }}" class="btn">
                            <x-icon icon="order" />
                            @lang('action.create-quote')
                          </a>
                        @endif

                        <a href="#" class="btn">
                          <x-icon icon="message" />
                          @lang('action.send-message')
                        </a>

                        @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
                          <a href="{{ route('pharmacy.orders.refusal', $order->id) }}" class="btn btn-danger">
                            @lang('action.not-found')
                          </a>
                        @endif
                      @endslot
                    </x-order-details>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>

    </div>
  </main>

@stop

