<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){
  $ingresos = array();

  if (isset($_POST["btnFechas"])){
    if ($_POST["txtFecha1"]!=null && $_POST["txtFecha2"]=!null) {
      $factibilidades = array();
      $fecha1=$_POST["txtFecha1"];
      $fecha2=$_POST["txtFecha2"];
      $factibilidades = obtenerIngresosCuotas($fecha1,$fecha2);
      renderizar("reporteFinancieroCimeqh",array("factibilidades"=>$factibilidades));
    }
    }
///1231321321321
        $fecha1 = date('Y-m-d', strtotime('-1 week'));
        $fecha2 = time();
        $ingresos = obtenerIngresos($fecha1,$fecha2);
        renderizar("reporteFinancieroCimeqh",array("ingresos"=>$ingresos));
  }
  run();
?>
