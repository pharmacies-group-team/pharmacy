@extends('layouts.pharmacy.master')
@section('content')

  <div class="container px-5">
{{--    @include('includes.alerts')--}}
  </div>

  <main class="pharmacy-profile">

    <div class="section-header">
      <h1 class="text-large">إنشاء عرض سعر</h1>
    </div>

    <div class="pharmacy-info">

      <livewire:pharmacy.create-quotation :order="$order"  />

    </div>
  </main>

@stop

