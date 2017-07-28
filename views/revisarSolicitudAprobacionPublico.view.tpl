<body class="nav-md">
  <div class="contenido">
    <div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
            <div class="">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Código de Aprobación de la Enee<small></small></h2>
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
                <br />
                <form action="" method="post" class="form-horizontal form-label-left input_mask">
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" name="txtCodigo" name="txtCodigo" class="form-control" placeholder="Código de Aprobación">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" id="btnBuscar" name="btnBuscar" class="btn btn-success btn-lg">Buscar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <h1>Datos del Proyecto</h1>
              <div class="x_content">
                {{foreach solicitudes}}
              </div>
              <div class="x_content">

                       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                  <h3>Solicitud Aprobacion Id: {{solicitudAprobacionId}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                  <h3>Nombre del Proyecto: {{proyectoNombre}}</h3>
                                                  <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                          <h3>Estado Actual de la Solicitud: <strong>{{estadoAprobacionDescripcion}}</strong></h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                          <h3>Fecha de Aprobacion: {{solicitudAprobacionFecha}}</h3>
                                                                          <br>
                                                                        </div>
                                                                    </div>
                                        </div>


                                        <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                          <h3>Nombre del Propietario: {{proyectoNombrePropietario}}</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                          <h3>Numero de Identidad del Propietario: {{proyectoIdentidadPropietario}}</h3>
                                                                          <br>
                                                                        </div>
                                                                    </div>
                                        </div>

                                        <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                          <h3>Nombre del Ingeniero o Contratista: {{usuarioPrimerNombre}} {{usuarioSegundoNombre}} {{usuarioPrimerApellido}} {{usuarioSegundoApellido}}</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                          <h3>Comentario Realizado en la Aprobacion: {{comentarioAprobacion}}</h3>
                                                                          <br>
                                                                        </div>
                                                                    </div>
                                        </div>



                                        </div>

                                        {{endfor solicitudes}}

<!--

                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Código de la  Solicitud</th>
                      <th>Nombre del Proyecto</th>
                      <th>Fecha de Aprobación</th>
                      <th>Nombre del Propietario</th>
                      <th>Identidad del Propietario</th>
                      <th>Nombre del Ingeniero</th>
                      <th>Estado e la Solicitud</th>
                      <th>Comentarios</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{foreach solicitudes}}
                      <tr>
                        <td>{{solicitudAprobacionId}}</td>
                        <td>{{proyectoNombre}}</td>
                        <td>{{estadoAprobacionDescripcion}}</td>
                        <td>{{solicitudAprobacionFecha}}</td>
                        <td>{{proyectoNombrePropietario}}</td>
                        <td>{{proyectoIdentidadPropietario}}</td>
                        <td>{{usuarioPrimerNombre}} {{usuarioSegundoNombre}} {{usuarioPrimerApellido}} {{usuarioSegundoApellido}}</td>
                        <td>{{comentarioAprobacion}}</td>
                      </tr>
                    {{endfor solicitudes}}
                  </tbody>
                </table>
              -->


                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Nombre del Documento</th>
                      <th>Descargar</th>
                    </tr>
                  </thead>
                  <tbody>

                  <div class="x_title"></div>
                    <h2>Documentos del Proyecto<small></small></h2>
                    {{foreach documentos}}
                      <tr>
                        <td>{{documentoNombre}}</td>
                        <td>
                          <div class="btn-toolbar" role="toolbar">
                            <a href="{{documentoDireccion}}" download>
                              <input type="button" name="btnDescargar" id="btnDescargar" class="btn btn-warning" value="Descargar" target="_blank">
                            </a>
                          </div>
                        </td>
                      </tr>
                    {{endfor documentos}}
                  </tbody>
                </table>
                <br />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
