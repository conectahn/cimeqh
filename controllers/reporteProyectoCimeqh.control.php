<?php
  require_once("libs/template_engine.php");
  require_once("models/reportes.model.php");

  function run(){
    if (isset($_POST["btnFechas"])) {
      $factibilidades = array();
      $factibilidades = obtenerPlanosFactibilidad($_POST["txtFecha1"],$_POST["txtFecha2"]);
      print_r($factibilidades);
      //renderizar("reporteProyectoCimeqh",$factibilidades);

    }
    renderizar("reporteProyectoCimeqh",array());
  }
  run();
?>
