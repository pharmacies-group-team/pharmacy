@php
use Illuminate\Support\Facades\Auth;

use App\Enum\RoleEnum;

if (Auth::user()->hasRole(RoleEnum::SUPER_ADMIN)) {
    $view = 'layouts.admin.master';

    // pharmacy
} elseif (Auth::user()->hasRole(RoleEnum::PHARMACY)) {
    $view = 'layouts.pharmacy.master';

    // client
} elseif (Auth::user()->hasRole(RoleEnum::CLIENT)) {
    $view = 'layouts.client.master';
}

@endphp

@extends($view)


@section('content')
  @if (isset($notifications))
    <main>
      <ul class="t-notification-content" style="max-height: 30rem">
        @foreach ($notifications as $notification)
          <div class="t-card">
            <x-notification :notification="$notification" />
          </div>
        @endforeach
      </ul>
    </main>
  @endif
@endsection
