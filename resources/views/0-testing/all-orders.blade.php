@foreach($orders as $order)
{{--  <a href="{{ route('pharmacies.') }}">{{ $order->order }}</a> <span>{{ $order->status }}</span>--}}
  @if($order->status === \App\Enum\OrderEnum::NEW_ORDER)
    <a href="{{ route('pharmacies.order.refusal', $order->id) }}"> رفض</a>
    <a href="{{ route('pharmacies.quotation.create', $order->id) }}">create</a>

  @endif
  <hr>
@endforeach
