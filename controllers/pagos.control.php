<?php
  require_once("libs/template_engine.php");
  require_once("models/pagos.model.php");
  $pagos = array();
  $check  = "";

if(isset($_POST['btnPagar'])){
$check=$_POST['check'];
  foreach ($check as $key ) {
  echo $key."<br>";
  }
  echo "<script>alert('hola')</script>";
}


/*
  if(isset($_POST["btnPagar"])){
  echo '<script>alert("el checkbox ha sido seleccionado")</script>';
  $check= $_POST['check'];
  foreach ($chek as $che) {
  echo $che."<br>";
  }
  echo '<script>alert("hola amigos")</script>';
  }
  */
  function run(){
    $pagos=obtenerPagosPendientes($_SESSION["userName"]);
    renderizar("pagos", array('pagos'=>$pagos));
  }
  run();
?>
