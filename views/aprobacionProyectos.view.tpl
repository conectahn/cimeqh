<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Aprobacion de Proyectos</h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
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
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>

                    <form action="index.php?page=pagos" id="defaultForm" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                      <input type="hidden" name="proyectoId" id="proyectoId" value="{{proyectoId}}">
                      <input type="hidden" name="aprobacionId" id="aprobacionId" value="{{aprobacionId}}">
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
                                                                       <label for="txtMonto">Monto Estimado del Proyecto</label>
                                                                       <input id="txtMonto" type="text" name="txtMonto" class="form-control">
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-6">
                                                                   <div class="form-group">
                                                                       <label for="txtTotalTimbres">Total de Timbres a Pagar</label>
                                                                       <input id="txtTotalTimbresTextBox" type="text" name="txtTotalTimbresTextBox" class="form-control" disabled="disabled">
                                                                       <input id="txtTotalTimbres" type="hidden" name="txtTotalTimbres" class="form-control">
                                                                   </div>
                                                               </div>


                                                           </div>


                                                           <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="userfile">Documento</label>
                                                                                        <input id="userfile" type="file" name="userfile[]" class="form-control"  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="userfile">Documento 2</label>
                                                                                        <input id="userfile" type="file" name="userfile[]" class="form-control" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="agregar-archivo">

                                                                                </div>
                                                                                <button type="button" id="btnAgregarArchivo" name="btnAgregarArchivo" class="btn btn-round btn-primary">Agregar Otro Archivo</button>
                                                                            </div>

              				<!--Boton Submit-->
              				<input type="submit" id="btnSolicitarAprobacion" name="btnSolicitarAprobacion" class="btn btn-default" value="Solicitar Aprobación">
              				<!--Fin Boton Submit-->


                    </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<script type="text/javascript">

$(document).ready(function() {
  $('#defaultForm').bootstrapValidator({
    message: 'This value is not valid',
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        txtMonto: {
          validators: {
              notEmpty: {
                  message: 'Campo obligatorio, no puede estar vacio.'
              },
              stringLength: {
                  min: 1,
                  max: 10000000000000,
                  message: 'Debe tener al menos un dígito.'
              },
              regexp: {
                  regexp: /\d+(\.\d{1,2})?/,
                  message: 'Solo se aceptan números.'
              }
          }
        },
      }
  });
});

var contadorImagenes=0;
/*Algoritmo que calcula el valor de los timbres a pagar*/
$("#txtMonto").on('input',function(e){
  var monto =$("#txtMonto").val();
  var cantidadAPagar=0;
  if (monto>=1 && monto<=100000) {
    cantidadAPagar=50;
  }else if (monto>100000 && monto<=250000) {
    cantidadAPagar=150;
  }else if (monto>250000 && monto<=500000) {
    cantidadAPagar=350;
  }else if (monto>500000 && monto<=1000000) {
    cantidadAPagar=700;
  }else if (monto>=1100000) {
    monto=monto-1000000;
    monto=parseInt(monto/100000);
    cantidadAPagar=(monto*30)+700;
    cantidadAPagar=parseInt(cantidadAPagar);
  }
  $("#txtTotalTimbres").val(cantidadAPagar);
  $("#txtTotalTimbresTextBox").val(cantidadAPagar);
});

/*Validación para no subir tantos archivos*/
$('#btnAgregarArchivo').click(function(){

  if (contadorImagenes>5) {
    alert("Ha alcanzado el límite máximo de archivos.");
  }else {
    $(".agregar-archivo").append("<div class='col-md-6'><div class='form-group'><label for='userfile'>Documento 2</label><input id='userfile' type='file' name='userfile[]' class='form-control' ></div></div>");
    contadorImagenes++;
  }
});
</script>
