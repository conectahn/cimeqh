<?php
  require_once("libs/template_engine.php");
  require_once("models/proyectos.model.php");
  require_once("models/aprobacion.model.php");
  require_once("models/multiUpload.model.php");
  require 'pagar/lib/Stripe.php';
  function run(){

  $errores = array();
  $htmlDatos = array();

  if ($_POST) {
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
                      <strong>Success!</strong> Your payment was successful.
              </div>';
              actualizarAprobacionEstado($_POST["respuesta"]);
        }
        catch (Exception $e) {
          borrarAprobacion($_POST["respuesta"]);
          $htmlDatos["error"]  = '<div class="alert alert-danger">
              <strong>Error!</strong> '.$e->getMessage().'
              </div>';
        }
    }
    renderizar("realizarPago",array());
  }
  run();
?>
