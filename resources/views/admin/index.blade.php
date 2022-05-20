@extends('layouts.admin.master')
@section('content')
  <main class="page-admin-report">
    <div class="t-chart">

      <div class="t-chart-item">
        <h3 class="t-chart-title">@lang('heading.orders')</h3>
        <canvas id="chart-orders" width="300" height="300"></canvas>
      </div>

      <div class="t-chart-item">
        <h3 class="t-chart-title">@lang('heading.pharmacies')</h3>
        <canvas id="chart-pharmacies" width="300" height="300"></canvas>
      </div>

      <div class="t-chart-item">
        <h3 class="t-chart-title">@lang('heading.clients')</h3>
        <canvas id="chart-clients" width="300" height="300"></canvas>
      </div>
    </div>

  </main>
@endsection


@section('script')
  <script>
    const toLabels = (items) => items.map(item => Object.keys(item)).flat()
    const toData = (items) => items.map(item => Object.values(item)).flat()
  </script>

  {{-- chart factory --}}
  <script>
    const chartFactor = ({
      element,
      labels,
      label,
      data
    }) => {
      return new Chart(element, {
        type: 'line',
        // type: 'polarArea',
        data: {
          labels,
          datasets: [{
            label,
            data,
            backgroundColor: 'rgb(88 ,143 ,244)',
            borderWidth: 1,
            borderColor: 'rgb(88 ,143 ,244)',
          }]
        },
        options: {
          responsive: true,
          plugins: {
            // legend: {
            //   display: false
            // }
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
        label: '@lang("heading.orders")',
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
        label: '@lang("heading.pharmacies")',
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
        label: '@lang("heading.clients")',
        element: el('#chart-clients').getContext('2d'),
        labels: toLabels(res.data),
        data: toData(res.data)
      });
    })
  </script>
@endsection
