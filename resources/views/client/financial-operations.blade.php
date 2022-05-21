@extends('layouts.client.master')
@section('content')
  <x-alert type="status" />

  {{-- TODO STYLE PAGE (NAIF) 😅 --}}
  <main class="page-invoice-profile">

    <section class="t-wallet-wrapper t-card">
      <div class="t-wallet">
        <x-icon icon='wallet' />
        <span>رصيدك الحالي:</span>
        <span>{{ Auth::user()->balance }}</span>
      </div>
    </section>

    {{-- content --}}
    <div class="t-content">
      {{-- log data --}}
      <div class="t-log-data">
        <header>
          <x-font-icon icon='sack-dollar' />

          <h3 class="t-heading">@lang('heading.invoice-profile')</h3>
        </header>

        <div class="t-list">
          @if (isset($transactions))
            @foreach ($transactions as $transaction)
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
                <div style="display:flex; justify-content: end">
                  <a href="{{ route('client.invoice', $transaction->meta['invoice_id']) }}" class="btn">عرض
                    الفاتورة</a>
                </div>
              </div>
              <hr class="divided">
            @endforeach
          @endif
        </div>


      </div>
    </div>

  </main>

@stop
