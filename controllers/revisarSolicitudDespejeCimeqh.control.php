<?php
  require_once("libs/template_engine.php");
  require_once("models/despeje.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        $revisar = array();
#######################################################################################
/*
rol 1= cimeqh admin
rol 3= cimeqh normal
*/
#######################################################################################

  switch ($_SESSION["rol"]) {
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

    if (isset($_POST["btnComentarDespeje"])) {
    if ($_POST["tipo"]=="rechazo") {
      agregarComentarioDespeje($_POST["codigoProyecto"],$_POST["comentario"],3);
    }elseif ($_POST["tipo"]=="aceptado") {
      agregarComentarioDespeje($_POST["codigoProyecto"],$_POST["comentario"],1);
    }
    }

    $revisar=verSolicitudesDespeje();
    renderizar("revisarSolicitudDespejeCimeqh",array('solicitud'=>$revisar),"layoutCimeqh.view.tpl");
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

    //Agregar un comentario segun sea aprobada o rechazada la solicitud

      if (isset($_POST["btnComentarDespeje"])) {
      if ($_POST["tipo"]=="rechazo") {
        agregarComentarioDespeje($_POST["codigoProyecto"],$_POST["comentario"],3);
      }elseif ($_POST["tipo"]=="aceptado") {
        agregarComentarioDespeje($_POST["codigoProyecto"],$_POST["comentario"],1);
      }
      }

      $revisar=verSolicitudesDespeje();
      renderizar("revisarSolicitudDespejeCimeqh",array('solicitud'=>$revisar),"layoutCimeqhAprobacion.view.tpl");
      break;

    default:
    redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
      break;
  }
  /*
        if ($_SESSION["rol"]==1) {

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

          if (isset($_POST["btnComentarDespeje"])) {
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioDespeje($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioDespeje($_POST["codigoProyecto"],$_POST["comentario"],1);
          }
          }

          $revisar=verSolicitudesDespeje();
          renderizar("revisarSolicitudDespejeCimeqh",array('solicitud'=>$revisar),"layoutCimeqh.view.tpl");

        }
        else {
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
