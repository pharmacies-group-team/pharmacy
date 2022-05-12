@extends('layouts.client.master')
@section('content')
  <x-alert type="message" />

  <main class="pharmacy-profile page-quotation-details">

    <livewire:client.details-quotation :quotationID="$quotationID" />

{{-- TODO IT MIGHT BE DELETED--}}
{{--    <form class="t-form" action="{{ route('client.payment') }}" method="post">--}}
{{--      @csrf--}}
{{--      <input hidden value="{{ $quotationID }}" name="quotation_id">--}}
{{--      <button type="submit" class="btn btn-full">دفع الفاتورة</button>--}}
{{--    </form>--}}

  </main>
@stop
