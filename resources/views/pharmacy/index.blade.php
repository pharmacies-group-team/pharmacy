@extends('layouts.pharmacy/master')

@section('content')
  <main class="page-admin-report">
    <div class="t-chart">

      {{-- orders --}}
      <div class="t-chart-item t-card">
        <h3 class="t-chart-title">@lang('heading.orders')</h3>
        <canvas id="chart-orders" width="300" height="300"></canvas>
      </div>

      {{-- pharmacies --}}
      <div class="t-chart-item t-card">
        <h3 class="t-chart-title">@lang('heading.pharmacies')</h3>
        <canvas id="chart-pharmacies" width="300" height="300"></canvas>
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
  <script>
    const toLabels = (items) => items.map(item => Object.keys(item)).flat()
    const toData = (items) => items.map(item => Object.values(item)).flat()
  </script>


  {{-- chart settings --}}
  <script>
    const CHART_LABELS = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December'
    ];

    const CHART_COLORS = [
      'rgb(88 ,143 ,244)',
      '#f44336 ',
      ' #e91e63',
      '#9c27b0 ',
      ' #673ab7',
      '#3f51b5 ',
      '#2196f3 ',
      '#4caf50 ',
      '#cddc39',
      '#ffc107',
      '#ff9800',
      '#ff5722',
      '#607d8b',
    ];
  </script>

  {{-- chart factory --}}
  <script>
    const chartFactor = ({
      element,
      type = 'line',
      labels,
      label,
      data
    }) => {
      return new Chart(element, {
        type,
        // type: 'polarArea',
        data: {
          labels,
          datasets: [{
            label,
            data,
            // backgroundColor: 'rgb(88 ,143 ,244)',
            backgroundColor: CHART_COLORS,
            borderWidth: 1,
            borderColor: CHART_COLORS,
          }]
        },
        options: {
          animation: false,
          responsive: true,
          plugins: {
            // legend: {
            //   display: false
            // }
          },
          scales: {
            y: {
              // type: 'linear',
              min: 0,
            }
          }
        }
      });
    }
  </script>

  <script>
    // orders
    axios.get('/api/report/orders').then(res => {
      console.log(res.data)

      chartFactor({
        label: '@lang('heading.orders')',
        element: el('#chart-orders').getContext('2d'),
        labels: toLabels(res.data),
        data: toData(res.data)
      });
    })

    // pharmacies
    // axios.get('/api/report/pharmacies').then(res => {
    axios.get('/api/report/orders').then(res => {
      console.log(res.data)

      chartFactor({
        label: '@lang('heading.pharmacies')',
        element: el('#chart-pharmacies').getContext('2d'),
        labels: toLabels(res.data),
        data: toData(res.data)
      });
    })

    // clients
    // axios.get('/api/report/clients').then(res => {
    axios.get('/api/report/orders').then(res => {
      console.log(res.data)

      chartFactor({
        label: '@lang('heading.clients')',
        element: el('#chart-clients').getContext('2d'),
        labels: toLabels(res.data),
        data: toData(res.data)
      });
    })

    // profits
    // axios.get('/api/report/profits').then(res => {
    axios.get('/api/report/orders').then(res => {
      console.log(res.data)

      chartFactor({
        label: '@lang('heading.clients')',
        // type: 'radar',
        element: el('#chart-profits').getContext('2d'),
        labels: toLabels(res.data),
        data: toData(res.data)
      });
    })
  </script>
@endsection
