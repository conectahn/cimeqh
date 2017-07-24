<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");
  require_once("models/proyectos.model.php");
  require_once("models/aprobacion.model.php");
  require_once("models/multiUpload.model.php");
  require_once("models/recepcion.model.php");


  function run(){


  require 'pagar/lib/Stripe.php';
  $errores = array();
  $htmlDatos = array();

  if (isset($_POST["btnPagarAprobacion"])) {

  }

  if ($_POST) {

    switch ($_POST["accion"]) {
      case 'INS':
      $respuesta=registrarRecepcion($_POST["solicitudAprobacionId"]);

      $files = $_FILES['userfile']['name'];

      //creamos una nueva instancia de la clase multiupload
     $upload = new Multiupload();
      //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
      $isUpload = $upload->upFiles($files,$respuesta,"recepcion");
       //llamamos a la funcion upFiles y le pasamos el array de campos file del formulari
      if ($isUpload===FALSE) {
         borrarRecepcion($respuesta);
         $alerta=redirectWithMessage("Error al subir el archivo ","index.php?page=recepcionProyectos");
      }else {
        $htmlDatos["solicitudAprobacionId"]=$_POST["solicitudAprobacionId"];
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

        case 'PAY':
        Stripe::setApiKey("sk_test_UDpydu1XVxuNRRRmOShf0iIl");

        try {
        if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['zip']))
            throw new Exception("Fill out all required fields.");
          if (!isset($_POST['stripeToken']))
            throw new Exception("The Stripe Token was not generated correctly");
          Stripe_Charge::create(array("amount" => (305*100),
                                      "currency" => "hnl",
                                      "card" => $_POST['stripeToken'],
                      "description" => $_POST['email']));
            $htmlDatos["success"]  = '<div class="alert alert-success">
                      <strong>Success!</strong> Your payment was successful.
              </div>';
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


    renderizar("pagarRecepcion",  $htmlDatos);
  }



  run();
?>
