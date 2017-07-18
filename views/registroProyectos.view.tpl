<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Formulario de Registro de Proyectos</h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
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
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>

                    <form id="defaultForm" action="index.php?page=registroProyectos" data-parsley-validate class="form-horizontal form-label-left" method="post">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Propietario del Proyecto<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtPropietarioNombre" name='txtPropietarioNombre' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de Identidad del Propietario<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtIdentidadPropietario" name='txtIdentidadPropietario' required="required" class="form-control col-md-7 col-xs-12" maxlength="13">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Direccion del Propietario<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtDireccionPropietario" name='txtDireccionPropietario' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo Electronico del Propietaro<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="txtEmailPropietario" name='txtEmailPropietario' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono del Propietario<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtTelefonoPropietario" name='txtTelefonoPropietario' required="required" class="form-control col-md-7 col-xs-12" maxlength="8">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Celular del Propietario<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtCelularPropietario" name='txtCelularPropietario' required="required" class="form-control col-md-7 col-xs-12" maxlength="8">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Proyecto<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtNombreProyecto" name='txtNombreProyecto' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >UTM Este<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtUtmEste" name='txtUtmEste' required="required" class="form-control col-md-7 col-xs-12" placeholder="Coordenadas">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >UTM Norte<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtUtmNorte" name='txtUtmNorte' required="required" class="form-control col-md-7 col-xs-12" placeholder="Coordenadas">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Zona UTM<span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtUtmZona" name='txtUtmZona' required="required" class="form-control col-md-7 col-xs-12" placeholder="Coordenadas">
                        </div>
                      </div>
                      <div class="form-group">
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripcion del Proyecto <span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtDescripcionProyecto" name="txtDescripcionProyecto" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione el Departamento del Proyecto</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="cmbProyectoDepartamento" id="cmbDepartamentoProyecto">
                            {{foreach departamentos}}
                              <option value="{{departamentoId}}">{{departamentoDescripcion}}</option>
                            {{endfor departamentos}}
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Zona del Proyecto</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="cmbRegion" id="cmbRegion">
                              <option value="1">Seleccione Zona del proyecto</option>
                              <option value="2">Centro Sur Distrito Ciudad</option>
                              <option value="3">Centro Sur Area Regional</option>
                              <option value="4">Nor Occidente Distrito Ciudad</option>
                              <option value="5">Nor Occidente Area Regional</option>
                              <option value="6">Litoral Atlantico Distrito Ciudad</option>
                              <option value="7">Litoral Atlantico Area Regional</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione el Tipo del Proyecto</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="cmbProyectoTipo" id="cmbProyectoTipo">
                            {{foreach tipos}}
                              <option value="{{tipoId}}">{{tipoDescrpcion}}</option>
                            {{endfor tipos}}
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección del Proyecto <span class="required">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtDireccionProyecto" name="txtDireccionProyecto" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" name="btnRegistrarProyecto" id="btnRegistrarProyecto" class="btn btn-success" value="Registrar Proyecto">
                        </div>
                      </div>
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
          txtIdentidadPropietario: {
              message: 'Este número de identidad es inválido',
              validators: {
                  notEmpty: {
                      message: 'Campo obligatorio, no puede estar vacio.'
                  },
                  stringLength: {
                      min: 13,
                      max: 13,
                      message: 'El número de identidad debe de tener 13 dígitos.'
                  },
                  regexp: {
                      regexp: /^[0-9]*$/,
                      message: 'Solo se aceptan números.'
                  }
              }
          },
          txtUtmEste: {
            validators: {
                notEmpty: {
                    message: 'Campo obligatorio, no puede estar vacio.'
                },
                stringLength: {
                    min: 1,
                    max: 1000000,
                    message: 'El campo no puede ser 0.'
                },
                regexp: {
                    regexp: /^[0-9.0-9]*$/,
                    message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
                }
            }
        },
        txtUtmNorte: {
          validators: {
              notEmpty: {
                  message: 'Campo obligatorio, no puede estar vacio.'
              },
              stringLength: {
                  min: 1,
                  max: 1000000,
                  message: 'El campo no puede ser 0.'
              },
              regexp: {
                  regexp: /^[0-9.0-9]*$/,
                  message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
              }
          }
      },
        txtUtmZona: {
          validators: {
              notEmpty: {
                  message: 'Campo obligatorio, no puede estar vacio.'
              },
              stringLength: {
                  min: 1,
                  max: 1000000,
                  message: 'El campo no puede ser 0.'
              },
              regexp: {
                  regexp: /^[0-9 A-Z]*$/,
                  message: 'El formato de la coordenada es incorrecto.'
              }
          }
      },
          txtNumeroColegiacion: {
            validators: {
                notEmpty: {
                    message: 'Campo obligatorio, no puede estar vacio.'
                },
                stringLength: {
                    min: 1,
                    max: 1000000,
                    message: 'El campo no puede ser 0.'
                },
                regexp: {
                    regexp: /^[1-9][0-9]*$/,
                    message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
                }
            }
        },
        txtPropietarioNombre: {
          validators: {
              notEmpty: {
                  message: 'Campo obligatorio, no puede estar vacio.'
              },
              stringLength: {
                  min: 3,
                  max: 100,
                  message: 'El nombre debe tener al menos 3 letras.'
              },
              regexp: {
                  regexp: /^[a-zA-Z\s]*$/,
                  message: 'Solo se aceptan letras.'
              }
          }
      },
      txtNombreProyecto: {
        validators: {
            notEmpty: {
                message: 'Campo obligatorio, no puede estar vacio.'
            },
            stringLength: {
                min: 3,
                max: 100,
                message: 'El nombre debe tener al menos 3 letras.'
            },
            regexp: {
                regexp: /^[a-zA-Z\s]*$/,
                message: 'Solo se aceptan letras.'
            }
        }
    },
      txtDireccionPropietario: {
        validators: {
            notEmpty: {
                message: 'Campo obligatorio, no puede estar vacio.'
            },
            stringLength: {
                min: 5,
                max: 300,
                message: 'La dirección debe ser más especifica.'
            }
        }
    },
    txtDireccionProyecto: {
      validators: {
          notEmpty: {
              message: 'Campo obligatorio, no puede estar vacio.'
          },
          stringLength: {
              min: 5,
              max: 300,
              message: 'La dirección debe ser más especifica.'
          }
      }
  },
    txtDescripcionProyecto: {
      validators: {
          notEmpty: {
              message: 'Campo obligatorio, no puede estar vacio.'
          },
          stringLength: {
              min: 5,
              max: 300,
              message: 'La dirección debe ser más especifica.'
          }
      }
  },
      txtSegundoNombre: {
        validators: {
            notEmpty: {
                message: 'Campo obligatorio, no puede estar vacio.'
            },
            stringLength: {
                min: 3,
                max: 30,
                message: 'El nombre debe tener al menos 3 letras.'
            },
            regexp: {
                regexp: /^[a-zA-Z]+$/,
                message: 'Solo se aceptan letras.'
            }
        }
    },
    txtPrimerApellido: {
      validators: {
          notEmpty: {
              message: 'Campo obligatorio, no puede estar vacio.'
          },
          stringLength: {
              min: 3,
              max: 30,
              message: 'El nombre debe tener al menos 3 letras.'
          },
          regexp: {
              regexp: /^[a-zA-Z]+$/,
              message: 'Solo se aceptan letras.'
          }
      }
  },
  txtSegundoApellido: {
    validators: {
        notEmpty: {
            message: 'Campo obligatorio, no puede estar vacio.'
        },
        stringLength: {
            min: 3,
            max: 30,
            message: 'El nombre debe tener al menos 3 letras.'
        },
        regexp: {
            regexp: /^[a-zA-Z]+$/,
            message: 'Solo se aceptan letras.'
        }
    }
},
          txtEmailPropietario: {
              validators: {
                  notEmpty: {
                      message: 'El correo es un campo obligatorio no puede estar vacio.'
                  },
                  emailAddress: {
                      message: 'Formato de correo incorrecta.'
                  }
              }
          },
          txtCelularPropietario: {
            validators: {
                notEmpty: {
                    message: 'Campo obligatorio, no puede estar vacio.'
                },
                stringLength: {
                    min: 8,
                    max: 8,
                    message: 'El número de celular debe tener 8 dígitos.'
                },
                regexp: {
                    regexp: /^[1-9][0-9]*$/,
                    message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
                }
            }
          },
          txtTelefonoPropietario: {
            validators: {
                stringLength: {
                    min: 8,
                    max: 8,
                    message: 'El número de celular debe tener 8 dígitos.'
                },
                regexp: {
                    regexp: /^[1-9][0-9]*$/,
                    message: 'Solo se aceptan números y el primer dígito no puede ser 0.'
                }
            }
          }
      }
  });
});

</script>
