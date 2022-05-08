@extends('layouts/client/master')
@section('content')

  @php use App\Enum\OrderEnum; @endphp

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

            {{-- status --}}
            <th>حالة الطلب</th>

            {{-- date --}}
            <th>التاريخ</th>

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

                {{-- client --}}
                <td>{{ $order->created_at->format('Y-m-d') }} </td>

                {{-- action --}}
                <td>
                  <livewire:orders.order-details :order="$order" />
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </main>
@stop
