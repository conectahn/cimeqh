<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){

    if (isset($_POST["btnFechas"])) {
      $fecha1 = $_POST["txtFecha1"]. " 00:00:00";
      $fecha2 = $_POST["txtFecha2"] . " 23:59:59";
      $factibilidades = obtenerIngresos($fecha1,$fecha2);
      $grafica=graficarCimeqhFinanzas($fecha1,$fecha2);
      renderizar("reporteFinancieroCimeqh",array("factibilidades"=>$factibilidades, "grafica"=>$grafica));

    }else {
      $fecha1 = date('Y-m-d', strtotime('-1 week'));
      $fecha2 = date('Y-m-d', strtotime('+1 day'));      
      $factibilidades = obtenerIngresos($fecha1,$fecha2);
      $grafica=graficarCimeqhFinanzas($fecha1,$fecha2);
      renderizar("reporteFinancieroCimeqh",array("factibilidades"=>$factibilidades,"grafica"=>$grafica));
    }
  }

  run();
?>
