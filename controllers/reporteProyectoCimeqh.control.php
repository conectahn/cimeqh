<?php
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");
  //libreria de php para poder generar QR code
  include_once("libs/phpqrcode/qrlib.php");

  function run(){
    if (isset($_POST["btnFechas"]) {
      $factibilidades = array();
      $factibilidades = obtenerPlanosFactibilidad($_POST["fecha1"],$_POST["fecha2"]);
    }
      renderizar("reporteProyectoCimeqh",array());
  }
  run();
?>
