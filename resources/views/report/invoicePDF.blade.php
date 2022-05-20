<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <title>Invoice</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

  <style>
    body { font-family: DejaVu Sans, sans-serif; }
  </style>
</head>

<body>
<div class="invoice-print p-5">
@php

$pharmacy = $data['pharmacy'];
$user     = $data['user'];
$products = $data['products'];
$invoice  = $data['invoice'];
$address  = $data['address'];

@endphp
  <div class="d-flex justify-content-between flex-row">
    <div class="mb-4">
      <div class="d-flex svg-illustration mb-3 gap-2">
        <a class="navbar-brand text-decoration-none m-0">
          <h1 class="text-primary-darker fs-4 fw-bold">PHARMACY <span
              class="fs-6 fw-normal text-primary-base">online</span></h1>
        </a>
      </div>
      <p class="mb-1">{{ $data['contactUs']['phone'] }}</p>
      <p class="mb-0">{{ $data['contactUs']['email'] }}</p>
    </div>
    <div>
      <div class="mb-2">
        <b>@lang('heading.invoice_id')</b>
        <span class="fw-semibold">#{{ $invoice->id }}</span>
      </div>
      <div>
        <b>@lang('heading.date')</b>
        <span class="fw-semibold">{{ $invoice->created_at->format('Y/m/d') }}</span>
      </div>
      <div>
        <b>@lang('heading.total')</b>
        <span class="m-3">{{ $invoice->total }} {{ $invoice->currency }}</span>
      </div>
    </div>
  </div>

  <hr>

  <div class="row d-flex justify-content-between mb-4">
    <div class="col-sm-6 w-50">
      <h6>@lang('heading.invoice-from')</h6>
      <p class="mb-1">{{ $pharmacy->name }}</p>
      <p class="mb-1">
      @if (isset($pharmacy->neighborhood_id))
        <h3 class="t-label" style="color: #717171; font-size: 14px">
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
      </p>
      <p class="mb-1">
        {{-- pharmacy phone --}}
        @if (isset($pharmacy->contacts->phone))
          <h3 class="t-label" style="color: #717171 ;font-size: 14px">
            <x-icon icon='phone' />
            {{ $pharmacy->contacts->first()->phone }}
          </h3>
          @endif
      </p>
      <p class="mb-1">
          {{-- pharmacy email --}}
          @if (isset($order->pharmacy->email))
            <h3 class="t-label" style="color: #717171;font-size: 14px">
              <x-icon icon='email' />
              {{ $order->pharmacy->email }}
            </h3>
            @endif
      </p>
    </div>
    <div class="col-sm-6 w-50">
      <h6>@lang('heading.invoice-to')</h6>
      <div class="col-sm-6 w-50">
        <p class="mb-1">{{ $user->name }}</p>
        <p class="mb-1">
          {{-- client phone --}}
          @if (isset($user->phone))
            <h3 class="t-label" style="color: #717171;font-size: 14px">
              {{ $user->phone }}
            </h3>
            @endif
        </p>
        <p class="mb-1">
          {{-- client email --}}
          <h3 class="t-label" style="color: #717171;font-size: 14px">
            {{ $user->email }}
          </h3>
        </p>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table border-top m-0">
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
      @foreach ($products as $product)
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
  <div class="row">
    <div class="col-12">
      <div class="mt-5">
        <b>@lang('heading.total')</b>
        <span class="m-3">{{ $invoice->total }} {{ $invoice->currency }}</span>
      </div>
    </div>
  </div>
<hr>
  <div class="row">
    <div class="col-12">
      <div class="mt-3">
        <div>
          <b>اسم المستلم:</b>
          <span class="m-3">{{ $address->name }}</span>
        </div>

        <div>
          <b>رقم الهاتف:</b>
          <span class="m-3">{{ $address->phone }}</span>
        </div>

        <div>
          <b>وصف العنوان:</b>
          <span class="m-3">{{ $address->desc }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
