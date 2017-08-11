<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){

        $ingresos = array();
        if (isset($_POST["btnFechas"])) {
          $ingresos = obtenerIngresos($_POST["txtFecha1"],$_POST["txtFecha2"]);
          renderizar("reporteFinancieroCimeqh",array("ingresos"=>$ingresos));

        }
        $fecha1 = date('Y-m-d', strtotime('-1 week'));
        $fecha2 = time();
        $ingresos = obtenerIngresos($fecha1,$fecha2);

        renderizar("reporteFinancieroCimeqh",array("ingresos"=>$ingresos));


  }
  run();
?>
