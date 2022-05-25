@extends('layouts.admin.master')

@section('content')
    <x-alert type="status" />

    <main class="page-pharmacy-orders">
        <livewire:admin.orders />

    </main>

@stop
