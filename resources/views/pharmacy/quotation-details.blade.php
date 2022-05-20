@extends('layouts.pharmacy.master')
@section('content')
  {{-- TODO --}}
  <div class="container px-5">
    {{-- @include('includes.alerts') --}}
  </div>

  <main class="pharmacy-profile">

    <x-alert type="message" />

    <div class="section-header">
      <h2 class="text-large">عرض السعر</h2>

      <p>
        تاريخ الإنشاء
        {{ $quotation->created_at->format('Y-m-d') }}
      </p>
    </div>



    {{-- table --}}
    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            {{-- name --}}
            <th> اسم المنتج</th>

            {{-- type --}}
            <th>الوحده</th>

            {{-- quantity --}}
            <th>الكمية</th>

            {{-- price --}}
            <th>سعر المنتج</th>

            {{-- total --}}
            <th>المجموع</th>
          </tr>
        </thead>

        <tbody>
          @if (isset($quotationDetails))
            @foreach ($quotationDetails as $details)
              <tr>

                <td> {{ $details->product_name }} </td>

                <td>
                  <div>
                    @if ($details->product_unit === \App\Enum\QuotationEnum::TYPE_BOTTLE)
                      عبوه
                    @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_CARTONS)
                      كرتون
                    @elseif($details->product_unit === \App\Enum\QuotationEnum::TYPE_RIBBON)
                      شريط
                    @endif
                  </div>
                </td>

                <td> {{ $details->quantity }} </td>

                {{-- price --}}
                <td> {{ $details->price }} {{ $details->currency }} </td>

                {{-- total --}}
                <td> {{$details->price * $details->quantity }} {{ $details->currency }}</td>

              </tr>
            @endforeach
          @endif

          <tr>
            <td>
              الأجمالي
            </td>
            <td colspan="5"> {{ $quotation->total }} {{ $details->currency }}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </main>

@stop
