@foreach($orders as $order)
  <span>{{ $order->order }}</span> <span>{{ $order->status }}</span>
  <a href="{{ route('pharmacies.order.refusal', $order->id) }}"> رفض</a>
  <a href="{{ route('pharmacies.quotation.create', $order->id) }}">create</a>
  <hr>
@endforeach
