<?php

  require_once("libs/template_engine.php");
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
              $htmlDatos["zonaUtm"] = $proyectos["zonaUtm"];
              $htmlDatos["proyectoEmailPropietario"] = $proyectos["proyectoEmailPropietario"];
              $htmlDatos["proyectoNombrePropietario"] = $proyectos["proyectoNombrePropietario"];
              $htmlDatos["proyectoIdentidadPropietario"] = $proyectos["proyectoIdentidadPropietario"];
              $htmlDatos["proyectoCelularPropietario"] = $proyectos["proyectoCelularPropietario"];
              $htmlDatos["proyectoDireccionPropietario"] = $proyectos["proyectoDireccionPropietario"];
              $htmlDatos["proyectoTelefonoPropietario"] = $proyectos["proyectoTelefonoPropietario"];
              }
            }

            if (isset($_POST["btnModificarProyectos"])) {
              switch ($_POST["accion"]) {
                case 'UPD':

                  $resultado=ActualizarProyecto($_GET["proyectoId"],$_POST["txtProyectoNombre"],$_POST["txtproyectoDepartamento"],
                $_POST["txtDireccionProyecto"],
                $_POST["txtDescripcionProyecto"],
                $_POST["txtLatitud"],
                $_POST["txtLongitud"],
                $_POST["UTM"],
                $_POST["txtNombrePropietario"],
                $_POST["txtIdentidadPropietario"],
                $_POST["txtTelefonoPropietario"],
                $_POST["txtCelularPropietario"],
                $_POST["txtEmailPropietario"],
                $_POST["txtDireccionPropietario"]
              );
                  //$location="Location:index.php?page=factibilidadProyectos&error=".$resultado;
                  //header($location);

                  echo $resultado;
                  redirectWithMessage("El cambio se ha realizado.","?page=login");
                  break;
              }
            }
          renderizar("modificarProyectos",  $htmlDatos);
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
