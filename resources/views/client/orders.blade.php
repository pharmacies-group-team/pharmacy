@extends('layouts.client.master')
@php
use App\Enum\OrderEnum;
use App\Enum\PharmacyEnum;
@endphp

@section('content')

  <x-alert type="status" />

  <main class="container">
    <livewire:client.orders />
  </main>
@stop
