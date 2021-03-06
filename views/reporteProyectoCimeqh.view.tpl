<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>General Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
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
                    <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
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
                            <form method="post" action="index.php?page=reporteProyectoCimeqh">
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Factibilidad</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Aprobacion</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Recepcion</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Despeje</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Default Example <small>Users</small></h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Proyecto Nombre</th>
                                    <th>proyecto ID</th>
                                    <th>Estado Actual</th>
                                    <th>Region</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{foreach factibilidades}}
                                  <tr>
                                    <td>{{proyectoNombre}}</td>
                                    <td>{{proyectoId}}</td>
                                    <td>{{estadoFactibilidadDescripcion}}</td>
                                    <td>{{region}}</td>
                                  </tr>
                                  {{endfor factibilidades}}
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Default Example <small>Users</small></h2>
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
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <table id="datatable-checkbox" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Proyecto Nombre</th>
                                    <th>proyecto ID</th>
                                    <th>Estado Actual</th>
                                    <th>Region</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{foreach aprobaciones}}
                                  <tr>
                                    <td>{{proyectoNombre}}</td>
                                    <td>{{proyectoId}}</td>
                                    <td>{{estadoAprobacionDescripcion}}</td>
                                    <td>{{region}}</td>
                                  </tr>
                                  {{endfor aprobaciones}}
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Default Example <small>Users</small></h2>
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
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Proyecto Nombre</th>
                                    <th>proyecto ID</th>
                                    <th>Estado Actual</th>
                                    <th>Region</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{foreach recepciones}}
                                  <tr>
                                    <td>{{proyectoNombre}}</td>
                                    <td>{{proyectoId}}</td>
                                    <td>{{estadoRecepcionDescripcion}}</td>
                                    <td>{{region}}</td>
                                  </tr>
                                  {{endfor recepciones}}
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Default Example <small>Users</small></h2>
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
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <table id="datatable-keytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Proyecto Nombre</th>
                                    <th>proyecto ID</th>
                                    <th>Estado Actual</th>
                                    <th>Region</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{foreach despejes}}
                                  <tr>
                                    <td>{{proyectoNombre}}</td>
                                    <td>{{proyectoId}}</td>
                                    <td>{{estadoDespejeDescripcion}}</td>
                                    <td>{{region}}</td>
                                  </tr>
                                  {{endfor despejes}}
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Default Example <small>Users</small></h2>
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
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <table id="datatable-keytable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Proyecto Nombre</th>
                                    <th>proyecto ID</th>
                                    <th>Estado Actual</th>
                                    <th>Region</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{foreach despejes}}
                                  <tr>
                                    <td>{{proyectoNombre}}</td>
                                    <td>{{proyectoId}}</td>
                                    <td>{{estadoDespejeDescripcion}}</td>
                                    <td>{{region}}</td>
                                  </tr>
                                  {{endfor despejes}}
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <!-- Espacio para la grafica
                        <script src="graficas/code/highcharts.js"></script>
                        <script src="graficas/code/highcharts-3d.js"></script>
                        <script src="graficas/code/modules/exporting.js"></script>

                        <div id="container" style="height: 400px"></div>


                        		<script type="text/javascript">

                        Highcharts.chart('container', {
                            chart: {
                                type: 'pie',
                                options3d: {
                                    enabled: true,
                                    alpha: 45,
                                    beta: 0
                                }
                            },
                            title: {
                                text: 'Browser market shares at a specific website, 2014'
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    depth: 35,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.name}'
                                    }
                                }
                            },
                            series: [{
                                type: 'pie',
                                name: 'Browser share',
                                data: [
                                    ['Firefox', 45.0],
                                    ['IE', 26.8],
                                    {
                                        name: 'Chrome',
                                        y: 12.8,
                                        sliced: true,
                                        selected: true
                                    },
                                    ['Safari', 8.5],
                                    ['Opera', 6.2],
                                    ['Others', 0.7],
                                ]
                            }]
                        });
                        		</script>
                          -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
