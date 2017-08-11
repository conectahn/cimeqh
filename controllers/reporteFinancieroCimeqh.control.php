<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){
<<<<<<< HEAD
  if (isset($_POST["btnFechas"])){
      $factibilidades = array();
      $fecha1='2017-05-26 13:23:55';
      $fecha2='2017-07-26 13:23:55';
      $factibilidades = obtenerIngresosCuotas($fecha1,$fecha2);
      renderizar("reporteFinancieroCimeqh",array("factibilidades"=>$factibilidades));
    }
      renderizar("reporteFinancieroCimeqh",array());
=======

        $ingresos = array();
        if (isset($_POST["btnFechas"])) {
          $ingresos = obtenerIngresos($_POST["txtFecha1"],$_POST["txtFecha2"]);
          renderizar("reporteFinancieroCimeqh",array("ingresos"=>$ingresos));

        }
        $fecha1 = date('Y-m-d', strtotime('-1 week'));
        $fecha2 = time();
        $ingresos = obtenerIngresos($fecha1,$fecha2);

        renderizar("reporteFinancieroCimeqh",array("ingresos"=>$ingresos));


>>>>>>> master
  }
  run();
?>
