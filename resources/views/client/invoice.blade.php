@extends('layouts/client/master')
@php use App\Enum\OrderEnum; @endphp
@section('content')

<x-alert type="status" />

  <main class="page-invoice" x-data="{ confirmationModal: false }" style="width: 95%; margin: auto; padding-top: 40px">

    <div>
      {{-- header --}}
      <header class="t-header">
       <div class="section-header">
         <h2 class="t-title" style="color: #3869BA">@lang('heading.invoice-buying')</h2>

         @if($order->status === OrderEnum::DELIVERED_ORDER)
           <h4 style="color: #3869BA; border: 1px solid #588FF4; border-radius: 6px; padding: 8px">تم تأكيد وصول الطلب</h4>
         @elseif($order->status === OrderEnum::PAID_ORDER)
           <button class="btn" @click="confirmationModal = true">تأكيد وصول الطلب</button>
         @endif

       </div>
        {{-- invoice info --}}
        <div class="t-invoice-info" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
          {{-- date --}}
          <div class="t-item">
            <span class="t-item-key" style="margin-left: 8px; color: #3869BA">@lang('heading.date')</span>
            <span class="t-item-value" style="color: #588FF4">{{ $invoice->created_at }}</span>
          </div>

          {{-- invoice id --}}
          <div class="t-item">
            <span class="t-item-key" style="margin-left: 8px; color: #3869BA">@lang('heading.invoice_id')</span>
            <span class="t-item-value" style="color: #588FF4">{{ $invoice->invoice_id }}</span>
          </div>
        </div>
      </header>

      {{-- invoice desc --}}
      <div class="t-invoice-desc" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
        {{-- invoice from --}}
        <div class="t-item">
          <h4 class="t-title">@lang('heading.invoice-from')</h4>

          {{-- pharmacy name --}}
          <h3 class="t-name" style="color: #3869BA;font-size: 18px">
            {{-- TODO change this to pharmacy icon --}}
            <x-icon icon='home' />
            {{ $pharmacy->name }}
          </h3>

          {{-- pharmacy address --}}
          @if(isset($pharmacy->neighborhood_id))
            <h3 class="t-label" style="color: #717171; font-size: 14px">
              <x-icon icon='location' />
              @if (isset($pharmacy->neighborhood->directorate->city))
                <span>{{ $pharmacy->neighborhood->directorate->city->name }} - </span>
              @endif
              @if (isset($pharmacy->neighborhood->directorate))
                <span>{{ $pharmacy->neighborhood->directorate->name }} - </span>
              @endif
              @if (isset($pharmacy->neighborhood))
                <span>{{ $pharmacy->neighborhood->name }} </span>
              @endif
            </h3>
          @endif

          {{-- pharmacy phone --}}
          @if(isset($pharmacy->contacts->phone))
            <h3 class="t-label" style="color: #717171 ;font-size: 14px">
              <x-icon icon='phone' />
              {{ $pharmacy->contacts->first()->phone }}
            </h3>
          @endif

          {{-- pharmacy email --}}
          @if(isset($order->pharmacy->email))
            <h3 class="t-label" style="color: #717171;font-size: 14px">
              <x-icon icon='email' />
              {{ $order->pharmacy->email }}
            </h3>
          @endif
        </div>

        {{-- invoice to --}}
        <div class="t-item">
          <h4 class="t-title">@lang('heading.invoice-to')</h4>

          {{-- client name --}}
          <h3 class="t-name" style="color: #3869BA; font-size: 18px">
            {{-- TODO change this to client icon --}}
            <x-icon icon='home' />
            {{ $user->name }}
          </h3>

          {{-- client address --}}
{{--          <h3 class="t-label" style="color: #717171">--}}
{{--            <x-icon icon='location' />--}}
{{--            client address--}}
{{--          </h3>--}}

          {{-- client phone --}}
          @if(isset($user->phone))
            <h3 class="t-label" style="color: #717171;font-size: 14px">
              <x-icon icon='phone' />
              {{ $user->phone }}
            </h3>
          @endif

          {{-- client email --}}
          <h3 class="t-label" style="color: #717171;font-size: 14px">
            <x-icon icon='email' />
            {{ $user->email }}
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
          @foreach($products as $product)
            <tr>
              {{-- name --}}
              <td>{{ $product->product_name }}</td>

              {{-- description --}}
              <td> {{ $product->product_unit }} </td>

              {{-- cost --}}
              <td>{{ $product->price }}</td>

              {{-- amount --}}
              <td>{{ $product->quantity }}</td>

              {{-- price --}}
              <td>{{ $product->price * $product->quantity }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <hr class="divided">

    {{-- invoice total --}}
    <div class="t-total" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
{{--      <div class="t-item">--}}
{{--        <h4 class="t-key" style="color: #3869BA">@lang('heading.subtotal')</h4>--}}
{{--        <h4 class="t-value">2000.00</h4>--}}
{{--      </div>--}}

{{--      <div class="t-item">--}}
{{--        <h4 class="t-key" style="color: #3869BA">@lang('heading.taxes')</h4>--}}
{{--        <h4 class="t-value">10%</h4>--}}
{{--      </div>--}}

      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">@lang('heading.total')</h4>
        <h4 class="t-value t-price">{{ $invoice->total }} {{ $invoice->currency }}</h4>
      </div>

    </div>

    <hr class="divided">

    {{-- address --}}
    <div class="t-total" style="justify-content: space-between; padding: 10px 30px; background: #F7F9FE; border-radius: 8px; border: 1px solid #DDE9FF">
      <h4 class="t-title" style="color: #3869BA; font-size: 18px; margin-bottom: 16px">عنوان التوصيل </h4>
      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">اسم المستلم</h4>
        <h4 class="t-value">{{ $address->name }}</h4>
      </div>

      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">رقم الهاتف</h4>
        <h4 class="t-value">{{ $address->phone }}</h4>
      </div>

      <div class="t-item">
        <h4 class="t-key" style="color: #3869BA">وصف العنوان</h4>
        <h4 class="t-value">{{ $address->desc }}</h4>
      </div>

    </div>

    {{-- confirmation modal --}}
    <x-modal title="تأكيد وصول الطلب" open="confirmationModal">
      <form action="{{ route('client.orders.confirmation') }}" x-ref="confirmation" method="post" style="text-align: center; height: 120px; display: flex; align-items: center; justify-content: center">
        @csrf
        @method('POST')
        <input hidden name="order_id" value="{{ $order->id }}">
        <h1 class="text-base" style="font-size: 18px ">
          هل تم إيصال الطلب إليك ؟
        </h1>
        <x-slot:footer>
          <button class="btn" type="submit" @click="$refs.confirmation.submit()">نعم</button>
        </x-slot:footer>
      </form>
    </x-modal>

  </main>

@stop
