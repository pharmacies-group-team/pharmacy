@foreach($notifications as $notification)
  <form action="{{ route('notification.read') }}" method="post">
    @csrf
    <input hidden name="id" value="{{ $notification->id }}">
    @if($notification->read_at === null) unread @endif
    <button type="submit" class="read">{{ $notification->type }}</button> <hr>
  </form>
@endforeach
