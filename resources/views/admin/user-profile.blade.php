@extends('layouts.admin.master')
@section('content')
  <x-alert type="status" />

  {{-- TODO STYLE PAGE (NAIF) 😅 --}}
  <main class="page-invoice-profile container" style="padding-top: 0">

    {{-- bg --}}
    <div class="t-bg" style="min-height: 12rem; background: #3869BA"></div>

    {{-- user --}}
    <header class="t-header">
      {{-- avatar --}}
      <div class="t-avatar">
        <img src="{{ asset('uploads/user/' . $user->avatar) }}" alt="user avatar">
      </div>

      {{-- user info --}}
      <div class="t-user-desc">
        {{-- user name --}}
        <h3 class="t-user-name">
{{--          <x-icon icon='home' />--}}

          <span> {{ $user->name }} </span>
        </h3>

        {{-- item date --}}
        <div class="t-item">
{{--          <x-icon icon='home' />--}}

          <span>{{ $user->created_at }}</span>
        </div>
        @if($user->hasRole(\App\Enum\RoleEnum::PHARMACY))
          <div style="display: flex;
                  justify-content: center;
                  align-items: center;
                  gap: 6px;
                  background: #3869ba;
                  color: #d5e4ff;
                  padding: 4px 18px;
                  border: 1px solid #d5e4ff;
                  border-radius: 6px;">
            {{--        <x-icon icon='wallet' />--}}
            <a href="{{ route('show.pharmacy.profile', $user->pharmacy->id) }}">بروفايل الصيدلية</a>
          </div>
        @endif
      </div>
    </header>

    @if($user->hasRole(\App\Enum\RoleEnum::PHARMACY))
      <div style="display: flex; align-items: center; gap: 12px ">

        <div style="display: flex;
                  justify-content: center;
                  align-items: center;
                  gap: 6px;
                  background: #ecf2ff;
                  padding: 4px 18px;
                  border: 1px solid #d5e4ff;
                  border-radius: 6px;">
          <x-icon icon='wallet' />
          <span style="color: rgb(78 125 203)">الرصيد الحالي:</span>
          <span style="color: #3869BA">{{ $amount_not_confirmed }}</span>
        </div>

        <div style="display: flex;
                  justify-content: center;
                  align-items: center;
                  gap: 6px;
                  background: #ecf2ff;
                  padding: 4px 18px;
                  border: 1px solid #d5e4ff;
                  border-radius: 6px;">
          <x-icon icon='wallet' />
          <span style="color: rgb(78 125 203)">الرصيد القابل للسحب:</span>
          <span style="color: #3869BA">{{ $amount_confirmed }}</span>
        </div>

        <div style="display: flex;
                  justify-content: center;
                  align-items: center;
                  gap: 6px;
                  background: #ecf2ff;
                  padding: 4px 18px;
                  border: 1px solid #d5e4ff;
                  border-radius: 6px;">
          {{--        <x-icon icon='wallet' />--}}
          <span style="color: rgb(78 125 203)"> الفواتير المؤكدة:</span>
          <span style="color: #3869BA">{{ $invoice_confirmed }}</span>
        </div>

        <div style="display: flex;
                  justify-content: center;
                  align-items: center;
                  gap: 6px;
                  background: #ecf2ff;
                  padding: 4px 18px;
                  border: 1px solid #d5e4ff;
                  border-radius: 6px;">
          {{--        <x-icon icon='wallet' />--}}
          <span style="color: rgb(78 125 203)"> الفواتير الغير مؤكدة:</span>
          <span style="color: #3869BA">{{ $invoice_not_confirmed }}</span>
        </div>





      </div>

    @else
      <div style="display: flex; align-items: center; ">
        <div style="display: flex;
                  justify-content: center;
                  align-items: center;
                  gap: 6px;
                  background: #ecf2ff;
                  padding: 4px 18px;
                  border: 1px solid #d5e4ff;
                  border-radius: 6px;">
          <x-icon icon='wallet' />
          <span>الرصيد الحالي:</span>
          <span>{{ $amount_confirmed }}</span>
        </div>
      </div>
    @endif

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
                  <a href="{{ route('admin.invoice', $transaction->meta['order_id']) }}" class="btn">عرض الفاتورة</a>
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
