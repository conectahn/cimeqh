<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Solicitudes de Aprobacion</h2>
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
                <th>Nombre Proyecto</th>
                <th>Propietario Nombre</th>
                <th>Nombre Usuario</th>
                <th>Numero Colegiación</th>
                <th>Estado de la Solicitud</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              {{foreach solicitud}}
                <tr>
                  <td>{{proyectoNombre}}</td>
                  <td>{{proyectoNombrePropietario}}</td>
                  <td>{{usuarioPrimerNombre}} {{usuarioSegundoNombre}} {{usuarioPrimerApellido}} {{usuarioSegundoApellido}}</td>
                  <td>{{usuarioNumeroColegiacion}}</td>
                  <td>{{estadoAprobacionDescripcion}}</td>
                  <td> <button id="btnOpciones12" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-{{solicitudAprobacionId}}" value="{{solicitudAprobacionId}}">Opciones</button>
                    <div class="modal fade bs-example-modal-lg-{{solicitudAprobacionId}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Datos del Proyecto</h4>
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
                          <h4>Datos del Ingeniero</h4>
                          Nombre del Ingeniero: {{usuarioPrimerNombre}} {{usuarioSegundoNombre}} {{usuarioPrimerApellido}} {{usuarioSegundoApellido}}
                          <br>
                          Numero de Colegiación: {{usuarioNumeroColegiacion}}
                          <br>
                          Telefono Ingeniero: {{usuarioTelefono}}
                          <br>
                          Celular Ingeniero: {{usuarioCelular}}
                          <br>
                          <h4>Datos de la Solicitud</h4>
                          Monto Estimado del Proyecto: {{solicitudAaprobacionMontoEstimado}}
                          <br>
                          Total de Timbres a Pagar: {{solicitudAprobacionCosto}}
                          <br>
                          </div>
                          <div class="modal-footer">
                          <form method="post" action="index.php?page=solicitudDeCuentas">
                          <input id="usuarioIdentidad" type="hidden" name="usuarioIdentidad" value={{usuarioIdentidad}}>
                          <a href="index.php?page=documentos&accion=aprobacion&codigo={{solicitudAprobacionId}}" target="_blank"><input type="button" name="btnDescargar" id="btnDescargar" class="btn btn-warning" value="Ver Documentos Agregados" target="_blank">
                            {{if aprobado}}
                          <a href="index.php?page=comentarios&tipo=rechazo&accion=aprobacion&codigo={{solicitudAprobacionId}}"><input type="button" name="btnRechazar" id="btnRechazar" class="btn btn-danger" value="Rechazar Aprobación">
                          <a href="index.php?page=comentarios&tipo=aceptado&accion=aprobacion&codigo={{solicitudAprobacionId}}"><input type="button" name="btnAceptar" id="btnAceptar" class="btn btn-success" value="Aceptar Aprobación">
                            {{endif aprobado}}
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              {{endfor solicitud}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
