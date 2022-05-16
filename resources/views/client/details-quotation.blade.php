@extends('layouts.client.master')
@section('content')
  <x-alert type="message" />

  <main class="pharmacy-profile page-quotation-details">

    <livewire:client.details-quotation :quotationID="$quotationID" />

  </main>
@stop
