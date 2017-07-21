<?php
  require_once("libs/template_engine.php");
  require_once("models/factibilidad.model.php");
  require_once("models/usuarios.model.php");
  require_once("models/multiUpload.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        $revisar = array();
        $usuarios = array();
        switch ($_SESSION["rol"]) {

#######################################################################
//En caso de que el usuario de la enee sea supervisor entrara en esta
//case rol=2 significa enee supervisor
#######################################################################

          case '2':
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
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {

            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],2);

            $files = $_FILES['userfile']['name'];

            //creamos una nueva instancia de la clase multiupload
            $upload = new Multiupload();
            //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
            $isUpload = $upload->upFiles($files,$_POST["factibilidadId"],"factibilidad");
          }
          }


          $revisar=verSolicitudesFactbilidadEnee();
          renderizar("revisarSolicitudFactibilidadEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");
            break;

#######################################################################
//En caso de que el usuario de la enee sea supervisor entrara en esta
//case rol=2 significa enee supervisor
#######################################################################

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

          //Agregar un comentario segun sea aprobada o rechazada la solicitud

            if (isset($_POST["btnComentarFactibilidad"])) {
              if ($_POST["tipo"]=="rechazo") {
              agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],3);
            }elseif ($_POST["tipo"]=="aceptado") {

              agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],2);

              $files = $_FILES['userfile']['name'];

              //creamos una nueva instancia de la clase multiupload
              $upload = new Multiupload();
              //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
              $isUpload = $upload->upFiles($files,$_POST["factibilidadId"],"factibilidad");
            }
            }

            $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
            $revisar=verSolicitudesFactbilidadEneeSup($usuarios["usuarioRegion"]);
            renderizar("revisarSolicitudFactibilidadEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");

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

              if (isset($_POST["btnComentarFactibilidad"])) {
                if ($_POST["tipo"]=="rechazo") {
                agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],3);
              }elseif ($_POST["tipo"]=="aceptado") {

                agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],2);

                $files = $_FILES['userfile']['name'];

                //creamos una nueva instancia de la clase multiupload
                $upload = new Multiupload();
                //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
                $isUpload = $upload->upFiles($files,$_POST["factibilidadId"],"factibilidad");
              }
              }

              $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
              $revisar=verSolicitudesFactbilidadEneeSup($usuarios["usuarioRegion"]);
              $revisar=verSolicitudesFactbilidadEnee();
              renderizar("revisarSolicitudFactibilidadEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");
              break;

          default:
            redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
            break;
        }

        /*if ($_SESSION["rol"]==2) {
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
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],3);
          }elseif ($_POST["tipo"]=="aceptado") {

            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],2);

            $files = $_FILES['userfile']['name'];

            //creamos una nueva instancia de la clase multiupload
            $upload = new Multiupload();
            //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
            $isUpload = $upload->upFiles($files,$_POST["factibilidadId"],"factibilidad");
          }
          }


          $revisar=verSolicitudesFactbilidadEnee();
          renderizar("revisarSolicitudFactibilidadEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");

        }aqui termina el if
        else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }*/
      }else if ($_SESSION["estado"]==4) {
          redirectWithMessage("Su cuenta todavia no ha sido verificada por el CIMEQH.","?page=login");
      }elseif ($_SESSION["estado"]==3) {
        redirectWithMessage("Su cuenta ha sido supendida por: ".$_SESSION["comentario"],"?page=login");
      }
    }else {
      mw_redirectToLogin("page=login");
    }


  }
  run();
?>
