<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Modificar Proyecto</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                  <h2>Datos del Proyecto</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>

                    <form action="index.php?page=modificarProyectos" id="defaultForm" data-parsley-validate class="form-horizontal form-label-left" method="post">
                      <input type="hidden" name="proyectoId" id="proyectoId" value="{{proyectoId}}">
                      <input type="hidden" name="accion" id="accion" value="{{accion}}">

              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtProyectoNombre">Nombre del proyecto *</label>
                                                      <input type="text" id="txtProyectoNombre"class="form-control" name="txtProyectoNombre" value="{{proyectoNombre}}" >
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Departamento *</label>
                                                      <input type="text" id="txtproyectoDepartamento"class="form-control" name="txtproyectoDepartamento" value="{{departamentoNombre}}" >
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Dirección Exacta del Proyecto *</label>
                                                      <input id="txtDireccionProyecto" type="text" name="txtDireccionProyecto" class="form-control"  value="{{proyectoDireccion}}" >
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                               <div class="form-group">
                                                   <label for="form_message">Descripcion del Proyecto *</label>
                                                   <textarea id="txtDescripcionProyecto" name="txtDescripcionProyecto" class="form-control"  rows="4">{{proyectoDescrpcion}}</textarea>
                                               </div>
                                           </div>
                                          </div>

                                          <h4>Coordenadas</h4>

                                          <div class="row">
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              <label for="form_name">Latitud *</label>
                                                                              <input id="txtLatitud" type="text" name="txtLatitud" class="form-control" value="{{proyectoLatitud}}" >
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              <label for="form_lastname">Longitud *</label>
                                                                              <input id="txtLongitud" type="text" name="txtLongitud" class="form-control" value="{{proyectoLongitud}}" >
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              <label for="form_name">Zona UTM *</label>
                                                                              <input id="UTM" type="text" name="UTM" class="form-control" value="{{zonaUtm}}">
                                                                          </div>
                                                                      </div>
                                          </div>

              					 <h4>Datos Propietario</h4></br>
              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Propietario *</label>
                                                      <input id="txtNombrePropietario" type="text" name="txtNombrePropietario" class="form-control" value="{{proyectoNombrePropietario}}" >
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Numero de Identidad del Propietario *</label>
                                                      <input id="txtIdentidadPropietario" type="text" name="txtIdentidadPropietario" class="form-control" value="{{proyectoIdentidadPropietario}}" >
                                                  </div>
                                              </div>
                                          </div>

              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Telefono Propietario *</label>
                                                      <input id="txtTelefonoPropietario" type="text" name="txtTelefonoPropietario" class="form-control" value="{{proyectoTelefonoPropietario}}" >
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Celular Propietario *</label>
                                                      <input id="txtCelularPropietario" type="text" name="txtCelularPropietario" class="form-control" value="{{proyectoCelularPropietario}}" >
                                                  </div>
                                              </div>
                                          </div>

              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Email Propietario *</label>
                                                      <input id="txtEmailPropietario" type="text" name="txtEmailPropietario" class="form-control"value="{{proyectoEmailPropietario}}" >
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Dirección Propietario *</label>
                                                      <input id="txtDireccionPropietario" type="text" name="txtDireccionPropietario" class="form-control" value="{{proyectoDireccionPropietario}}" >
                                                  </div>
                                              </div>
                                          </div>


              			<div class="row">

                                          </div>


              				<!--Boton Submit-->
              				<input type="submit" id="btnModificarProyectos" name="btnModificarProyectos"class="btn btn-default" value="Modificar Proyecto">
              				<!--Fin Boton Submit-->


                    </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
