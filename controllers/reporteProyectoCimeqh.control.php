<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){

    $factibilidades = array();
    if (isset($_POST["btnFechas"])) {
      $factibilidades = obtenerPlanosFactibilidad($_POST["txtFecha1"],$_POST["txtFecha2"]);

      renderizar("reporteProyectoCimeqh",array("factibilidades"=>$factibilidades));

    }
    $fecha1 = date('Y-m-d', strtotime('-1 week'));
    $fecha2 = time();
    $factibilidades = obtenerPlanosFactibilidad($fecha1,$fecha2);

    renderizar("reporteProyectoCimeqh",array("factibilidades"=>$factibilidades));


  }
  run();
?>
