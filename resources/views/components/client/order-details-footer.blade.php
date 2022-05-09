{{-- status --}}


<div class="t-order-details-status">
  @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
    <div class="t-status">

      <span class="t-status-mark">!</span>

      <h2 class="t-status-heading">
        طلبك قيد الإنتظار لم يتم الرد عليه من قبل صيدلية

        <a class="t-status-pharmacy" href="{{ route('show.pharmacy.profile', $order->pharmacy->id) }}">
          {{ $order->pharmacy->name }}
        </a>
      </h2>
    </div>
  @elseif($order->status === \App\Enum\OrderEnum::UNPAID_ORDER)
    <div class="t-status">

      <span class="t-status-mark">!</span>

      <h2 class="t-status-heading">
        لقد تم الرد على طلبك يمكنك الإطلاع على عرض السعر

        <a class="t-status-pharmacy" href="{{ route('show.pharmacy.profile', $order->pharmacy->id) }}">
          {{ $order->pharmacy->name }}
        </a>
      </h2>
    </div>
  @elseif($order->status === \App\Enum\OrderEnum::REFUSAL_ORDER)
    <div class="t-status">

      <span class="t-status-mark">!</span>

      <h2 class="t-status-heading">
        يبدوا أن طلبك غير متواجد عند صيدلية

        <a class="t-status-pharmacy" href="{{ route('show.pharmacy.profile', $order->pharmacy->id) }}">
          {{ $order->pharmacy->name }}
        </a>
      </h2>
    </div>
  @endif
</div>
