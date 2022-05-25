@extends('layouts.web.master')

@section('title') Pharmacies @stop

@section('content')
  <x-alert type="success" />
  <main class="pharmacies">
    <div class="pharmacies-bg" style="background-image: url({{ asset('vector/bg.svg') }}); height: 280px;background-size: contain;"></div>

    <livewire:search />
  </main>

@stop
