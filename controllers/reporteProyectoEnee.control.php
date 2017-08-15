<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){

    if (isset($_POST["btnFechas"]))
    {
      $fecha1 = $_POST["txtFecha1"]." 00:00:00";
      $fecha2 = $_POST["txtFecha2"] . " 23:59:59";
      $factibilidades = obtenerDisenosFactibilidad($fecha1,$fecha2);
      $aprobaciones = obtenerDisenosAprobacion($fecha1,$fecha2);
      $despejes = obtenerDisenosDespeje($fecha1,$fecha2);
      $recepciones = obtenerDisenosRecepcion($fecha1,$fecha2);
      renderizar("reporteproyectoEnee",array("factibilidades"=>$factibilidades,"despejes"=>$despejes,"recepciones"=>$recepciones,"aprobaciones"=>$aprobaciones));

    }
    else {
      $fecha1 = date('Y-m-d', strtotime('-1 week'));
      $fecha2 = date('Y-m-d') . " 23:59:59";
      //$factibilidades = obtenerDisenosFactibilidad($fecha1,$fecha2);
      $aprobaciones = obtenerDisenosAprobacion($fecha1,$fecha2);
      $despejes = obtenerDisenosDespeje($fecha1,$fecha2);
      $recepciones = obtenerDisenosRecepcion($fecha1,$fecha2);
      renderizar("reporteproyectoEnee",array("factibilidades"=>$factibilidades,"despejes"=>$despejes,"recepciones"=>$recepciones,"aprobaciones"=>$aprobaciones));

      } 
  }

  run();
?>
