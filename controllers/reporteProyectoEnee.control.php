<?php
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");
  //libreria de php para poder generar QR code
  include_once("libs/phpqrcode/qrlib.php");

  function run(){
<<<<<<< HEAD
      renderizar("reporteProyectoEnee",array(),"layoutEneeAdmin.view.tpl");
=======
    $factibilidades = array();
    $aprobaciones= array();
    $despejes= array();
    $recepciones= array();
    if (isset($_POST["btnFechas"])) {
      $factibilidades = obtenerPlanosFactibilidad($_POST["txtFecha1"],$_POST["txtFecha2"]);
      $aprobaciones = obtenerPlanosAprobacion($_POST["txtFecha1"],$_POST["txtFecha2"]);
      $despejes = obtenerPlanosDespeje($_POST["txtFecha1"],$_POST["txtFecha2"]);
      $recepciones = obtenerPlanosRecepcion($_POST["txtFecha1"],$_POST["txtFecha2"]);
      renderizar("reporteProyectoCimeqh",array("factibilidades"=>$factibilidades,"despejes"=>$despejes,"recepciones"=>$recepciones,"aprobaciones"=>$aprobaciones));

    }
    $fecha1 = date('Y-m-d', strtotime('-1 week'));
    $fecha2 = time();
    $factibilidades = obtenerPlanosFactibilidad($fecha1,$fecha2);
    $aprobaciones = obtenerPlanosAprobacion($fecha1,$fecha2);
    $despejes = obtenerPlanosDespeje($fecha1,$fecha2);
    $recepciones = obtenerPlanosRecepcion($fecha1,$fecha2);

    renderizar("reporteProyectoCimeqh",array("factibilidades"=>$factibilidades,"despejes"=>$despejes,"recepciones"=>$recepciones,"aprobaciones"=>$aprobaciones));

>>>>>>> master
  }
  run();
?>
