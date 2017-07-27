<?php
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");
  require_once("models/usuarios.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        $revisar = array();
        $usuarios = array();
        $error="";

switch ($_SESSION["rol"]) {
#############################################################################################
/*
en caso que sea enee admin
*/
#############################################################################################
  case '2':
  //Agregar un comentario segun sea aprobada o rechazada la solicitud

    if (isset($_POST["btnComentarAprobacion"])) {
      if ($_POST["tipo"]=="rechazo") {
      $error=agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],3);
    }elseif ($_POST["tipo"]=="aceptado") {
      agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],2);
    }
    }


    $revisar=verSolicitudesAprobacionEneeAdmin();
    //$documentos=verSolicitudesArchivos($revisar[""]);
    renderizar("revisarSolicitudAprobacionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");
    break;
    #############################################################################################
    /*
    en caso que sea enee revision
    */
    #############################################################################################
  case '5':
  //Agregar un comentario segun sea aprobada o rechazada la solicitud

    if (isset($_POST["btnComentarAprobacion"])) {
      if ($_POST["tipo"]=="rechazo") {
      $error=agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],3);
    }elseif ($_POST["tipo"]=="aceptado") {
      agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],5);
    }
    }

    $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
    $revisar=verSolicitudesAprobacionEneeRegRevision($usuarios["usuarioRegion"]);
    //$documentos=verSolicitudesArchivos($revisar[""]);
    renderizar("revisarSolicitudAprobacionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");
    break;
    #############################################################################################
    /*
    en caso que sea enee aprobacion
    */
    #############################################################################################
  case '6':
  if (isset($_POST["btnComentarAprobacion"])) {
    if ($_POST["tipo"]=="rechazo") {
    $error=agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],3);
  }elseif ($_POST["tipo"]=="aceptado") {
    agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],2);
  }
  }

  $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
  $revisar=verSolicitudesAprobacionEneeRegAprobacion($usuarios["usuarioRegion"]);
  //$documentos=verSolicitudesArchivos($revisar[""]);
  renderizar("revisarSolicitudAprobacionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");
    break;

  default:
    redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta página.","?page=login");
    break;
}

        /*
      if (/*$_SESSION["rol"]==2*//*true) {
          $revisar = array();
          $error="";
        //Agregar un comentario segun sea aprobada o rechazada la solicitud

          if (isset($_POST["btnComentarAprobacion"])) {
            if ($_POST["tipo"]=="rechazo") {
            $error=agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {
            agregarComentarioAprobacion($_POST["codigoProyecto"],$_POST["comentario"],2);
          }
          }


          $revisar=verSolicitudesAprobacionEnee();
          //$documentos=verSolicitudesArchivos($revisar[""]);
          renderizar("revisarSolicitudAprobacionEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");
        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta página.","?page=login");
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
