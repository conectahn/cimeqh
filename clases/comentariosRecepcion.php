<?php
require_once("libs/dao.php");
require_once('models/recepcion.model.php');

class vistaComentariosRecepcion
{

  public static function vista($tipo,$codigo,$proyectoNombre,$depto,$direccion,
  $descripcion,$nombrePropietario,$nombreIngeniero,$numeroColeg){

  $vista="<div class='right_col' role='main'>
        <div class=''>
          <div class='page-title'>
            <div class='title_left'>
              <h3>Agregar Comentarios</h3>
            </div>
            <div class='title_right'>
              <div class='col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search'>
                <div class='input-group'>
                  <input type='text' class='form-control' placeholder='Search for...'>
                  <span class='input-group-btn'>
                    <button class='btn btn-default' type='button'>Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class='clearfix'></div>
          <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                      <h2>Datos del Usuario</h2>
                      <ul class='nav navbar-right panel_toolbox'>
                        <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                        </li>
                        <li class='dropdown'>
                          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='#'>Settings 1</a>
                            </li>
                            <li><a href='#'>Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class='close-link'><i class='fa fa-close'></i></a>
                        </li>
                      </ul>
                      <div class='clearfix'></div>
                    </div>
                    <div class='x_content'>
                      <br>

                        <form method='post' action='index.php?page=revisarSolicitudRecepcionCimeqh' id='defaultForm' data-parsley-validate class='form-horizontal form-label-left'>

                             <div class='row'>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='txtProyectoNombre'>Nombre del Proyecto *</label>
                                                          <input type='text' id='txtUs'class='form-control' name='txtUs' value='".$proyectoNombre."' disabled='disabled'>
                                                          <input type='hidden' id='codigoProyecto'class='form-control' name='codigoProyecto' value='".$codigo."'>
                                                          <input type='hidden' id='tipo'class='form-control' name='tipo' value='".$tipo."'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_lastname'>Departamento *</label>
                                                          <input type='text' id='departamento'class='form-control' name='departamento' value='".$depto."' disabled='disabled'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Direccion del Proyecto *</label>
                                                          <input id='direccion' type='text' name='direccion' class='form-control'  value='".$direccion."' disabled='disabled'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Descripcion del Proyecto *</label>
                                                          <input id='descripcionProyecto' type='text' name='descripcionProyecto' class='form-control'  value='".$descripcion."' disabled='disabled'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Nombre del Propietario *</label>
                                                          <input id='nombrePripietario' type='text' name='nombrePropietario' class='form-control'  value='".$nombrePropietario."' disabled='disabled'>
                                                      </div>
                                                  </div>

                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Nombre del Ingeniero *</label>
                                                          <input id='nombreIngeniero' type='text' name='nombreIngeniero' class='form-control'  value='".$nombreIngeniero."' disabled='disabled'>
                                                      </div>
                                                  </div>

                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Numero de Colegiación *</label>
                                                          <input id='numeroColeg' type='text' name='numeroColeg' class='form-control'  value='".$numeroColeg."' disabled='disabled'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-12'>
                                                   <div class='form-group'>
                                                       <label for='form_message'>Comentarios *</label>
                                                       <textarea id='comentario' placeholder='Describa Porque ha sido rechazado/aprobado el proyecto' name='comentario' class='form-control' rows='4'></textarea>
                                                   </div>
                                               </div>
                          <div class='col-md-12'>
                          <!--Boton Submit-->
                          <button type='submit' id='btnComentarRecepcion' name='btnComentarRecepcion' class='btn btn-default'>
                            Actualizar
                          </button>
                          <!--Fin Boton Submit-->
                      </div>
                </form>
              </div>
          </div>
        </div>
    </div>
    </div>

    <script type='text/javascript'>

    $(document).ready(function() {
      $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              comentario: {
                  validators: {
                      notEmpty: {
                          message: 'Campo obligatorio, no puede estar vacio.'
                      },
                      stringLength: {
                          min: 2,
                          max: 600,
                          message: 'El comentario debe de tener minimo 2 dígitos.'
                      },
                  }
              },
          }
      });
    });

    </script>
";

      return $vista;
  }

  public static function vistaEnee($tipo,$codigo,$proyectoNombre,$depto,$direccion,
  $descripcion,$nombrePropietario,$nombreIngeniero,$numeroColeg){

  $vista="<div class='right_col' role='main'>
        <div class=''>
          <div class='page-title'>
            <div class='title_left'>
              <h3>Agregar Comentarios</h3>
            </div>
            <div class='title_right'>
              <div class='col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search'>
                <div class='input-group'>
                  <input type='text' class='form-control' placeholder='Search for...'>
                  <span class='input-group-btn'>
                    <button class='btn btn-default' type='button'>Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class='clearfix'></div>
          <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                      <h2>Datos del Usuario</h2>
                      <ul class='nav navbar-right panel_toolbox'>
                        <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                        </li>
                        <li class='dropdown'>
                          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='#'>Settings 1</a>
                            </li>
                            <li><a href='#'>Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class='close-link'><i class='fa fa-close'></i></a>
                        </li>
                      </ul>
                      <div class='clearfix'></div>
                    </div>
                    <div class='x_content'>
                      <br>

                        <form method='post' action='index.php?page=revisarSolicitudRecepcionEnee' id='defaultForm' data-parsley-validate class='form-horizontal form-label-left'>


                             <div class='row'>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='txtProyectoNombre'>Nombre del Proyecto *</label>
                                                          <input type='text' id='txtUs'class='form-control' name='txtUs' value='".$proyectoNombre."' disabled='disabled'>
                                                          <input type='hidden' id='codigoProyecto'class='form-control' name='codigoProyecto' value='".$codigo."'>
                                                          <input type='hidden' id='tipo'class='form-control' name='tipo' value='".$tipo."'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_lastname'>Departamento *</label>
                                                          <input type='text' id='departamento'class='form-control' name='departamento' value='".$depto."' disabled='disabled'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Direccion del Proyecto *</label>
                                                          <input id='direccion' type='text' name='direccion' class='form-control'  value='".$direccion."' disabled='disabled'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Descripcion del Proyecto *</label>
                                                          <input id='descripcionProyecto' type='text' name='descripcionProyecto' class='form-control'  value='".$descripcion."' disabled='disabled'>
                                                      </div>
                                                  </div>
                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Nombre del Propietario *</label>
                                                          <input id='nombrePripietario' type='text' name='nombrePropietario' class='form-control'  value='".$nombrePropietario."' disabled='disabled'>
                                                      </div>
                                                  </div>

                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Nombre del Ingeniero *</label>
                                                          <input id='nombreIngeniero' type='text' name='nombreIngeniero' class='form-control'  value='".$nombreIngeniero."' disabled='disabled'>
                                                      </div>
                                                  </div>

                                                  <div class='col-md-6'>
                                                      <div class='form-group'>
                                                          <label for='form_name'>Numero de Colegiación *</label>
                                                          <input id='numeroColeg' type='text' name='numeroColeg' class='form-control'  value='".$numeroColeg."' disabled='disabled'>
                                                      </div>
                                                  </div>

                                                  <div class='col-md-12'>
                                                   <div class='form-group'>
                                                       <label for='form_message'>Comentarios *</label>
                                                       <textarea id='comentario' placeholder='Describa Porque ha sido rechazado/aprobado el proyecto' name='comentario' class='form-control' rows='4'></textarea>
                                                   </div>
                                               </div>
                          <div class='col-md-12'>
                          <!--Boton Submit-->
                          <button type='submit' id='btnComentarRecepcion' name='btnComentarRecepcion' class='btn btn-default'>
                            Actualizar
                          </button>
                          <!--Fin Boton Submit-->
                      </div>
                </form>
              </div>

          </div>
        </div>
    </div>
    </div>


        <script type='text/javascript'>

        $(document).ready(function() {
          $('#defaultForm').bootstrapValidator({
            message: 'This value is not valid',
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                  comentario: {
                      validators: {
                          notEmpty: {
                              message: 'Campo obligatorio, no puede estar vacio.'
                          },
                          stringLength: {
                              min: 2,
                              max: 600,
                              message: 'El comentario debe de tener minimo 2 dígitos.'
                          },
                      }
                  },
              }
          });
        });

        </script>
";

      return $vista;
  }
      }
?>
