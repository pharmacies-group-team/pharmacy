@extends('layouts.client.master')

@php use \App\Enum\UserEnum;  @endphp

@section('content')


  {{-- @include('includes.alerts') --}}

  <main class="pharmacy-profile">
    <div class="pharmacy-info">

      {{-- form --}}
      <livewire:account />

      {{-- avatar --}}
      <x-image :image="asset(UserEnum::USER_AVATAR_PATH . $user->avatar)" :uploadTo="route('setting.update.avatar')" name="avatar" />
    </div>

    <hr class="divided">

    {{-- security --}}
    <livewire:security />

  </main>

@stop
