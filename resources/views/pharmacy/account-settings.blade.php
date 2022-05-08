@extends('layouts/pharmacy/master')

@php use \App\Enum\UserEnum;  @endphp

@section('content')


  <x-alert type="status" />

  <main class="pharmacy-profile">
    <div class="pharmacy-info">

      {{-- form --}}
      <livewire:account />

      {{-- avatar --}}
      @if (isset($user))
        <x-image :image="asset(
            isset($user->avatar) ? UserEnum::USER_AVATAR_PATH . $user->avatar : UserEnum::USER_AVATAR_DEFAULT,
        )" :uploadTo="route('setting.update.avatar')" name="avatar" />
      @endif
    </div>

    <hr class="divided">

    {{-- security --}}
    <livewire:security />

  </main>

@stop
