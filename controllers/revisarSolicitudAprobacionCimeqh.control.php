<?php
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");
  require_once("models/usuarios.model.php");


  function run(){
    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        $revisar = array();
        $usuario = array();
        $error="";
        switch ($_SESSION["rol"]) {

          case '1':
          //Agregar un comentario segun sea aprobada o rechazada la solicitud
            if (isset($_POST["btnComentarAprobacion"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],3);
            }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],1);
            }
            }

            $revisar=verSolicitudesAprobacionAdminCimeqh();
            //$documentos=verSolicitudesArchivos($revisar[""]);
            renderizar("revisarSolicitudAprobacionCimeqh",array('solicitud'=>$revisar),"layoutCimeqh.view.tpl");
            break;

            case '3':
            if (isset($_POST["btnComentarAprobacion"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],3);
            }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],1);
            }
            }
            $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
            $revisar=verSolicitudesAprobacionRegCimeqh($usuarios["usuarioRegion"]);
            //$documentos=verSolicitudesArchivos($revisar[""]);
            renderizar("revisarSolicitudAprobacionCimeqh",array('solicitud'=>$revisar),"layoutCimeqhAprobacion.view.tpl");
              break;

          default:
            redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
            break;
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
