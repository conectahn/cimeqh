<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte Financiero CIMEQH</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">ir</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Seleccione un rango de fechas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <form method="post" action="index.php?page=reporteFinancieroCimeqh">
                            <label for="userfile">Ingrese la fecha de inicio</label>
                            <input type="date" id="txtFecha1" name="txtFecha1" class="form-control">
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-group">
                      <div class="input-group date">
                        <label for="txtFecha">Ingrese la fecha final</label>
                        <input type="date" id="txtFecha2" name="txtFecha2" class="form-control">

                      </div>
                      <button class="btn btn-success btn-lg" id="btnFechas" name="btnFechas">Buscar</button>
                    </div>
                       </div>
                       </div>
                    <div class="clearfix"></form></div>
                  </div>
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Reporte de Movimientos Financieros</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Transacciones Realizadas entre {{fecha1}} y {{fecha2}}</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Nombre del Proyecto</th>
                                    <th>Concepto del Pago</th>
                                    <th>Region del Proyecto</th>
                                    <th>Monto Pagado</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{foreach factibilidades}}
                                  <tr>
                                    <td>{{proyectoNombre}}</td>
                                    <td>{{conceptoDescripcion}}</td>
                                    <td>{{regionDescripcion}}</td>
                                    <td>{{montoPagado}}</td>
                                  </tr>
                                  {{endfor factibilidades}}
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Espacio para la grafica  -->
                    <script src="graficas/code/highcharts.js"></script>
                    <script src="graficas/code/modules/exporting.js"></script>

                    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <h2>Ganancias por conceptos entre {{fecha1}} y {{fecha2}}</h2>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Concepto de Pago</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{foreach grafica}}
                        <tr>
                          <td>{{conceptoDescripcion}}</td>
                          <td>{{total}}</td>
                        </tr>
                        {{endfor grafica}}
                      </tbody>
                    </table><br>
                    <h2>Ganancias totales por regiones entre {{fecha1}} y {{fecha2}}</h2>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Regiones</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{foreach totalesRegiones}}
                        <tr>
                          <td>{{region}}</td>
                          <td>{{monto}}</td>
                        </tr>
                        {{endfor totalesRegiones}}
                      </tbody>
                    </table>

                        <script type="text/javascript">

                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Porcentaje de Ingreso por Conceptos de Pago'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Porcentaje',
                            colorByPoint: true,
                            data: [
                        {{foreach grafica}}
                              {
                                name: '{{conceptoDescripcion}}',
                                y: {{total}}
                            },
                          {{endfor grafica}}]
                        }]
                    });
                        </script>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="clearfix"></div>
        </div>
