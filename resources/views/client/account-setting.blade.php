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

        <hr class="divided">


        <form method="post" action='{{ route('client.deactivate', ['id' => $user->id]) }}'>
            @csrf
            <button type="submit" class="btn {{ $user->is_active ? 'btn-danger' : 'btn-primary' }} m-1">

                @if ($user->is_active)
                    تعطيل الحساب
                @endif
            </button>
        </form>



    </main>

@stop
