@extends('layouts.pharmacy/master')

@section('content')
  <main class="page-admin-report">
    <div class="t-chart">

      {{-- orders --}}
      <div class="t-chart-item t-card">
        <h3 class="t-chart-title">@lang('heading.orders')</h3>
        <canvas id="chart-orders" width="300" height="300"></canvas>
      </div>

      {{-- clients --}}
      <div class="t-chart-item t-card">
        <h3 class="t-chart-title">@lang('heading.clients')</h3>
        <canvas id="chart-clients" width="300" height="300"></canvas>
      </div>

      {{-- profits --}}
      <div class="t-chart-item t-card">
        <h3 class="t-chart-title">@lang('heading.profits')</h3>
        <canvas id="chart-profits" width="300" height="300"></canvas>
      </div>
    </div>

  </main>
@endsection


@section('script')
  <x-chart />

  <script>
    // orders
    axios.get('/api/report/orders').then(res => {

      chartFactor({
        label: '@lang('heading.orders')',
        element: el('#chart-orders').getContext('2d'),
        // labels: toLabels(res.data),
        // data: toData(res.data)
        labels: toLabels(fakeChartData()),
        data: toData(fakeChartData()),
      });
    })

    // clients
    // axios.get('/api/report/clients').then(res => {
    axios.get('/api/report/orders').then(res => {

      chartFactor({
        label: '@lang('heading.clients')',
        element: el('#chart-clients').getContext('2d'),
        // labels: toLabels(res.data),
        // data: toData(res.data)
        labels: toLabels(fakeChartData()),
        data: toData(fakeChartData()),
      });
    })

    // profits
    // axios.get('/api/report/profits').then(res => {
    axios.get('/api/report/orders').then(res => {

      chartFactor({
        label: '@lang('heading.profits')',
        // type: 'radar',
        element: el('#chart-profits').getContext('2d'),
        // labels: toLabels(res.data),
        // data: toData(res.data)
        labels: toLabels(fakeChartData()),
        data: toData(fakeChartData()),
      });
    })
  </script>
@endsection
