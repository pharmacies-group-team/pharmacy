@extends('layouts.admin.master')
@section('content')
  <x-alert type="status" />

  {{-- TODO STYLE PAGE (NAIF) 😅 --}}
  <main class="page-invoice-profile container">

    <div style="display: flex; align-items: center; justify-content:end ">
      <div style="display: flex;
                  justify-content: center;
                  align-items: center;
                  gap: 6px;
                  background: #ecf2ff;
                  padding: 4px 18px;
                  border: 1px solid #d5e4ff;
                  border-radius: 6px;">
        <x-icon icon='wallet' />
        <span>رصيدك الحالي:</span>
        <span>{{ Auth::user()->balance }}</span>
      </div>

    </div>

    {{-- content --}}
    <div class="t-content" style="background: white">
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
                <div style="display:flex; justify-content: end">
                  <a href="{{ route('admin.invoice', $transaction->meta['invoice_id']) }}" class="btn">عرض الفاتورة</a>
                </div>
              </div>
            @endforeach
          @endif
        </div>


      </div>
    </div>

  </main>

@stop
