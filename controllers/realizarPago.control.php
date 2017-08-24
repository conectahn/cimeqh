<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");
  require_once("models/pagos.model.php");
  require_once("models/aprobacion.model.php");

  function run(){


  require 'pagar/lib/Stripe.php';
  $errores = array();
  $htmlDatos = array();
  $facturas= array();

  if ($_POST) {

    switch ($_POST["accion"]) {/*
      case 'INS':
        $respuesta=registrarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["proyectoId"]);

        $files = $_FILES['userfile']['name'];

        //creamos una nueva instancia de la clase multiupload
        $upload = new Multiupload();
        //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
        $isUpload = $upload->upFiles($files,$respuesta,"aprobacion");
         //llamamos a la funcion upFiles y le pasamos el array de campos file del formulari
        if ($isUpload===FALSE) {
           borrarAprobacion($respuesta);
           $alerta=redirectWithMessage("Error al subir el archivo ","index.php?page=aprobacionProyectos");
        }else {
          $htmlDatos["txtMonto"]=$_POST["txtMonto"];
          $htmlDatos["txtTotalTimbres"]=$_POST["txtTotalTimbres"];
          $htmlDatos["proyectoId"]=$_POST["proyectoId"];
          $htmlDatos["respuesta"]=$respuesta;
         }
        break;

      case 'UPD':
        $respuesta=actualizarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["aprobacionId"]);

        $files = $_FILES['userfile']['name'];

        //creamos una nueva instancia de la clase multiupload
        $upload = new Multiupload();
        //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
        $isUpload = $upload->upFiles($files,$_POST["aprobacionId"],"aprobacion");
         //llamamos a la funcion upFiles y le pasamos el array de campos file del formulari

        $header="Location:index.php?page=aprobacionProyectos&respuesta=".$respuesta;
        header($header);

        break;
*/
        case 'PAY':
        Stripe::setApiKey("sk_test_cg3QY2mbcJvek1EVBopLsavG");

        try {
        if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['zip']))
            throw new Exception("Fill out all required fields.");
          if (!isset($_POST['stripeToken']))
            throw new Exception("The Stripe Token was not generated correctly");
          Stripe_Charge::create(array("amount" => ($_POST["txtTotalTimbres"]*100),
                                      "currency" => "hnl",
                                      "card" => $_POST['stripeToken'],
                      "description" => $_POST['email']));
            $htmlDatos["success"]  = '<div class="alert alert-success">
                      <strong>Exito!</strong> Su Pago ha sido Efectuado con Éxito
              </div>';
              $check=$_SESSION["facturaId"];
              $_SESSION["facturaId"]="";
                  foreach ($check as $key ) {
                    /*en este for each haremos los calculos respectivos, total a pagar, insertamos los
                    detalles de la factura a la tabla de costos, pasamos a pagado el estado de pago en la
                    tabla de factura y cambiamos de estado la aprobacion despeje etc dependiendo lo que
                    se este pagando*/
                    $facturas=obtenerFacturaPorId($key);
                    switch ($facturas["idConcepto"]) {
                      case '1':
                      //colegiatura
                        break;

                        case '2':
                        //aprobacion
                        pagarTimbre($key);
                        pagoFactura($key);
                          break;

                          case '3':
                        //Despeje
                            break;

                            case '4':
                        //Recepcion
                              break;

                              case '5':
                        //Factibilidad
                                break;

                                case '6':
                        //Otros Pagos
                                  break;
                      default:

                        break;
                    }
                  }

        }
        catch (Exception $e) {
          borrarAprobacion($_POST["respuesta"]);
          $htmlDatos["error"]  = '<div class="alert alert-danger">
              <strong>Error!</strong> '.$e->getMessage().'
              </div>';
        }
          break;
      default:
        # code...
        break;
    }

  }




    renderizar("realizarPago",   $htmlDatos, "layoutPago.view.tpl");
  }



  run();
?>
