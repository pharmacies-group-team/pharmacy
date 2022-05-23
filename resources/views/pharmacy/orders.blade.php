@extends('layouts.pharmacy.master')

@section('content')

  <x-alert type="status" />

  <main class="page-pharmacy-orders">
    <livewire:pharmacy.orders />
  </main>

@stop
