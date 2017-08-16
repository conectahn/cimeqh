<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Proyectos Registrados<small></small></h2>
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

          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Código del Poyecto</th>
                <th>Nombre del Proyecto</th>
                <th>Departamento del Proyecto</th>
                <th>Nombre del Propietario</th>
                <th>Identidad del Propietario</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              {{foreach proyectos}}
                <tr>
                  <td>{{proyectoId}}</td>
                  <td>{{proyectoNombre}}</td>
                  <td>{{departamentoDescripcion}}</td>
                  <td>{{proyectoNombrePropietario}}</td>
                  <td>{{proyectoIdentidadPropietario}}</td>
                  <td>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-{{proyectoId}}">Ver</button>
                    <a href="index.php?page=modificarProyectos&proyectoId={{proyectoId}}&accion=UPD">
                      <button type="button" class="btn btn-warning">Modificar</button>
                    </a>
                    <div class="modal fade bs-example-modal-lg-{{proyectoId}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Datos del Proyecto</h4>
                          </div>
                          <div class="modal-body">
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
                          </div>
                          <div class="modal-footer">
                            {{if factibilidad}}
                              <a href="index.php?page=factibilidadProyectos&proyectoId={{proyectoId}}&accion=INS"><button type="button" class="btn btn-success">Solicitar Factibilidad</button></a>
                            {{endif factibilidad}}
                            {{if aprobacion}}
                              <a href="index.php?page=aprobacionProyectos&proyectoId={{proyectoId}}&accion=INS"><button type="button" class="btn btn-success">Solicitar Aprobación</button></a>
                            {{endif aprobacion}}
                            {{ifnot factibilidad}}
                              <a href="index.php?page=factibilidadProyectos&proyectoId={{proyectoId}}&accion=INS"><button type="button" class="btn btn-success" disabled>Ya ha realizado una Solicitud de Factibilidad</button></a>
                            {{endifnot factibilidad}}
                            {{ifnot aprobacion}}
                              <a href="index.php?page=aprobacionProyectos&proyectoId={{proyectoId}}&accion=INS"><button type="button" class="btn btn-success" disabled>Ya ha realizado una Solicitud de Aprobación</button></a>
                            {{endifnot aprobacion}}
                          </div>
                        </div>
                      </div>

                    </div>
                  </td>
                </tr>
              {{endfor proyectos}}
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
