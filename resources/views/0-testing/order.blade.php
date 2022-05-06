<span><b>Client name</b></span> | <span>{{ $order->user->name }}</span> <hr>

<span><b>Order Date</b></span> | <span>{{ $order->created_at->format('Y.m.d') }} </span> <hr>


<a>{{ $order->order }}</a> <span>{{ $order->status }}</span>
  @if($order->status === \App\Enum\OrderEnum::NEW_ORDER)
    <a href="{{ route('pharmacy.orders.refusal', $order->id) }}"> رفض</a>
    <a href="{{ route('pharmacy.quotation.create', $order->id) }}">create</a>
  @endif
  <hr>
