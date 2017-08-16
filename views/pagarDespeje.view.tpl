<div class="right_col" role="main">



    <div class="container">

      <style type="text/css">
      .col-centered {
          display:inline-block;
          float:none;
          text-align:left;
          margin-right:-4px;
      }
      .row-centered {
      	margin-left: 9px;
      	margin-right: 9px;
      }
      </style>
      <script type="text/javascript">
      $(document).ready(function() {
          $('#payment-form').bootstrapValidator({
              message: 'This value is not valid',
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
      		submitHandler: function(validator, form, submitButton) {
                          Stripe.card.createToken({
                              number: $('.card-number').val(),
                              cvc: $('.card-cvc').val(),
                              exp_month: $('.card-expiry-month').val(),
                              exp_year: $('.card-expiry-year').val(),
      			name: $('.card-holder-name').val(),
      			address_line1: $('.address').val(),
      			address_city: $('.city').val(),
      			address_zip: $('.zip').val(),
      			address_state: $('.state').val(),
      			address_country: $('.country').val()
                          }, stripeResponseHandler);
                          return false;
              },
              fields: {
                  street: {
                      validators: {
                          notEmpty: {
                              message: 'The street is required and cannot be empty'
                          },
      					stringLength: {
                              min: 6,
                              max: 96,
                              message: 'The street must be more than 6 and less than 96 characters long'
                          }
                      }
                  },
                  city: {
                      validators: {
                          notEmpty: {
                              message: 'The city is required and cannot be empty'
                          }
                      }
                  },
      			zip: {
                      validators: {
                          notEmpty: {
                              message: 'The zip is required and cannot be empty'
                          },
      					stringLength: {
                              min: 3,
                              max: 9,
                              message: 'The zip must be more than 3 and less than 9 characters long'
                          }
                      }
                  },
                  email: {
                      validators: {
                          notEmpty: {
                              message: 'The email address is required and can\'t be empty'
                          },
                          emailAddress: {
                              message: 'The input is not a valid email address'
                          },
      					stringLength: {
                              min: 6,
                              max: 65,
                              message: 'The email must be more than 6 and less than 65 characters long'
                          }
                      }
                  },
      			cardholdername: {
                      validators: {
                          notEmpty: {
                              message: 'The card holder name is required and can\'t be empty'
                          },
      					stringLength: {
                              min: 6,
                              max: 70,
                              message: 'The card holder name must be more than 6 and less than 70 characters long'
                          }
                      }
                  },
      			cardnumber: {
      		selector: '#cardnumber',
                      validators: {
                          notEmpty: {
                              message: 'The credit card number is required and can\'t be empty'
                          },
      					creditCard: {
      						message: 'The credit card number is invalid'
      					},
                      }
                  },
      			expMonth: {
                      selector: '[data-stripe="exp-month"]',
                      validators: {
                          notEmpty: {
                              message: 'The expiration month is required'
                          },
                          digits: {
                              message: 'The expiration month can contain digits only'
                          },
                          callback: {
                              message: 'Expired',
                              callback: function(value, validator) {
                                  value = parseInt(value, 10);
                                  var year         = validator.getFieldElements('expYear').val(),
                                      currentMonth = new Date().getMonth() + 1,
                                      currentYear  = new Date().getFullYear();
                                  if (value < 0 || value > 12) {
                                      return false;
                                  }
                                  if (year == '') {
                                      return true;
                                  }
                                  year = parseInt(year, 10);
                                  if (year > currentYear || (year == currentYear && value > currentMonth)) {
                                      validator.updateStatus('expYear', 'VALID');
                                      return true;
                                  } else {
                                      return false;
                                  }
                              }
                          }
                      }
                  },
                  expYear: {
                      selector: '[data-stripe="exp-year"]',
                      validators: {
                          notEmpty: {
                              message: 'The expiration year is required'
                          },
                          digits: {
                              message: 'The expiration year can contain digits only'
                          },
                          callback: {
                              message: 'Expired',
                              callback: function(value, validator) {
                                  value = parseInt(value, 10);
                                  var month        = validator.getFieldElements('expMonth').val(),
                                      currentMonth = new Date().getMonth() + 1,
                                      currentYear  = new Date().getFullYear();
                                  if (value < currentYear || value > currentYear + 100) {
                                      return false;
                                  }
                                  if (month == '') {
                                      return false;
                                  }
                                  month = parseInt(month, 10);
                                  if (value > currentYear || (value == currentYear && month > currentMonth)) {
                                      validator.updateStatus('expMonth', 'VALID');
                                      return true;
                                  } else {
                                      return false;
                                  }
                              }
                          }
                      }
                  },
      			cvv: {
      		selector: '#cvv',
                      validators: {
                          notEmpty: {
                              message: 'The cvv is required and can\'t be empty'
                          },
      					cvv: {
                              message: 'The value is not a valid CVV',
                              creditCardField: 'cardnumber'
                          }
                      }
                  },
              }
          });
      });
      </script>
      <script type="text/javascript">

                  Stripe.setPublishableKey('pk_test_pNSNeMvq6cUCWFj7BcJUYltG');

                  function stripeResponseHandler(status, response) {
                      if (response.error) {

                          $('.submit-button').removeAttr("disabled");

      					document.getElementById('a_x200').style.display = 'block';

                          $(".payment-errors").html(response.error.message);
                      } else {
                          var form$ = $("#payment-form");

                          var token = response['id'];

                          form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");

                          form$.get(0).submit();
                      }
                  }


      </script>
      <h1>{{respuesta}}</h1>
      <form action="index.php?page=pagarDespeje" method="POST" id="payment-form" class="form-horizontal">
        <input type="hidden" name="solicitudDespejeId" value="{{solicitudDespejeId}}">
        <input type="hidden" name="solicitudDespejeCosto" value="{{solicitudDespejeCosto}}">
        <input type="hidden" name="accion" value="PAY">
        <div class="row row-centered">
        <div class="col-md-4 col-md-offset-4">
        <div class="page-header">
          <h2 class="gdfg">Formulario de Pago Seguro</h2>
        </div>
        <noscript>
        <div class="bs-callout bs-callout-danger">
          <h4>JavaScript is not enabled!</h4>
          <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
        </div>
        </noscript>

        <div class="alert alert-danger" id="a_x200" style="display: none;"> <strong>Error!</strong> <span class="payment-errors"></span> </div>
        <span class="payment-success">
        {{success}}
        {{error}}
        </span>
        <fieldset>

        <!-- Form Name -->
        <legend>Detalles de Facturación</legend>

        <!-- Street -->
        <div class="form-group">
          <label class="col-sm-4 control-label" for="textinput">Calle</label>
          <div class="col-sm-6">
            <input type="text" name="street" placeholder="Calle" class="address form-control">
          </div>
        </div>

        <!-- City -->
        <div class="form-group">
          <label class="col-sm-4 control-label" for="textinput">Ciudad</label>
          <div class="col-sm-6">
            <input type="text" name="city" placeholder="Ciudad" class="city form-control">
          </div>
        </div>

        <!-- State -->
        <div class="form-group">
          <label class="col-sm-4 control-label" for="textinput">Estado/Departamemto</label>
          <div class="col-sm-6">
            <input type="text" name="state" maxlength="65" placeholder="Estado/Departamemto" class="state form-control">
          </div>
        </div>

        <!-- Postcal Code -->
        <div class="form-group">
          <label class="col-sm-4 control-label" for="textinput">Código Postal</label>
          <div class="col-sm-6">
            <input type="text" name="zip" maxlength="9" placeholder="Código Postal" class="zip form-control">
          </div>
        </div>

        <!-- Country -->
        <div class="form-group">
          <label class="col-sm-4 control-label" for="textinput">País</label>
          <div class="col-sm-6">
            <!--input type="text" name="country" placeholder="Country" class="country form-control"-->
            <div class="country bfh-selectbox bfh-countries" name="country" placeholder="Seleccion su País" data-flags="true" data-filter="true"> </div>
          </div>
        </div>

        <!-- Email -->
        <div class="form-group">
          <label class="col-sm-4 control-label" for="textinput">Email</label>
          <div class="col-sm-6">
            <input type="text" name="email" maxlength="65" placeholder="Email" class="email form-control">
          </div>
        </div>
        </fieldset>
        <fieldset>
          <legend>Detalles de la Tarjeta</legend>

          <!-- Card Holder Name -->
          <div class="form-group">
            <label class="col-sm-4 control-label"  for="textinput">Nombre del Tarjetahabiente</label>
            <div class="col-sm-6">
              <input type="text" name="cardholdername" maxlength="70" placeholder="Nombre del Tarjetahabiente" class="card-holder-name form-control">
            </div>
          </div>

          <!-- Card Number -->
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">Número de Tarjeta</label>
            <div class="col-sm-6">
              <input type="text" id="cardnumber" maxlength="19" placeholder="Número de Tarjeta" class="card-number form-control">
            </div>
          </div>

          <!-- Expiry-->
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">Fecha de Expiración de la Tarjeta</label>
            <div class="col-sm-6">
              <div class="form-inline">
                <select name="select2" data-stripe="exp-month" class="card-expiry-month stripe-sensitive required form-control">
                  <option value="01" selected="selected">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
                <span> / </span>
                <select name="select2" data-stripe="exp-year" class="card-expiry-year stripe-sensitive required form-control">
                </select>
                <script type="text/javascript">
                  var select = $(".card-expiry-year"),
                  year = new Date().getFullYear();

                  for (var i = 0; i < 12; i++) {
                      select.append($("<option value='"+(i + year)+"' "+(i === 0 ? "selected" : "")+">"+(i + year)+"</option>"))
                  }
              </script>
              </div>
            </div>
          </div>

          <!-- CVV -->
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">CVV/CVV2</label>
            <div class="col-sm-3">
              <input type="text" id="cvv" placeholder="CVV" maxlength="4" class="card-cvc form-control">
            </div>
          </div>

          <!-- Important notice -->
          <div class="form-group">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Factura</h3>
            </div>
            <div class="panel-body">
              <p>Su tarjeta será cargadacon la cantidad de {{solicitudDespejeCosto}} Lps. después de enviar este formulario.</p>
              <p>El valor a pagar es por motivo del despeje de energía indicado por la ENEE:
                <!--XXXXXXX--> </p>
            </div>
          </div>

          <!-- Submit -->
          <div class="control-group">
            <div class="controls">
              <center>
                <button class="btn btn-success" name="btnPagarAprobacion" id="btnPagarAprobacion" type="submit">Pagar Ahora</button>
              </center>
            </div>
          </div>
        </fieldset>
      </form>
      </body>
      </html>

  </div>

</div>
