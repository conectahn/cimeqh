<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Solicitud de Despeje</h3>
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
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                  <h2>Datos del Proyecto</h2>
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
                  <br>

                  <form action="index.php?page=solicitudDespeje" id="defaultForm" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                      <input type="hidden" name="solicitudAprobacionId" id="solicitudAprobacionId" value="{{solicitudAprobacionId}}">
                      <input type="hidden" name="accion" id="accion" value="{{accion}}">
                      <input type="hidden" name="despejeId" id="despejeId" value="{{despejeId}}">
                         <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="txtAprobacion">Código de Aprobación de la ENEE</label>
                                   <input id="txtAprobacion" type="text" name="txtAprobacion" class="form-control" placeholder="" value="{{codigoAprobacion}}" disabled="disabled">
                               </div>
                           </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtTiempo">Tiempo que ocupara tener la red sin energía *</label>
                                                      <input id="txtTiempo" type="text" name="txtTiempo" class="form-control" placeholder="Tiempo que ocupara tener la red sin energía *">
                                                  </div>
                                              </div>
                                          </div>
                         <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtCuadrillas">Cuadrillas *</label>
                                                      <input id="txtCuadrillas" type="text" name="txtCuadrillas" class="form-control" placeholder="Cuadrillas y cantidad de personal a laborar *">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="txtCantidadPersonal">Cantidad de Personal a laborar *</label>
                                                      <input id="txtCantidadPersonal" type="number" name="txtCantidadPersonal" class="form-control" placeholder="N° de identidad del propietario *">
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

                                            <div class="col-md-3">
                                                <div class="form-group">
                                            <div class="input-group date">
                                              <label for="txtFecha">Fecha del Despeje</label>
                                              <input type="text" id="txtFecha" name="txtFecha" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                          </div>
                                             </div>
                                             </div>
                    <input type="submit" id="btnSolicitarDespeje" name="btnSolicitarDespeje" class="btn btn-default" value="Solicitar Despeje">
                    </form>
        </div>
      </div>
    </div>
</div>
</div>
<script type="text/javascript">
var date = new Date();
date.setDate(date.getDate());
$('#txtFecha').datepicker({
    startDate: date,
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: "yy/mm/dd"
});

$(document).ready(function() {


  $('#defaultForm').bootstrapValidator({
    message: 'This value is not valid',
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
          txtTiempo: {
            validators: {
                notEmpty: {
                    message: 'Campo obligatorio, no puede estar vacio.'
                },
                stringLength: {
                    min: 1,
                    max: 1000000000,
                    message: 'Debe tener al menos un dígito.'
                },
                regexp: {
                    regexp: /^[1-9][0-9]*$/,
                    message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
                }
            }
          },
          txtCuadrillas: {
            validators: {
                notEmpty: {
                    message: 'Campo obligatorio, no puede estar vacio.'
                },
                stringLength: {
                    min: 1,
                    max: 10000000,
                    message: 'Debe tener al menos un dígito.'
                },
                regexp: {
                    regexp: /^[1-9][0-9]*$/,
                    message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
                }
            }
          },
          txtCantidadPersonal: {
            validators: {
                notEmpty: {
                    message: 'Campo obligatorio, no puede estar vacio.'
                },
                stringLength: {
                    min: 1,
                    max: 1000000000000,
                    message: 'Debe tener al menos un dígito.'
                },
                regexp: {
                    regexp: /^[1-9][0-9]*$/,
                    message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
                }
            }
          },
          txtFecha: {
            validators: {
                notEmpty: {
                    message: 'Campo obligatorio, no puede estar vacio.'
                }
            }
          },
      }
  });
});

</script>
