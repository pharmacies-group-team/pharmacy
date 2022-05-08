@extends('layouts.pharmacy.master')
@section('content')
  {{-- TODO --}}
  <div class="container px-5">
{{--    @include('includes.alerts')--}}
  </div>

  <main class="pharmacy-profile">

    <div class="section-header">
      <h1 class="text-large">عرض السعر</h1>
    </div>
    <p style="text-align: left">  تاريخ الإنشاء {{ $quotation->created_at->format('Y-m-d') }}  </p>
    @foreach($quotationDetails as $details)
      <div style="display: flex; gap: 12px; align-items: center">
        <div style="display: flex; gap: 12px; align-items: center; margin: 20px 0 ">
          <label class="text-base">اسم المنتج </label>
          <p>{{ $details->product_name }}</p>
        </div>

        <div style="display: flex; gap: 12px; align-items: center; margin: 20px 0 ">
          <label class="text-base">نوع المنتج </label>
          <p>
            @if($details->product_unit === \App\Enum\QuotationEnum::TYPE_BOTTLE)
              عبوه
            @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_CARTONS)
              كرتون
            @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_RIBBON)
              شريط
            @endif
          </p>
        </div>

        <div style="display: flex; gap: 12px; align-items: center; margin: 20px 0 ">
          <label class="text-base">الكمية </label>
          <p>{{ $details->quantity }}</p>
        </div>

        <div style="display: flex; gap: 12px; align-items: center; margin: 20px 0 ">
          <label class="text-base">السعر</label>
          <p>{{ $details->price }} {{ $details->currency }}</p>
        </div>
      </div> <hr>
    @endforeach
    <h1 style="text-align: left">الأجمالي<span style="margin: 10px ">{{ $quotation->total }}</span></h1>

{{--    <button class="btn btn-full">تعديل</button>--}}

  </main>

@stop

