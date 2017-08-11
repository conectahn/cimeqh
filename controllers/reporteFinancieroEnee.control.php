<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){
<<<<<<< HEAD
    $fecha1="";
    $fecha2="";
    $factibilidad= array();

    $fecha1=date('Y-m-d', strtotime('-1 week'));
    $fecha2=time();

    $factibilidad=obtenerDisenosFactibilidad($fecha1,$fecha2);

    renderizar("reporteFinancieroEnee",array('factibilidad'=>$factibilidad),"layoutEneeAdmin.view.tpl");
=======
    $ingresos = array();
    if (isset($_POST["btnFechas"])) {
      $ingresos = obtenerIngresosCuotas($_POST["txtFecha1"],$_POST["txtFecha2"]);
      renderizar("reporteFinancieroEnne",array("ingresos"=>$ingresos));

    }
    $fecha1 = date('Y-m-d', strtotime('-1 week'));
    $fecha2 = time();
    $ingresos = obtenerIngresosCuotas($fecha1,$fecha2);

    renderizar("reporteFinancieroEnne",array("ingresos"=>$ingresos));
>>>>>>> master
  }
  run();
?>
