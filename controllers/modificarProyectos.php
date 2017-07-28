<?php

  require_once("libs/template_engine.php");

  require_once("models/factibilidad.model.php");
    require_once("models/proyectos.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==4 || $_SESSION["rol"]==1) {
          $proyectos = array();
          $htmlDatos = array( );

          $resultado="";

          if(isset($_GET["proyectoId"])){
            $proyectos=obtnerProyectosPorId($_GET["proyectoId"]);
            if($proyectos){
              $htmlDatos["accion"] = $_GET["accion"];
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
              $htmlDatos["voltajes"]=obtenerVoltajes();
              $htmlDatos["conexiones"]=obtenerConexions();
              }
            }

            if (isset($_POST["btnSolicitarFactibilidad"])) {

              switch ($_POST["accion"]) {
                case 'INS':
                  $resultado=registrarFactibilidad($_POST["cmbVoltaje"],$_POST["cmbConexion"],$_POST["txtPotencia"],$_POST["txtCrecimientoEsperado"],$_POST["txtKva"],$_POST["proyectoId"]);
                  //$location="Location:index.php?page=factibilidadProyectos&error=".$resultado;
                  //header($location);
                //  echo $resultado;
                redirectWithMessage("La Factibilidad ha sido Efectuada.","?page=verMisSolicitudesDeFactibilidad");
                  break;

                case 'UPD':
                  $resultado=actualizarFactibilidad($_POST["cmbVoltaje"],$_POST["cmbConexion"],$_POST["txtPotencia"],$_POST["txtCrecimientoEsperado"],$_POST["txtKva"],$_POST["proyectoId"]);
                  //$location="Location:index.php?page=factibilidadProyectos&error=".$resultado;
                  //header($location);
                  echo $resultado;
                  redirectWithMessage("El cambio se ha realizado.","?page=verMisSolicitudesDeFactibilidad");
                  break;
              }
            }
          renderizar("factibilidadProyectos",  $htmlDatos);
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
