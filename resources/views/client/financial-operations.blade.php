@extends('layouts.client.master')
@section('content')
  <x-alert type="status" />

  <main class="page-invoice-profile container">

    <div class="t-content">
      <div class="t-log-data">
          <div style="display: flex; align-items: center; justify-content: space-evenly">
            <div style="display:flex; justify-content: center; align-items: center; gap: 6px">
              <span>رصيدك الحالي:</span>
              <span>{{ $amount_not_confirmed }}</span>
            </div>
          </div>
      </div>
    </div>

    {{-- content --}}
    <div class="t-content">
      {{-- log data --}}
      <div class="t-log-data">
        <header>
          <x-icon icon="home" />
          <h3 class="t-heading">@lang('heading.invoice-profile')</h3>
        </header>

        <div class="t-list">
          @if(isset($transactions))
            @foreach($transactions as $transaction)
              {{-- item --}}
              <div class="t-item">
                {{-- header --}}
                <div class="t-item-header">
                  {{-- title --}}
                  <h4 style="display:flex; align-items: center;">
                    <a href="{{ $transaction->meta['invoice_id'] }}">رقم العملية: {{ $transaction->uuid }}</a>
                  </h4>
                  {{-- date --}}
                  <span class="t-date">
                    <span>تاريخ</span> {{ $transaction->created_at->format('Y-m-d') }}
                    <span> بتوقيت </span>{{ $transaction->created_at->format('h:m:s A') }}
                  </span>
                </div>

                {{-- desc --}}
                <div class="t-desc">
                  <p>
                    <span>{{ $transaction->meta['state_1'] }}</span>
                    <span>( {{ $transaction->meta['depositor'] }} )</span>
                    <span>{{ $transaction->meta['state_2'] }}</span>
                    <span>( {{ $transaction->meta['recipient'] }} )</span>
                  </p>
                  <span> المبلغ: {{ $transaction->amount }}</span>

                </div>
                <a href="{{ route('client.invoice', $transaction->meta['invoice_id']) }}" class="btn">عرض الفاتورة</a>
              </div>
            @endforeach
          @endif
        </div>


      </div>
    </div>

  </main>

@stop
