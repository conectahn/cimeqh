<?php
  require_once("libs/template_engine.php");
  require_once("models/recepcion.model.php");
  require_once("models/usuarios.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        switch ($_SESSION["rol"]) {
          case '1':
          $revisar = array();
          if(isset($_POST["btnAceptar"])){
            $respuesta="";
            $numeroId="";
            $estadoCuenta=1;
            $numeroId=$_POST["usuarioIdentidad"];
            $respuesta=actualizarEstado($numeroId,$estadoCuenta);
            echo $respuesta;
          }

          if (isset($_POST["btnComentarRecepcion"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],1);
          }
          }

          if (isset($_POST["btnComentarFactibilidad"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],1);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],2);
          }
          }


          $revisar=obtenerSolicitudRecepcionAdmin();
          renderizar("revisarSolicitudRecepcionCimeqh",array('solicitud'=>$revisar),"layoutCimeqh.view.tpl");
            break;

            case '3':
            if(isset($_POST["btnRechazar"])){

              $numeroId="";
              $estadoCuenta=2;
              $numeroId=$_POST["usuarioIdentidad"];
              actualizarEstado($numeroId,$estadoCuenta);
              }

            if(isset($_POST["btnAceptar"])){
              $respuesta="";
              $numeroId="";
              $estadoCuenta=1;
              $numeroId=$_POST["usuarioIdentidad"];
              $respuesta=actualizarEstado($numeroId,$estadoCuenta);
              echo $respuesta;
            }

            if (isset($_POST["btnComentarFactibilidad"])) {
              if ($_POST["tipo"]=="rechazo") {
              agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["txtcomentario"],3);
            }elseif ($_POST["tipo"]=="aceptado") {
              agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["txtcomentario"],1);
            }
            }

            $usuario=obtenerUsuariosPorId($_SESSION["userName"]);
            $revisar=obtenerSolicitudRecepcionENEEReg($usuario["usuarioRegion"],1);
            renderizar("revisarSolicitudRecepcionCimeqh",array('solicitud'=>$revisar),"layoutCimeqhAprobacion.view.tpl");
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
