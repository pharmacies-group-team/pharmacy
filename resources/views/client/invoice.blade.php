@extends('layouts/client/master')
@section('content')

{{--  {{ dd($success) }}--}}

  <main class="page-invoice" style="width: 95%; margin: auto; padding-top: 40px">

    <div>
      {{-- header --}}
      <header class="t-header">
        <h2 class="t-title" style="color: #3869BA">@lang('heading.invoice-buying')</h2>

        {{-- invoice info --}}
        <div class="t-invoice-info" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
          {{-- date --}}
          <div class="t-item">
            <span class="t-item-key" style="margin-left: 8px; color: #3869BA">@lang('heading.date')</span>
            <span class="t-item-value" style="color: #588FF4">2020/20/2</span>
          </div>

          {{-- invoice id --}}
          <div class="t-item">
            <span class="t-item-key" style="margin-left: 8px; color: #3869BA">@lang('heading.invoice_id')</span>
            <span class="t-item-value" style="color: #588FF4">1</span>
          </div>
        </div>
      </header>

      {{-- invoice desc --}}
      <div class="t-invoice-desc" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
        {{-- invoice from --}}
        <div class="t-item">
          <h4 class="t-title">@lang('heading.invoice-from')</h4>

          {{-- pharmacy name --}}
          <h3 class="t-name" style="color: #3869BA">
            {{-- TODO change this to pharmacy icon --}}
            <x-icon icon='home' />
            PHarmacy name
          </h3>

          {{-- pharmacy address --}}
          <h3 class="t-label" style="color: #588FF4">
            <x-icon icon='location' />
            PHarmacy address
          </h3>

          {{-- pharmacy phone --}}
          <h3 class="t-label" style="color: #588FF4">
            <x-icon icon='phone' />
            123456789
          </h3>

          {{-- pharmacy email --}}
          <h3 class="t-label" style="color: #588FF4">
            <x-icon icon='email' />
            pharmacy@g.com
          </h3>
        </div>

        {{-- invoice to --}}
        <div class="t-item">
          <h4 class="t-title">@lang('heading.invoice-from')</h4>

          {{-- client name --}}
          <h3 class="t-name" style="color: #3869BA">
            {{-- TODO change this to client icon --}}
            <x-icon icon='home' />
            client name
          </h3>

          {{-- client address --}}
          <h3 class="t-label" style="color: #588FF4">
            <x-icon icon='location' />
            client address
          </h3>

          {{-- client phone --}}
          <h3 class="t-label" style="color: #588FF4">
            <x-icon icon='phone' />
            123456789
          </h3>

          {{-- client email --}}
          <h3 class="t-label" style="color: #588FF4">
            <x-icon icon='email' />
            client@g.com
          </h3>
        </div>
      </div>
    </div>

    <hr class="divided">

    {{-- invoice table --}}
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            {{-- name --}}
            <th> @lang('heading.product-name')</th>

            {{-- description --}}
            <th> @lang('heading.product-description')</th>

            {{-- cost --}}
            <th> @lang('heading.product-cost')</th>

            {{-- amount --}}
            <th> @lang('heading.product-quantity')</th>

            {{-- price --}}
            <th> @lang('heading.product-price')</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            {{-- name --}}
            <td>item 1</td>

            {{-- description --}}
            <td> bla bla</td>

            {{-- cost --}}
            <td>10</td>

            {{-- amount --}}
            <td>1</td>

            {{-- price --}}
            <td>10</td>
          </tr>
          <tr>
            {{-- name --}}
            <td>item 1</td>

            {{-- description --}}
            <td> bla bla</td>

            {{-- cost --}}
            <td>10</td>

            {{-- amount --}}
            <td>1</td>

            {{-- price --}}
            <td>10</td>
          </tr>
          <tr>
            {{-- name --}}
            <td>item 1</td>

            {{-- description --}}
            <td> bla bla</td>

            {{-- cost --}}
            <td>10</td>

            {{-- amount --}}
            <td>1</td>

            {{-- price --}}
            <td>10</td>
          </tr>
        </tbody>
      </table>
    </div>

    <hr class="divided">

    {{-- invoice total --}}
    <div class="t-total" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">@lang('heading.subtotal')</h4>
        <h4 class="t-value">2000.00</h4>
      </div>

      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">@lang('heading.taxes')</h4>
        <h4 class="t-value">10%</h4>
      </div>

      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">@lang('heading.total')</h4>
        <h4 class="t-value t-price">$1600.00</h4>
      </div>

    </div>

    <hr class="divided">

    {{-- address --}}
    <div class="t-total" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
      <h4 class="t-title" style="color: #3869BA; font-size: 18px; margin-bottom: 16px">عنوان التوصيل </h4>
      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">اسم المستلم</h4>
        <h4 class="t-value">احلام محمد</h4>
      </div>

      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">رقم الهاتف</h4>
        <h4 class="t-value">773773773</h4>
      </div>

      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">وصف العنوان</h4>
        <h4 class="t-value">وصف</h4>
      </div>

    </div>


  </main>

@stop
