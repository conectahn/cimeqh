<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Usuarios en la plataforma Cimeqh</h2>
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
                <th>Numero de Identidad</th>
                <th>Nombre de Colegiación</th>
                <th>Nombre Completo</th>
                <th>Numero de Telefono</th>
                <th>Numero de Celular</th>
                <th>Dirección</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              {{foreach usuario}}
                <tr>
                  <td>{{usuarioIdentidad}}</td>
                  <td>{{usuarioNumeroColegiacion}}</td>
                  <td>{{usuarioPrimerNombre}} {{usuarioPrimerApellido}}</td>
                  <td>{{usuarioTelefono}}</td>
                  <td>{{usuarioCelular}}</td>
                  <td>{{usuarioDireccion}}</td>
                  <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-{{usuarioIdentidad}}">Opciones</button>

                    <div class="modal fade bs-example-modal-lg-{{usuarioIdentidad}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Datos del Proyecto</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Datos del Usuario</h4>
                            Numero de Identidad: {{usuarioIdentidad}}
                            <br>
                            Numero de Colegiación: {{usuarioNumeroColegiacion}}
                            <br>
                            Primer Nombre: {{usuarioPrimerNombre}}
                            <br>
                            Segundo Nombre: {{usuarioSegundoNombre}}
                            <br>
                            Primer Apellido: {{usuarioPrimerApellido}}
                            <br>
                            Segundo Apellido: {{usuarioSegundoApellido}}
                            <br>
                            Numero de Celular: {{usuarioCelular}}
                            <br>
                            Numero de Telefono Fijo: {{usuarioTelefono}}
                            <br>
                            Dirección: {{usuarioDireccion}}
                            <br>
                            Estado de Cuenta: {{estadoCuentaDescripcion}}
                            <br>
                            Rol de la Cuenta: {{rolDescripcion}}
                            <br>
                          </div>
                          <div class="modal-footer">
                              <form method="post" action="index.php?page=verUsuarios">
                              <input id="usuarioIdentidad" type="hidden" name="usuarioIdentidad" value={{usuarioIdentidad}}>
                              <input type="submit" name="btnRechazar" id="btnRechazar" class="btn btn-danger" value="Cerrar">
                              <a href="index.php?page=modificarUsuario&usuarioId={{usuarioIdentidad}}"><input type="button" name="btnModificarUsuario" id="btnModificarUsuario" class="btn btn-success" value="Actualizar Usuario"></a>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              {{endfor usuario}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
