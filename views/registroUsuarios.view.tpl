
<body class="nav-md">

  <div class="contenido">
    <div class="container body">
      <div class="main_container">
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_right">
          <h3>Registro de Usuarios</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                  <h2>Ingrese sus Datos Personales</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>

                    <form id="defaultForm"  class="form-horizontal form-label-left" method="post">

                         <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Numero Identidad *</label>
                                                      <input id="txtNumeroId" type="text" name="txtNumeroId" class="form-control" placeholder="Ej. 0801XXXXXXXXX *" maxlength="13" minlength="13">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Numero de Colegiacion *</label>
                                                      <input id="txtNumeroColegiacion" type="text" name="txtNumeroColegiacion" class="form-control" placeholder="Ej. XXXX-XXXX *">
                                                  </div>
                                              </div>
                                          </div>

                         <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Primer Nombre *</label>
                                                      <input id="txtPrimerNombre" type="text" name="txtPrimerNombre" class="form-control" placeholder="Ej. Juan *">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Segundo Nombre *</label>
                                                      <input id="txtSegundoNombre" type="text" name="txtSegundoNombre" class="form-control" placeholder="Ej. Luis *">
                                                  </div>
                                              </div>
                                          </div>

                         <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Primer Apellido *</label>
                                                      <input id="txtPrimerApellido" type="text" name="txtPrimerApellido" class="form-control" placeholder="Ej. Lopez *">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Segundo Apellido *</label>
                                                      <input id="txtSegundoApellido" type="text" name="txtSegundoApellido" class="form-control" placeholder="Ej. Paz *">
                                                  </div>
                                              </div>
                                          </div>

                         <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Numero de Celular *</label>
                                                      <input id="txtNumeroCelular" type="text" name="txtNumeroCelular" class="form-control" placeholder="Ej. 99XX-XXXX *" maxlength="8">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Numero de Telefono Fijo</label>
                                                      <input id="txtNumeroFijo" type="text" name="txtNumeroFijo" class="form-control" placeholder="Ej. 22XX-XXXX " maxlength="8">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Correo Electronico *</label>
                                                      <input id="txtCorreo" type="email" name="txtCorreo" class="form-control" placeholder="Escriba su correo ejemplo@ejemplo.com *">
                                                  </div>
                                              </div>
                                          </div>
<div class="ln_solid"></div>
                        <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label for="form_message">Dirección de residencia *</label>
                                                      <textarea id="txtDireccion" name="txtDireccion" class="form-control" placeholder="Ej. Colonia X bloque X casa numero xxx *" rows="4"></textarea>
                                                  </div>
                                              </div>
                                          </div>
<div class="ln_solid"></div>
                        <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_name">Contraseña *</label>
                                                      <input id="txtContrasena" type="password" name="txtContrasena" class="form-control" placeholder="Escriba una contraseña con 8 caracteres o mas con mayusculas y minusculas *">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="form_lastname">Confirme Contraseña *</label>
                                                      <input id="txtContrasenaConfirmacion" type="password" name="txtContrasenaConfirmacion" class="form-control" placeholder="Escriba una contraseña con 8 caracteres o mas con mayusculas y minusculas">
                                                  </div>
                                              </div>
                          </div>




<div class="ln_solid"></div>

<div class="form-group">
  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
    <button name="btnRegistroUsuarios" id="btnRegistroUsuarios" type="submit" class="btn btn-primary btn-lg">Registrar</button>
  </div>
</div>

                    </form>
          </div>
        </div>
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
          txtNumeroId: {
              message: 'Este usuario es inválido',
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
        txtPrimerNombre: {
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
      txtDireccion: {
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
          txtCorreo: {
              validators: {
                  notEmpty: {
                      message: 'El correo es un campo obligatorio no puede estar vacio.'
                  },
                  emailAddress: {
                      message: 'Formato de correo incorrecta.'
                  }
              }
          },
          txtNumeroCelular: {
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
          txtNumeroFijo: {
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
          },
          txtContrasena: {
              validators: {
                  notEmpty: {
                      message: 'Contraseña obligatoria no puede estar vacia.'
                  },
                  identical: {
                      field: 'txtContrasenaConfirmacion',
                      message: 'La contraseña y su confirmación no son los mismos'
                  }
              }
          },
          txtContrasenaConfirmacion: {
              validators: {
                  notEmpty: {
                      message: 'La contraseña de confirmación es obligatoria y no puede estar vacía'
                  },
                  identical: {
                      field: 'txtContrasena',
                      message: 'La contraseña y su confirmación no son los mismos'
                  }
              }
          },
      }
  });
});

</script>
