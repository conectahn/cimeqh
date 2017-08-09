<?php
  require_once("libs/template_engine.php");
  require_once("models/factibilidad.model.php");
  require_once("models/usuarios.model.php");


  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        $revisar = array();
        $usuario = array();

        switch ($_SESSION["rol"]) {
          #######################################################################
          //En caso de que el usuario de el CIMEQH sea supervisor entrara en esta
          //case rol=1 significa CIMEQH supervisor
          #######################################################################
          case '1':
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

          if (isset($_POST["btnComentarFactibilidad"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["txtcomentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["txtcomentario"],1);
          }
          }


          $revisar=verSolicitudesFactbilidadAdminCimeqh();
          renderizar("revisarSolicitudFactibilidadCimeqh",array('solicitud'=>$revisar),"layoutCimeqh.view.tpl");
          break;

          #######################################################################
          //En caso de que el usuario de el CIMEQH sea de revision entrara en esta
          //case rol=2 significa CIMEQH de revision o CIMEQH limitado
          #######################################################################

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

          //Agregar un comentario segun sea aprobada o rechazada la solicitud

            if (isset($_POST["btnComentarFactibilidad"])) {
              if ($_POST["tipo"]=="rechazo") {
              agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["txtcomentario"],3);
            }elseif ($_POST["tipo"]=="aceptado") {
              agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["txtcomentario"],1);
            }
            }

            $usuario=obtenerUsuariosPorId($_SESSION["userName"]);
            $revisar=verSolicitudesFactbilidadRegCimeqh($usuario["usuarioRegion"]);
            renderizar("revisarSolicitudFactibilidadCimeqh",array('solicitud'=>$revisar),"layoutCimeqhAprobacion.view.tpl");
            break;

            default:
            redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta página.","?page=login");
            break;
        }


/*
        if ($_SESSION["rol"]==1) {
          $revisar = array();

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

          if (isset($_POST["btnComentarFactibilidad"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["txtcomentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["txtcomentario"],1);
          }
          }


          $revisar=verSolicitudesFactbilidad();
          renderizar("revisarSolicitudFactibilidadCimeqh",array('solicitud'=>$revisar),"layoutCimeqh.view.tpl");

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
