<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){

    if (isset($_POST["btnFechas"]))
    {
      $fecha1 = $_POST["txtFecha1"]." 00:00:00";
      $fecha2 = $_POST["txtFecha2"] . " 23:59:59";
      $factibilidades = obtenerDisenosFactibilidad($fecha1,$fecha2);
      //$aprobaciones = obtenerPlanosAprobacion($fecha1,$fecha2);
      //$despejes = obtenerPlanosDespeje($fecha1,$fecha2);
      //$recepciones = obtenerPlanosRecepcion($fecha1,$fecha2);
      renderizar("reporteProyectoCimeqh",array("factibilidades"=>$factibilidades));

    }
    else {
      $fecha1 = date('Y-m-d', strtotime('-1 week'));
      $fecha2 = date('Y-m-d');
      $factibilidades = obtenerDisenosFactibilidad($fecha1,$fecha2);
      //$aprobaciones = obtenerPlanosAprobacion($fecha1,$fecha2);
      //$despejes = obtenerPlanosDespeje($fecha1,$fecha2);
      //$recepciones = obtenerPlanosRecepcion($fecha1,$fecha2);

      renderizar("reporteProyectoCimeqh",array("factibilidades"=>$factibilidades));
    }
  }

  run();
?>
