@php
use Illuminate\Support\Facades\Auth;

use App\Enum\RoleEnum;

@endphp

{{-- render layout based on User role --}}
@extends((Auth::user()->hasRole(RoleEnum::PHARMACY) ? 'layouts.pharmacy.master' : Auth::user()->hasRole(RoleEnum::CLIENT)) ? 'layouts.client.master' : 'layouts.admin.master')


@section('content')
  <main>
    <ul class="t-notification-content" style="max-height: 30rem">
      @foreach ($notifications as $notification)
        <div class="t-card">
          <x-notification :notification="$notification" />
        </div>
        <div class="t-card">
          <x-notification :notification="$notification" />
        </div>
        <div class="t-card">
          <x-notification :notification="$notification" />
        </div>
      @endforeach
    </ul>
  </main>
@endsection
