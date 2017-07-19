<?php

  require_once("libs/template_engine.php");
  require_once("models/proyectos.model.php");
  require_once("models/aprobacion.model.php");
  require_once("models/multiUpload.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==4) {
          $respuesta="";
          $htmlDatos = array( );

          /*if (isset($_POST["btnSolicitarAprobacion"])) {
            $respuesta = registrarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["proyectoId"]);
          }

            /*switch ($_POST["accion"]) {
              case 'INS':
                $respuesta=registrarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["proyectoId"]);

                $files = $_FILES['userfile']['name'];

                //creamos una nueva instancia de la clase multiupload
                $upload = new Multiupload();
                //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
                $isUpload = $upload->upFiles($files,$respuesta,"aprobacion");
                 //llamamos a la funcion upFiles y le pasamos el array de campos file del formulari
                if ($isUpload===FALSE) {
                   borrarAprobacion($respuesta);
                   $alerta=redirectWithMessage("Error al subir el archivo ","index.php?page=aprobacionProyectos");
                }else {
                   $header="Location:index.php?page=aprobacionProyectos&respuesta=".$respuesta;
                   header($header);
                 }
                break;

              case 'UPD':
                $respuesta=actualizarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["aprobacionId"]);

                $files = $_FILES['userfile']['name'];

                //creamos una nueva instancia de la clase multiupload
                $upload = new Multiupload();
                //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
                $isUpload = $upload->upFiles($files,$_POST["aprobacionId"],"aprobacion");
                 //llamamos a la funcion upFiles y le pasamos el array de campos file del formulari

                $header="Location:index.php?page=aprobacionProyectos&respuesta=".$respuesta;
                header($header);

                break;

              default:
                # code...
                break;
            }


          }*/

          if(isset($_GET["proyectoId"])){

            $proyectos=obtnerProyectosPorId($_GET["proyectoId"]);
            if($proyectos){
              if (isset($_GET["accion"])) {
                $htmlDatos["accion"] = $_GET["accion"];

              }
              if (isset($_GET["aprobacionId"])) {
                  $htmlDatos["aprobacionId"] = $_GET["aprobacionId"];
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

              }
            }

          renderizar("aprobacionProyectos", $htmlDatos);
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
