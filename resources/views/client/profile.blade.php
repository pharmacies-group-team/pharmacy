@extends('layouts.client.master')
@section('content')

  <div class="container px-5">
    <x-alert type="status" />
  </div>

  @if (isset($client))
    <main>
      <livewire:user.profile avatar="{{ $client->avatar }}" name="{{ $client->name }}"
        email="{{ $client->email }}" />

      <div class="container">
        <hr class="divided">

        <livewire:security />
      </div>
    </main>
  @endif

@stop
