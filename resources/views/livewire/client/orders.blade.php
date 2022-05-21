@php
  use App\Enum\OrderEnum;
  use App\Enum\PharmacyEnum;
@endphp

<div>
  <section class="section-header">
    <h2 class="text-large">الطلبات</h2>
    <select wire:model="status" class="form-control">
      <option value=""> عرض الكل</option>
      <option value="{{ \App\Enum\OrderEnum::NEW_ORDER }}">في إنتظار الرد</option>
      <option value="{{ \App\Enum\OrderEnum::UNPAID_ORDER }}">طلبات قيد الدفع</option>
      <option value="{{ \App\Enum\OrderEnum::PAID_ORDER }}">طلبات تم الدفع</option>
      <option value="{{ \App\Enum\OrderEnum::DELIVERED_ORDER }}">طلبات تم توصيلها</option>
      <option value="{{ \App\Enum\OrderEnum::REFUSAL_ORDER }}">طلبات غير متواجده</option>
      <option value="{{ \App\Enum\OrderEnum::CANCELED_ORDER }}">طلبات تم إلغاءها</option>
    </select>
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

        {{-- perodic order --}}
        <th>أضافة طلب دوري</th>

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

                <img src="{{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $order->pharmacy->pharmacy->logo) }}" alt="profile avatar" width="30"
                     style="max-width: 30px; width: 100%" height="30">

                <a href="{{ route('show.pharmacy.profile', $order->pharmacy->pharmacy->id) }}" style="color: #3869BA">
                  {{ $order->pharmacy->pharmacy->name }}
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
                <div class="badge badge-primary">
                  قيد الدفع
                </div>
              @elseif($order->status === OrderEnum::PAID_ORDER)
                <div class="badge badge-success">
                  تم الدفع
                </div>
              @elseif($order->status === OrderEnum::DELIVERY_ORDER)
                <div class="badge badge-warning">
                  قيد التسليم
                </div>
              @elseif($order->status === OrderEnum::DELIVERED_ORDER)
                <div class="badge badge-success">
                  تم التسليم
                </div>
              @elseif($order->status === OrderEnum::REFUSAL_ORDER)
                <div class="badge badge-danger">
                  غير متواجد
                </div>
              @elseif($order->status === OrderEnum::CANCELED_ORDER)
                <div class="badge badge-danger">
                  أُلغي الطلب
                </div>
              @endif
            </td>

            {{-- create perodic order --}}
            <td>
              @if ($order['PerodicOrders'] && $order->id == $order['PerodicOrders']['order_id'])
                  <div class="badge bg-light text-dark">
                      <div>
                          @lang('action.has-perodic-order')
                      </div>

                  </div>
              @else
                  <x-perodic-orders :order="$order">
                  </x-perodic-orders>
              @endif
            </td>

            {{-- action --}}
            <td>

              <x-table-dropdown>

                <x-order-details :order="$order">
                  @slot('footer')
                    <x-client.order-details-footer :order="$order" />
                  @endslot
                </x-order-details>

                @if ($order->status === OrderEnum::NEW_ORDER)
                  <div>
                    <a href="{{ route('client.orders.cancel', $order->id) }}" class="badge">@lang('action.cancel-order')</a>
                  </div>
                @elseif($order->status === OrderEnum::UNPAID_ORDER)
                  <div>
                    <a href="{{ route('client.quotation.details', $order->quotation->id) }}" class="badge">عرض السعر</a>
                  </div>
                  <div>
                    <a href="{{ route('client.orders.cancel', $order->id) }}" class="badge">@lang('action.cancel-order')</a>
                  </div>
                @elseif($order->status === OrderEnum::PAID_ORDER || $order->status === OrderEnum::DELIVERY_ORDER || $order->status === OrderEnum::DELIVERED_ORDER)
                  <div>
                    <a href="{{ route('client.invoice', $order->invoice->id) }}" class="badge">عرض الفاتورة</a>
                  </div>
                @endif

              </x-table-dropdown>

            </td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
  <div style="display: flex; justify-content: center; margin-top: 50px ">
    {{ $orders->links('livewire.livewire-pagination') }}
  </div>
</div>
