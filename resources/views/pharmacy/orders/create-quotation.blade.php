@extends('layouts.pharmacy.master')
@section('content')
  <x-alert type="status" />

  <main class="page-create-quotation">

    <div class="section-header">
      <h1 class="text-large">إنشاء عرض سعر</h1>
    </div>

    <div class="t-quotation-form">
      <livewire:pharmacy.create-quotation :order="$order" />
    </div>
  </main>

@stop
