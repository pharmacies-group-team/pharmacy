@php use App\Enum\OrderEnum; @endphp

<div>
  <section class="section-header t-card">
    <h2 class="text-large">إدارة الطلبات</h2>
    <select wire:model="status" class="form-control">
      <option value=""> عرض الكل</option>
      <option value="{{ \App\Enum\OrderEnum::NEW_ORDER }}">طلبات جديده</option>
      <hr>
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

              {{-- action --}}
              <td>
                <x-table-dropdown>

                  @if ($order->status === OrderEnum::NEW_ORDER)
                    <x-order-details :order="$order">
                      @slot('footer')
                        @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
                          <a href="{{ route('pharmacy.quotation.create', $order->id) }}" class="btn">
                            <x-icon icon="order" />
                            @lang('action.create-quote')
                          </a>
                        @endif
                        <a href="/pharmacy/chat?userToID={{ $order->user->id }}" class="btn">
                          <x-icon icon="message" /> message
                          @lang('action.send-message')
                        </a>

                        @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
                          <a href="{{ route('pharmacy.orders.refusal', $order->id) }}" class="btn btn-danger">
                            @lang('action.not-found')
                          </a>
                        @endif
                      @endslot
                    </x-order-details>
                    <div>
                      <a href="{{ route('pharmacy.quotation.create', $order->id) }}"
                        class="badge">@lang('action.create-quote')</a>
                    </div>
                    <div>
                      <a href="/pharmacy/chat?userToID={{ $order->user->id }}"
                        class="badge">@lang('action.send-message')</a>
                    </div>
                    <div>
                      <a href="{{ route('pharmacy.orders.refusal', $order->id) }}"
                        class="badge">@lang('action.not-found')</a>
                    </div>
                  @elseif($order->status === OrderEnum::UNPAID_ORDER)
                    <x-order-details :order="$order">
                      @slot('footer')
                        @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
                          <a href="{{ route('pharmacy.quotation.create', $order->id) }}" class="btn">
                            <x-icon icon="order" />
                            @lang('action.create-quote')
                          </a>
                        @endif

                        <a href="/pharmacy/chat?userToID={{ $order->user->id }}" class="btn">
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
                    <div>
                      <a href="{{ route('pharmacy.quotation.details', $order->quotation->id) }}"
                        class="badge">عرض السعر</a>
                    </div>
                  @elseif($order->status === OrderEnum::CANCELED_ORDER || $order->status === OrderEnum::REFUSAL_ORDER)
                    <x-order-details :order="$order">
                      @slot('footer')
                        @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
                          <a href="{{ route('pharmacy.quotation.create', $order->id) }}" class="btn">
                            <x-icon icon="order" />
                            @lang('action.create-quote')
                          </a>
                        @endif

                        <a href="/pharmacy/chat?userToID={{ $order->user->id }}" class="btn">
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
                  @else
                    <div>
                      <a href="{{ route('pharmacy.invoice', $order->id) }}" class="badge">عرض
                        الفاتورة</a>
                    </div>
                    <div>
                      <a href="{{ route('pharmacy.quotation.create', $order->id) }}" class="badge">عرض
                        تفاصيل الطلب</a>
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
  <div class="t-card" style="display: flex; justify-content: center">
    {{ $orders->links('livewire.livewire-pagination') }}
  </div>
</div>
