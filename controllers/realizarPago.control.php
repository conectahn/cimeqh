<?php
  require_once("libs/template_engine.php");
  require_once("models/proyectos.model.php");
  require_once("models/aprobacion.model.php");
  require_once("models/multiUpload.model.php");
  require 'pagar/lib/Stripe.php';
  function run(){

  $htmlDatos = array();
  
if ($_POST) {
  Stripe::setApiKey("sk_test_cg3QY2mbcJvek1EVBopLsavG");
  $htmlDatos["error"] = '';
  $htmlDatos["success"] = '';
  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");
    Stripe_Charge::create(array("amount" => 1000,
                                "currency" => "usd",
                                "card" => $_POST['stripeToken']));
    $htmlDatos["success"] = 'Your payment was successful.';
  }
  catch (Exception $e) {
    $htmlDatos["error"] = $e->getMessage();
  }
}
    renderizar("realizarPago",$htmlDatos);
  }
  run();
?>
