<?php
require_once("libs/template_engine.php");
require_once("models/pagos.model.php");
require_once("models/aprobacion.model.php");

function run(){
$pagos = array();
$check  = array();
$datos=array();
$respuesta;
$totalPagar=0;
//Revismos si selecciono el boton de pagar
if(isset($_POST['btnPagar'])){
  //si lo presiono revisamos si paso un dato para pagar
  if (isset($_POST["check"])) {
    //si selecciono al menos un valor pasamos a pasar cada uno de los datos que se envian a un arreglo
    $check=$_POST["check"];
        foreach ($check as $key ) {
          /*en este for each haremos los calculos respectivos, total a pagar, insertamos los
          detalles de la factura a la tabla de costos, pasamos a pagado el estado de pago en la
          tabla de factura y cambiamos de estado la aprobacion despeje etc dependiendo lo que
          se este pagando*/

        //echo $key."<br>";
        $pagos=obtenerFacturaPorId($key);
        $totalPagar+=$pagos["montoPagado"];
        }        
        $pagos["totalPagar"]=$totalPagar;
        $pagos["facturas"]=$check;
        //renderizar("realizarPago", array('total'=>$totalPagar));
        renderizar("realizarPago", $pagos);
  }else{
    //en caso que presiono el boton
    //sin seleccionar al menos una casilla le mostrara el siguiente mensaje
    redirectWithMessage("Favor seleccione por lo menos una opcion a pagar.","index.php?page=pagos");
  }
}else {
  //finalmente en caso que no se haya presionado el boton mostrar
  //la pantalla cargada con los pagos pendiente
  $pagos=obtenerPagosPendientes($_SESSION["userName"]);
  renderizar("pagos", array('pagos'=>$pagos));
}
  }

  run();
  ?>
