@foreach($notifications as $notification)
  <form action="{{ route('notification.read') }}" method="post">
    <span>{{ $notification->data['sender']['name'] }}</span>///
    <span>{{ $notification->data['receiver'] }}</span>///
    <span>{{ $notification->data['message'] }}</span>///
    <span>{{ $notification->data['link'] }}</span>///
    @csrf
    <input hidden name="id" value="{{ $notification->id }}">
    @if($notification->read_at === null) <span style="color: white; background: #9f3a38; padding: 5px">unread</span> @endif
    <button type="submit" class="read">{{ $notification->type }}</button> <hr>
  </form>
@endforeach
