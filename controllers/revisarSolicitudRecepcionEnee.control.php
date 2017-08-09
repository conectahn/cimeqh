<?php
  require_once("libs/template_engine.php");
  require_once("models/recepcion.model.php");
  require_once("models/usuarios.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        $revisar = array();
        switch ($_SESSION["rol"]) {
          case '2':
          if (isset($_POST["btnComentarRecepcion"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],2);
          }
          }


          $revisar=obtenerSolicitudRecepcionENEEAdmin();
          renderizar("revisarSolicitudRecepcionEnee",array('solicitud'=>$revisar),"layoutEneeAdmin.view.tpl");
            break;

            case '5':
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


            if (isset($_POST["btnComentarRecepcion"])) {
              if ($_POST["tipo"]=="rechazo") {
              agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],3);
            }elseif ($_POST["tipo"]=="aceptado") {

              agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],5);
            }
            }
            $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
            $revisar=obtenerSolicitudRecepcionENEERegSupervisor($usuarios["usuarioRegion"]);
            renderizar("revisarSolicitudRecepcionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");

              break;
              case '6':
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

              //Agregar un comentario segun sea aprobada o rechazada la solicitud

              if (isset($_POST["btnComentarRecepcion"])) {
                if ($_POST["tipo"]=="rechazo") {
                agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],3);
              }elseif ($_POST["tipo"]=="aceptado") {

                agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],2);
              }
              }
              $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
              $revisar=obtenerSolicitudRecepcionENEERegAprobacion($usuarios["usuarioRegion"]);
              renderizar("revisarSolicitudRecepcionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");
              break;

          default:
            redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
            break;
        }
      //  if ($_SESSION["rol"]==2) {


        //Agregar un comentario segun sea aprobada o rechazada la solicitud

        /*  if (isset($_POST["btnComentarRecepcion"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioRecepcion($_POST["codigoProyecto"],$_POST["comentario"],2);
          }
          }


          //$revisar=obtenerSolicitudRecepcion();
        //  renderizar("revisarSolicitudRecepcionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");

        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }*/
      }else {
      redirectWithMessage("Su cuenta todavia no ha sido verificada por el CIMEQH.","?page=login");
      }
    }else {
      mw_redirectToLogin("page=login");
    }


  }
  run();
?>
