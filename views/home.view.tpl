<div class="right_col" role="main">



    <div class="container">

<h1>Hola</h1>

<script src="graficas/code/highcharts.js"></script>
<script src="graficas/code/modules/exporting.js"></script>

<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Dinero Recaudado por Cimeqh'
    },
    subtitle: {
        text: 'Esto solo es un ejemplo, valores irreales'
    },
    xAxis: {
        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Lempiras'
        },
        labels: {
            formatter: function () {
                return this.value / 1000;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' Lempiras'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Compra de Timpres',
        data: [502, 635, 809, 947, 1402, 3634, 5268]
    }, {
        name: 'Pago Colegiaturas',
        data: [106, 107, 111, 133, 221, 767, 1766]
    }, {
        name: 'Despeje',
        data: [163, 203, 276, 408, 547, 729, 628]
    }, {
        name: 'Recepcion',
        data: [18, 31, 54, 156, 339, 818, 1201]
    }, {
        name: 'Factibilidad',
        data: [200, 152, 289, 670, 130, 300, 460]
    }]
});
		</script>






  </div>

</div>
