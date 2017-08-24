<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mis Solicitudes de Factibilidad<small></small></h2>
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
          <p class="text-muted font-13 m-b-30">
            Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
          </p>

          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Código de la  Solicitud</th>
                <th>Nombre del Proyecto</th>
                <th>Nombre del Propietario</th>
                <th>Identidad del Propietario</th>
                <th>Fecha de Despeje Solicitado</th>
                <th>Estado e la Solicitud</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              {{foreach solicitudes}}
                <tr>
                  <td>{{solicitudDespejeId}}</td>
                  <td>{{proyectoNombre}}</td>
                  <td>{{proyectoNombrePropietario}}</td>
                  <td>{{proyectoIdentidadPropietario}}</td>
                  <td>{{solicitudDespejeFecha}}</td>
                  <td>{{estadoDespejeDescripcion}}</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-{{solicitudDespejeId}}">Ver</button>

                    <div class="modal fade bs-example-modal-lg-{{solicitudDespejeId}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Dictamen</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Datos del Proyecto</h4>
                            Nombre del Proyecto: {{proyectoNombre}}
                            <br>
                            Departamento: {{departamentoDescripcion}}
                            <br>
                            Direccion Exacta del Proyecto: {{proyectoDireccion}}
                            <br>
                            Descripcion del Proyecto: {{proyectoDescrpcion}}
                            <br>
                            Coordenadas del Proyecto: Latitud: {{proyectoLatitud}} Longitud: {{proyectoLongitud}}
                            <br>
                            <h4>Datos del Propietario</h4>
                            Nombre del Propietario: {{proyectoNombrePropietario}}
                            <br>
                            Identidad Propietario: {{proyectoIdentidadPropietario}}
                            <br>
                            Telefono Propietario: {{proyectoTelefonoPropietario}}
                            <br>
                            Celular Propietario: {{proyectoCelularPropietario}}
                            <br>
                            Email Propietario: {{proyectoEmailPropietario}}
                            <br>
                            Dirección Propietario: {{proyectoDireccionPropietario}}
                            <br>
                            <h4>Datos del Despeje</h4>
                            Fecha del Despeje: {{fecha}}
                            <br>
                            Despeje Hora: {{solicitudDespejeHoras}}
                            <br>
                            Cantidad de Personal: {{solicitudDespejeCantidadPersonal}}
                            <br>
                            Costo del Despeje: {{solicitudDespejeCosto}}
                            <br>
                            {{if comentarioDespeje}}
                              <h4>comentario: {{comentarioDespeje}}</h4>
                            {{endif comentarioDespeje}}
                          </div>
                          <div class="modal-footer">
                              {{if pospuesto}}
                                <a href="index.php?page=pagarDespeje&proyectoId={{proyectoId}}&despejeId={{solicitudDespejeId}}&accion=PAY"><button type="button" class="btn btn-success">Aceptar Fecha y Pagar despeje de Energia</button></a>
                              {{endif pospuesto}}
                              {{if reintentar}}
                                <a href="index.php?page=solicitudDespeje&proyectoId={{proyectoId}}&despejeId={{solicitudDespejeId}}&accion=UPD"><button type="button" class="btn btn-warning">Modificar Solicitud de Aprobacion</button></a>
                              {{endif reintentar}}
                              {{ifnot reintentar}}
                                <a href="index.php?page=pagarDespeje&proyectoId={{proyectoId}}&despejeId={{solicitudDespejeId}}&accion=PAY"><button type="button" class="btn btn-primary">Pagar despeje de Energia</button></a>
                              {{endifnot reintentar}}
                              <form method="post" action="index.php?page=solicitudDeCuentas">
                              <input id="usuarioIdentidad" type="hidden" name="usuarioIdentidad" value={{usuarioIdentidad}}>

                              </form>
                          </div>
                        </div>
                      </div>

                    </div>
                  </td>
                </tr>
              {{endfor solicitudes}}
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
