@extends('layouts.client.master')
@section('content')
  {{-- TODO --}}
  <div class="container px-5">
{{--    @include('includes.alerts')--}}
  </div>

  <main class="pharmacy-profile">

    <livewire:client.details-quotation :quotationID="$quotationID" />
    <form action="{{ route('client.payment') }}" method="post">
      @csrf
      <input hidden value="{{ $quotationID }}" name="quotation_id">
      <button type="submit" class="btn btn-full">دفع الفاتورة</button>
    </form>
  </main>

@stop

