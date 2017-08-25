<?php

  require_once("libs/template_engine.php");
  require_once("models/proyectos.model.php");
  require_once("models/pagos.model.php");
  require_once("models/aprobacion.model.php");
  require_once("models/multiUpload.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==4) {
          $respuesta="";
          $htmlDatos = array( );
          $check="";

          if (isset($_POST["btnSolicitarAprobacion"])) {

            //$respuesta = registrarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["proyectoId"],$_SESSION["userName"]);


            switch ($_POST["accion"]) {
              case 'INS':
              //Generar Numero de Factura primero se genera un numero aleatorio
              $rand_num = rand(10000,99999);
              //codigo para crear un codigo alfanumerico
              $numeroFactua = base_convert($rand_num, 10, 36).base_convert(getLastInserId(), 10, 36);
              $estado=2;
              agregarFactura($numeroFactua,$_SESSION["userName"],$estado,$_POST["txtTotalTimbres"],$_POST["proyectoId"]);
              $respuesta=obtenerIdFactura($numeroFactua);
              //codigo para crear un codigo alfanumerico
              $rand_num = rand(10000,99999); // Random integer number between 10,000 and 99,999
              $codigo = /*base_convert($_SESSION["userName"],10,36).*/base_convert(time(), 10, 36).base_convert($rand_num, 10, 36).base_convert(getLastInserId(), 10, 36);
              //$monto, $costo, $proyectoId,$codigo,$idFactura
              $check=registrarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["proyectoId"],$codigo,$respuesta["idFacturas"]);
              // $respuesta=registrarAprobacion($_POST["txtMonto"],$_POST["txtTotalTimbres"],$_POST["proyectoId"]);
              $files = $_FILES['userfile']['name'];
              //creamos una nueva instancia de la clase multiupload
              $upload = new Multiupload();
              //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
              $isUpload = $upload->upFiles($files,$check,"aprobacion");
               //llamamos a la funcion upFiles y le pasamos el array de campos file del formulari
               print_r($isUpload);
               echo $isUpload;
              if ($isUpload===FALSE) {
              borrarAprobacion($check);
              $alerta=redirectWithMessage("Error al subir el archivo ","index.php?page=aprobacionProyectos");
              }else {
                print_r($isUpload);
                echo $isUpload;
              redirectWithMessage("Su aprobacion ha sido Solicitada favor pague los timbres correpondientes para seguir su proceso","?page=pagos");
              //$header="Location:index.php?page=aprobacionProyectos&respuesta=".$check;
            //  header($header);
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

            }


          }

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
