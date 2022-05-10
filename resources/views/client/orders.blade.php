@extends('layouts/client/master')
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
                <td>
                  <div class="user-table">

                    <img
                      src="@if (isset($order->pharmacy->logo)) {{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $order->pharmacy->logo) }}
                    @else
                    {{ asset(PharmacyEnum::PHARMACY_LOGO_DEFAULT) }} @endif"
                      alt="profile avatar">

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
                      {{ OrderEnum::PAID_ORDER }}
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
                  @endif
                </td>

                {{-- action --}}
                <td>
                  <x-order-details :order="$order">
                    @slot('footer')
                      <x-client.order-details-footer :order="$order" />
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
