@extends('layouts.client.master')

@php use \App\Enum\UserEnum;  @endphp

@section('content')


  {{-- @include('includes.alerts') --}}

  <main class="page-pharmacy-profile">
    <header class="t-header t-card">
      <h2 class="text-base">
        @lang('heading.profile')
      </h2>
    </header>

    <div class="t-card t-pharmacy-content">
      <div class="pharmacy-info">
        {{-- form --}}
        <livewire:account />

        {{-- avatar --}}
        <x-image :image="asset(UserEnum::USER_AVATAR_PATH . $user->avatar)" :uploadTo="route('setting.update.avatar')" name="avatar" />
      </div>

      <hr class="divided">

      {{-- security --}}
      <livewire:security />


      <form class="t-disable-account" method="post" action='{{ route('client.deactivate', ['id' => $user->id]) }}'>
        @csrf
        <button type="submit" class="btn {{ $user->is_active ? 'btn-danger' : 'btn-primary' }} m-1">

          @if ($user->is_active)
            تعطيل الحساب
          @endif
        </button>
      </form>
    </div>

  </main>

@stop
