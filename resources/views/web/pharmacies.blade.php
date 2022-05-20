@extends('layouts.web.master')

@section('title') Pharmacies @stop

@section('content')
  <x-alert type="success" />
  <main class="pharmacies">
    <div class="pharmacies-bg"></div>

    <livewire:search />
  </main>

@stop
