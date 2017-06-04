$(document).ready(function () {
  const options = {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie',
      backgroundColor: null
    },
    title: {
      text: '',
      style: {
        display: 'none'
      }
    },

    credits: {
      enabled: false
    },

    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: false
        }
      }
    },
    series: [
      {
        enableMouseTracking: false,
        shadow: {
          color: 'grey',
          width: 5,
          opacity: 0.1,
          offsetX: 0,
          offsetY: 3
        },
        data: [
          {
            y: 27,
            sliced: true
					},
          {
            y: 73
					}
				]
			}
		]
  };

  Highcharts.setOptions({
    colors: ['#F2F2F2', '#00B4CB']
  });
  // Build the chart
  Highcharts.chart('charts', options);
  Highcharts.chart('charts2', options);
  options.series = [
    {
      enableMouseTracking: false,
      showInLegend: false,
      shadow: {
        color: 'grey',
        width: 5,
        opacity: 0.1,
        offsetX: 0,
        offsetY: 3
      },
      data: [
        {
          name: 'confiance envers les professionnels du BTP',
          y: 86
				},
        {
          name: 'les consommateurs',
          y: 14,
          sliced: true
				}
			]
		}
	];
  Highcharts.chart('charts3', options);
  options.series = [
    {
      enableMouseTracking: false,
      shadow: {
        color: 'grey',
        width: 5,
        opacity: 0.1,
        offsetX: 0,
        offsetY: 3
      },
      colorByPoint: true,
      data: [
        {
          y: 70
				},
        {
          y: 30,
          sliced: true
				}
			]
		}
	];
  Highcharts.chart('charts4', options);
  options.series = [
    {
      enableMouseTracking: false,
      shadow: {
        color: 'grey',
        width: 5,
        opacity: 0.1,
        offsetX: 0,
        offsetY: 3
      },
      colorByPoint: true,
      data: [
        {
          y: 50
				},
        {
          y: 50,
          sliced: true
				}
			]
		}
	];
  Highcharts.chart('charts5', options);
  options.series = [
    {
      enableMouseTracking: false,
      shadow: {
        color: 'grey',
        width: 5,
        opacity: 0.1,
        offsetX: 0,
        offsetY: 3
      },
      colorByPoint: true,
      data: [
        {
          y: 17
				},
        {
          y: 83,
          sliced: true
				}
			]
		}
	];
});
