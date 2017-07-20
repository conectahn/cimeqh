<?php

  require_once("libs/template_engine.php");

  require_once("models/proyectos.model.php");
  require_once("models/aprobacion.model.php");
  require_once("models/multiUpload.model.php");
  require_once("models/despeje.model.php");

  function run(){
    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==4) {
          $respuesta="";
          $htmlDatos = array( );
          $fecha="";

          if (isset($_POST["btnSolicitarDespeje"])) {

            switch ($_POST["accion"]) {
              case 'INS':
                $respuesta=registrarDespeje($_POST["txtTiempo"],$_POST["txtCuadrillas"],$_POST["txtCantidadPersonal"],$_POST["txtFecha"],$_POST["solicitudAprobacionId"]);
                $respuesta=$_POST["txtFecha"];
                $header="Location:index.php?page=solicitudDespeje&respuesta=".$respuesta;
                header($header);
                break;

              case 'UPD':
                $respuesta=actualizarDespeje($_POST["txtTiempo"],$_POST["txtCuadrillas"],$_POST["txtCantidadPersonal"],$_POST["txtFecha"],$_POST["despejeId"]);

                $header="Location:index.php?page=solicitudDespeje&respuesta=".$respuesta;
                header($header);
                break;

              default:
                # code...
                break;
            }
            redirectWithMessage("La solicitud de despeje se realizo con exito.","?page=verMisSolicitudesDeDespeje");


          }
          echo $fecha;

          if(isset($_GET["proyectoId"])){

            $proyectos=obtnerAprobacionPorId($_GET["proyectoId"]);
            if($proyectos){
              if (isset($_GET["accion"])) {
                $htmlDatos["accion"] = $_GET["accion"];
              }
              if (isset($_GET["despejeId"])) {
                $htmlDatos["despejeId"] = $_GET["despejeId"];
              }
              $htmlDatos["proyectoId"] = $proyectos["proyectoId"];
              $htmlDatos["proyectoNombre"] = $proyectos["proyectoNombre"];
              $htmlDatos["departamentoNombre"] = $proyectos["departamentoDescripcion"];
              $htmlDatos["proyectoDireccion"] = $proyectos["proyectoDireccion"];
              $htmlDatos["proyectoDescrpcion"] = $proyectos["proyectoDescrpcion"];
              $htmlDatos["proyectoLatitud"] = $proyectos["proyectoLatitud"];
              $htmlDatos["proyectoLongitud"] = $proyectos["proyectoLongitud"];
              $htmlDatos["proyectoEmailPropietario"] = $proyectos["proyectoEmailPropietario"];
              $htmlDatos["proyectoNombrePropietario"] = $proyectos["proyectoNombrePropietario"];
              $htmlDatos["proyectoIdentidadPropietario"] = $proyectos["proyectoIdentidadPropietario"];
              $htmlDatos["proyectoCelularPropietario"] = $proyectos["proyectoCelularPropietario"];
              $htmlDatos["proyectoDireccionPropietario"] = $proyectos["proyectoDireccionPropietario"];
              $htmlDatos["proyectoTelefonoPropietario"] = $proyectos["proyectoTelefonoPropietario"];
              $htmlDatos["codigoAprobacion"] = $proyectos["codigoAprobacion"];
              $htmlDatos["solicitudAprobacionId"] = $proyectos["solicitudAprobacionId"];
              }
            }

          renderizar("solicitudDespeje",  $htmlDatos);
        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }
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
