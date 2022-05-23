<script>
  const RANDOM_DATA = () => Math.round(Math.random() * 1e2);

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

  const fakeChartData = () => {
    return CHART_LABELS.map(label => {
      return {
        [label]: RANDOM_DATA()
      }
    })
  }
</script>


<script>
  const toLabels = (items) => items.map(item => Object.keys(item)).flat()
  const toData = (items) => items.map(item => Object.values(item)).flat()

  console.log(fakeChartData());
  console.log(toLabels(fakeChartData()), 'labels');


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
