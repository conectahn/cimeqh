<?php
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");
  //libreria de php para poder generar QR code
  include_once("libs/phpqrcode/qrlib.php");

  function run(){
      renderizar("reporteProyectoEnee",array(),"layoutEneeAdmin.view.tpl");
  }
  run();
?>
