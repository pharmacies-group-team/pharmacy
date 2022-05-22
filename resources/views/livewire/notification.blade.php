<div>
  @if (isset($notifications))
    @foreach ($notifications->take(10) as $notification)
      <x-notification :notification="$notification" />
    @endforeach
  @endif
</div>
