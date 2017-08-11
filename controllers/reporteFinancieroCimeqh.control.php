<?php
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");
  //libreria de php para poder generar QR code
  include_once("libs/phpqrcode/qrlib.php");

  function run(){
  if (isset($_POST["btnFechas"])){
      $factibilidades = array();
      $fecha1='2017-05-26 13:23:55';
      $fecha2='2017-07-26 13:23:55';
      $factibilidades = obtenerIngresosCuotas($fecha1,$fecha2);
      renderizar("reporteFinancieroCimeqh",array("factibilidades"=>$factibilidades));
    }
      renderizar("reporteFinancieroCimeqh",array());
  }
  run();
?>
