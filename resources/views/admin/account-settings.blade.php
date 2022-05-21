@extends('layouts.admin.master')

@php use \App\Enum\UserEnum;  @endphp

@section('content')

  <x-alert type="status" />

  <main class="page-pharmacy-profile">
    <header class="t-header t-card">
      <h2 class="text-base">
        @lang('heading.profile')
      </h2>
    </header>

    <div class="t-card t-mt-8">
      <div class="pharmacy-info">

        {{-- form --}}
        <livewire:account />

        {{-- avatar --}}
        <x-image :image="asset(UserEnum::USER_AVATAR_PATH . $user->avatar)" :uploadTo="route('setting.update.avatar')" name="avatar" />

      </div>

      <hr class="divided">

      {{-- security --}}
      <livewire:security />

    </div>
  </main>

@stop
