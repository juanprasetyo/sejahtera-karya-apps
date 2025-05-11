import ApexCharts from 'apexcharts';

const chart = document.querySelector("#chart");
const data = chart.getAttribute('data-chart');

const dataX = JSON.parse(data).map((value) => value[0]);
const dataY = JSON.parse(data).map((value) => value[1]);

const options = {
  chart: {
    type: 'bar',
    stacked: true,
    background: "transparent",
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
        borderRadius: 8,
        borderRadiusApplication: "end",
        borderRadiusWhenStacked: "last",
        colors: {
            backgroundBarColors: ["rgba(150,150,150,0.07)"],
            backgroundBarRadius: 8
        },
        columnWidth: "45%",
        barHeight: "100%"
    }
  },
  dataLabels: {
      enabled: false,
  },
  legend: {
    show: true,
    horizontalAlign: "center",
    offsetX: 0,
    offsetY: 6
  },
  series: [
    {
      name: 'sales',
      data: dataY,
    },
    {
      name: 'lolo',
      data: dataY,
    }
  ],
  xaxis: {
    categories: dataX,
    axisBorder: {
      show: false,
    },
    axisTicks: {
        show: false,
    },
  },
  yaxis: {
    axisBorder: {
        show: false,
    },
    axisTicks: {
        show: false,
    },
    labels: {
        show: false,
    }
  },
  tooltip: {
    enabled: true,
    shared: true,
    intersect: false,
  },
  grid: {
    show: false,
  },
}

const createChart = new ApexCharts(chart, options);

createChart.render();