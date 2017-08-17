<?php
require_once("libs/template_engine.php");
require_once("models/pagos.model.php");
require_once("models/aprobacion.model.php");
function run(){
$pagos = array();
$check  = array();
$respuesta;

if(isset($_POST['btnPagar'])){

$check=$_POST["check"];
  foreach ($check as $key ) {
  echo $key."<br>";
  }
  echo "<script>alert('hola')</script>";
}

//$numeroFactua,$usuarioId,$concepto,$monto,$proyectoId
if(isset($_POST['btnSolicitarAprobacion'])){
  //Generar Numero de Factura primero se genera un numero aleatorio
  $rand_num = rand(10000,99999);
  //codigo para crear un codigo alfanumerico
  $numeroFactua = base_convert($rand_num, 10, 36).base_convert(getLastInserId(), 10, 36);
  $estado=2;
  agregarFactura($numeroFactua,$_SESSION["userName"],$estado,$_POST["txtTotalTimbres"],$_POST["proyectoId"]);
  registrarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["proyectoId"],$_SESSION["userName"]);
}

    $pagos=obtenerPagosPendientes($_SESSION["userName"]);
    renderizar("pagos", array('pagos'=>$pagos));
  }


  run();
  ?>
