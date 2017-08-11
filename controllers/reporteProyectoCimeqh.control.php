<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){
<<<<<<< HEAD
    if (isset($_POST["btnFechas"])) {
      $factibilidades = array();
      $factibilidades = obtenerPlanosFactibilidad($_POST["fecha1"],$_POST["fecha2"]);
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

>>>>>>> master
    }
    $fecha1 = date('Y-m-d', strtotime('-1 week'));
    $fecha2 = time();
    $factibilidades = obtenerPlanosFactibilidad($fecha1,$fecha2);
    $aprobaciones = obtenerPlanosAprobacion($fecha1,$fecha2);
    $despejes = obtenerPlanosDespeje($fecha1,$fecha2);
    $recepciones = obtenerPlanosRecepcion($fecha1,$fecha2);

    renderizar("reporteProyectoCimeqh",array("factibilidades"=>$factibilidades,"despejes"=>$despejes,"recepciones"=>$recepciones,"aprobaciones"=>$aprobaciones));


  }
  run();
?>
