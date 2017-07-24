<?php

  require_once("libs/template_engine.php");

  require_once("models/proyectos.model.php");
  require_once("models/aprobacion.model.php");
  require_once("models/multiUpload.model.php");
  require_once("models/despeje.model.php");

  function run(){

  require 'pagar/lib/Stripe.php';
  $htmlDatos = array();
  $despeje = array( );
  $htmlDatos=array();

  if (isset($_GET["despejeId"])) {
    $despeje=obtenerUnDespeje($_GET["despejeId"]);
    $htmlDatos["solicitudDespejeCosto"]=$despeje["solicitudDespejeCosto"];
    $htmlDatos["solicitudDespejeId"]=$despeje["solicitudDespejeId"];
  }

  if ($_POST) {
        Stripe::setApiKey("sk_test_UDpydu1XVxuNRRRmOShf0iIl");

        try {
        if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['zip']))
            throw new Exception("Fill out all required fields.");
          if (!isset($_POST['stripeToken']))
            throw new Exception("The Stripe Token was not generated correctly");
          Stripe_Charge::create(array("amount" => ($_POST["solicitudDespejeCosto"]*100),
                                      "currency" => "hnl",
                                      "card" => $_POST['stripeToken'],
                      "description" => $_POST['email']));
                      pagarDespeje($_POST["solicitudDespejeId"],5);
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
  }

    renderizar("pagarDespeje",  $htmlDatos);
  }

  run();
?>
