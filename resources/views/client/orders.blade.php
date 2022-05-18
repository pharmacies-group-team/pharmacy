@extends('layouts.client.master')
@php
use App\Enum\OrderEnum;
use App\Enum\PharmacyEnum;
@endphp

@section('content')

  <x-alert type="status" />

  <main class="container">
    <section class="section-header">
      <h2 class="text-large">الطلبات</h2>
    </section>

    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            {{-- order id --}}
            <th> رقم الطلب</th>

            {{-- pharmacy name --}}
            <th>اسم الصيدلية</th>

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
                <td>{{ $order->id }} </td>

                {{-- pharmacy name --}}

                {{-- TODO Naif move to css --}}
                <td style="display: flex; justify-content: start">
                  <div class="user-table" d='{{ $order->image }}'>

                    {{-- TODO PharmacyEnum::PHARMACY_LOGO_PATH replace with pharmacy logo --}}
                    <img src="{{ asset('uploads/user/' . $order->pharmacy->avatar) }}" alt="profile avatar" width="30"
                      style="max-width: 30px; width: 100%" height="30">

                    <a href="{{ route('show.pharmacy.profile', $order->pharmacy->id) }}" style="color: #3869BA">
                      {{ $order->pharmacy->name }}
                    </a>
                  </div>
                </td>

                {{-- date --}}
                <td>{{ $order->created_at->format('Y-m-d') }} </td>

                {{-- date --}}
                <td>{{ $order->created_at->format('h:m A') }} </td>

                {{-- status --}}
                <td>
                  @if ($order->status === OrderEnum::NEW_ORDER)
                    <div class="badge badge-info">
                      في إنتظار الرد
                    </div>
                  @elseif($order->status === OrderEnum::UNPAID_ORDER)
                    <div class="badge bg-light text-dark">
                      <a href="{{ route('client.quotation.details', $order->quotation->id) }}">عرض سعر</a>
                    </div>
                  @elseif($order->status === OrderEnum::PAID_ORDER)
                    <div class="badge bg-success">
                      <a href="{{ route('client.invoice', $order->invoice->id) }}">تم الدفع</a>
                    </div>
                  @elseif($order->status === OrderEnum::DELIVERY_ORDER)
                    <div class="badge badge-danger">
                      {{ OrderEnum::DELIVERY_ORDER }}
                    </div>
                  @elseif($order->status === OrderEnum::DELIVERED_ORDER)
                    <div class="badge badge-danger">
                      {{ OrderEnum::DELIVERED_ORDER }}
                    </div>
                  @elseif($order->status === OrderEnum::REFUSAL_ORDER)
                    <div class="badge badge-danger">
                      تم رفض الطلب
                    </div>
                  @elseif($order->status === OrderEnum::CANCELED_ORDER)
                    <div class="badge badge-danger">
                      {{ OrderEnum::CANCELED_ORDER }}
                    </div>
                  @endif
                </td>

                {{-- action --}}
                <td>
                  <x-order-details :order="$order">
                    @slot('footer')
                      <x-client.order-details-footer :order="$order" />
                      @if ($order->status === OrderEnum::PAID_ORDER)
                        <a href="{{ route('client.invoice', $order->invoice->id) }}" class="btn">
                          <x-icon icon="order" />
                          @lang('action.show-invoice')
                        </a>
                      @elseif($order->status === OrderEnum::NEW_ORDER || $order->status === OrderEnum::UNPAID_ORDER)
                        <a href="{{ route('client.orders.cancel', $order->id) }}" class="btn">
                          <x-icon icon="order" />
                          @lang('action.cancel-order')
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
  </main>
@stop
