@extends('layouts.client.master')

@php use \App\Enum\UserEnum;  @endphp

@section('content')

{{--  @include('includes.alerts')--}}

  <main>
    <livewire:client.address  />
  </main>

@stop
