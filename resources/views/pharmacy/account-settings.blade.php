@extends('layouts.pharmacy/master')

@php use \App\Enum\UserEnum;  @endphp

@section('content')


  <x-alert type="status" />

  <main class="pharmacy-profile">
    <div class="pharmacy-info">

      {{-- form --}}
      <livewire:account />

      {{-- avatar --}}
      @if (isset($user))
        <x-image :image="asset(UserEnum::USER_AVATAR_PATH . $user->avatar)" :uploadTo="route('setting.update.avatar')" name="avatar" />
      @endif
    </div>

    <hr class="divided">

    {{-- security --}}
    <livewire:security />

    <hr class="divided">


    <form method="post" action='{{ route('pharmacy.deactivate', ['id' => $user->id]) }}'>
      @csrf
      <button type="submit" class="btn {{ $user->is_active ? 'btn-danger' : 'btn-primary' }} m-1">

        @if ($user->is_active)
          تعطيل الحساب
        @endif
      </button>
    </form>

  </main>

@stop
