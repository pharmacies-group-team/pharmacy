@extends('layouts.pharmacy.master')
@section('content')
  <x-alert type="status" />

  <main class="page-create-quotation">

    <div class="section-header t-card">
      <h1 class="text-large">@lang('action.create-quote')</h1>
    </div>

    <div class="t-card">
      <header>
        <h2 class="t-header">
          @lang('heading.order-details')
        </h2>
      </header>

      <x-pharmacy.quotation-order-details :order="$order" />
    </div>


    @if ($order->status === \App\Enum\OrderEnum::NEW_ORDER)
      <div class="t-quotation-form t-mt-8">
        <livewire:pharmacy.create-quotation :order="$order" />
      </div>
    @endif
  </main>

@stop
