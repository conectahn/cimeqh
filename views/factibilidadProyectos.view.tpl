<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Factibilidad de Proyectos</h3>
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

                    <form action="index.php?page=factibilidadProyectos" id="defaultForm" data-parsley-validate class="form-horizontal form-label-left" method="post">
                      <input type="hidden" name="proyectoId" id="proyectoId" value="{{proyectoId}}">
                      <input type="hidden" name="accion" id="accion" value="{{accion}}">

              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtProyectoNombre">Nombre del proyecto *</label>
                                                      <input type="text" id="txtProyectoNombre"class="form-control" name="txtProyectoNombre" value="{{proyectoNombre}}" disabled="disabled">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Departamento *</label>
                                                      <input type="text" id="txtproyectoDepartamento"class="form-control" name="txtproyectoDepartamento" value="{{departamentoNombre}}" disabled="disabled">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Dirección Exacta del Proyecto *</label>
                                                      <input id="form_name" type="text" name="name" class="form-control"  value="{{proyectoDireccion}}" disabled="disabled">
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                               <div class="form-group">
                                                   <label for="form_message">Descripcion del Proyecto *</label>
                                                   <textarea id="form_message" name="message" class="form-control" disabled="disabled" rows="4">{{proyectoDescrpcion}}</textarea>
                                               </div>
                                           </div>
                                          </div>

                                          <h4>Coordenadas</h4>

                                          <div class="row">
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              <label for="form_name">Latitud *</label>
                                                                              <input id="form_name" type="text" name="name" class="form-control" value="{{proyectoLatitud}}" disabled="disabled">
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <div class="form-group">
                                                                              <label for="form_lastname">Longitud *</label>
                                                                              <input id="form_lastname" type="text" name="surname" class="form-control" value="{{proyectoLongitud}}" disabled="disabled">
                                                                          </div>
                                                                      </div>
                                          </div>

              					 <h4>Datos Propietario</h4></br>
              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Propietario *</label>
                                                      <input id="form_name" type="text" name="name" class="form-control" value="{{proyectoNombrePropietario}}" disabled="disabled">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Numero de Identidad del Propietario *</label>
                                                      <input id="form_lastname" type="text" name="surname" class="form-control" value="{{proyectoIdentidadPropietario}}" disabled="disabled">
                                                  </div>
                                              </div>
                                          </div>

              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Telefono Propietario *</label>
                                                      <input id="form_name" type="text" name="name" class="form-control" value="{{proyectoTelefonoPropietario}}" disabled="disabled">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Celular Propietario *</label>
                                                      <input id="form_lastname" type="text" name="surname" class="form-control" value="{{proyectoCelularPropietario}}" disabled="disabled">
                                                  </div>
                                              </div>
                                          </div>

              					 <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Email Propietario *</label>
                                                      <input id="form_name" type="text" name="name" class="form-control"value="{{proyectoEmailPropietario}}" disabled="disabled">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Dirección Propietario *</label>
                                                      <input id="form_lastname" type="text" name="surname" class="form-control" value="{{proyectoDireccionPropietario}}" disabled="disabled">
                                                  </div>
                                              </div>
                                          </div>


              													<div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="cmbVoltaje">Voltaje *</label>
                                                      <select ng-model="datos.departamento" name="cmbVoltaje" id="cmbVoltaje"  class="form-control margin ng-pristine ng-valid ui-corner-all formularios ng-touched">
                                                      {{foreach voltajes}}
                                                        <option value="{{voltajeId}}">{{voltajeDescripcion}}</option>
                                                      {{endfor voltajes}}
              																				</select>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="cmbConexion">Tipo de Conexión *</label>
                                                      <select ng-model="datos.conexiones" name="cmbConexion" id="cmbConexion" class="form-control margin ng-pristine ng-valid ui-corner-all formularios ng-touched">                                                      
                                                      {{foreach conexiones}}
                                                        <option value="{{conexionId}}">{{conexionDescripcion}}</option>
                                                      {{endfor conexiones}}
              																				</select>
                                                  </div>
                                              </div>
              													</div>

              		<div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtPotencia">Potencia Demandada KW *</label>
                                                      <input id="txtPotencia" type="text" name="txtPotencia"  class="form-control" placeholder="Potencia Demandada KW *">
                                                  </div>
                                              </div>
              																<div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtCrecimientoEsperado">Crecimiento Futuro Esperado en % *</label>
                                                      <input type="text" name="txtCrecimientoEsperado" id="txtCrecimientoEsperado" class="form-control" placeholder="Crecimiento Futuro Esperado en % *">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtKva">KVA a Instalar</label>
                                                      <input type="text" id="txtKva" name="txtKva" id="txtCrecimientoEsperado" class="form-control" placeholder="KVA a Instalar *">
                                                  </div>
                                              </div>
              		</div>


              			<div class="row">

                                          </div>


              				<!--Boton Submit-->
              				<input type="submit" id="btnSolicitarFactibilidad" name="btnSolicitarFactibilidad"class="btn btn-default" value="Solicitar Factibilidad">
              				<!--Fin Boton Submit-->


                    </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
