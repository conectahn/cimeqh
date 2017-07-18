<?php
  require_once("libs/template_engine.php");
  require_once("models/recepcion.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==2) {
          $revisar = array();
                
        //Agregar un comentario segun sea aprobada o rechazada la solicitud

          if (isset($_POST["btnComentarRecepcion"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],2);
          }
          }


          $revisar=obtenerSolicitudRecepcion();
          renderizar("revisarSolicitudRecepcionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");

        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }
      }else {
      redirectWithMessage("Su cuenta todavia no ha sido verificada por el CIMEQH.","?page=login");
      }
    }else {
      mw_redirectToLogin("page=login");
    }


  }
  run();
?>
