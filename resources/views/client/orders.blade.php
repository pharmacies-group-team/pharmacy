@extends('layouts.client.master')
@php
use App\Enum\OrderEnum;
use App\Enum\PharmacyEnum;
@endphp

@section('content')

  <x-alert type="status" />

  <main>
    <livewire:client.orders />
  </main>
@stop
