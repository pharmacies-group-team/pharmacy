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

              {{-- status --}}
              <th>حالة الطلب</th>

              {{-- client name --}}
              <th> اسم العميل</th>

              {{-- email --}}
              <th>التاريخ</th>

              {{-- email --}}
              <th>التوقيت</th>

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
                    <{{ $order->id }}< /td>

                      {{-- status --}}
                  <td>
                    @if ($order->status === OrderEnum::NEW_ORDER)
                      <div class="badge badge-info">
                        {{ OrderEnum::NEW_ORDER }}
                      </div>
                    @elseif($order->status === OrderEnum::UNPAID_ORDER)
                      <div class="badge bg-light text-dark">
                        {{ OrderEnum::UNPAID_ORDER }}
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
                        {{ OrderEnum::REFUSAL_ORDER }}
                      </div>
                    @endif
                  </td>

                  {{-- pharmacy name --}}
                  <td>
                    <div style="display: flex; justify-content: center;gap: 12px;align-items: center;">

                      <img class="t-profile"
                        src="{{ asset($order->user->avatar ? \App\Enum\UserEnum::USER_AVATAR_PATH . $order->user->avatar : \App\Enum\UserEnum::USER_AVATAR_DEFAULT) }}"
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

                  {{-- action --}}
                  <td>
                    <x-order-details :order="$order">
                      @slot('footer')
                        <a href="{{ route('pharmacy.quotation.create', $order->id) }}" class="btn">
                          <x-icon icon="order" />
                          @lang('action.create-quote')
                        </a>

                        <a href="#" class="btn">
                          <x-icon icon="message" />
                          @lang('action.send-message')
                        </a>

                        <a href="{{ route('pharmacy.orders.refusal', $order->id) }}" class="btn btn-danger">
                          @lang('action.not-found')
                        </a>
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
