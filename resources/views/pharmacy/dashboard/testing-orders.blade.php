@extends('layouts/pharmacy/master')

@php use App\Enum\OrderEnum; @endphp

@section('content')


  @include('includes.alerts')

  <main class="dashboard-pharmacies-orders" x-data="{ id: null, ad: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
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
                  <td><a href="{{ route('pharmacy.orders.single', $order->id) }}">{{ $order->id }} </a></td>

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

                      <img src="@if(isset($order->user->avatar))
                      {{ asset(\App\Enum\UserEnum::USER_AVATAR_PATH.$order->user->avatar) }}
                      @else
                      {{ asset(\App\Enum\UserEnum::USER_AVATAR_DEFAULT) }}
                      @endif"
                           alt="profile avatar" style="border-radius: 50%; width: 15%; border: 1px solid #588FF4">

                      <a style="color: #3869BA">
                        {{ $order->user->name }}
                      </a>
                    </div>
                  </td>

                  {{-- Date --}}
                  <td>{{ $order->created_at->format('Y-m-d') }} </td>

                  {{-- Date --}}
                  <td>{{ $order->created_at->format('h:m A') }} </td>

                  {{-- action --}}
                  <td>
                    <div class="badge badge-info">
                      <a href="{{ route('pharmacy.orders.single', $order->id) }}">تفاصيل الطلب</a>
                    </div>
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
