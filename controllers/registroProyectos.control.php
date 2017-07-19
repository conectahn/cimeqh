<?php

  require_once("libs/template_engine.php");

  require_once("models/proyectos.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==4) {
          $departamentos= array( );
          $proyecto = array( );
          $region=array();
          $departamentos=obtenerDepartamentos();
          $tipos=obtenerTipoProyectos();
          $region=obtenerRegion();
          $respueta="";

          if (isset($_POST["btnRegistrarProyecto"])) {
            $proyecto["txtNombrePropietario"]=$_POST["txtPropietarioNombre"];
            $proyecto["txtDireccionPropietario"]=$_POST["txtDireccionPropietario"];
            $proyecto["txtEmailPropietario"]=$_POST["txtEmailPropietario"];
            $proyecto["txtTelefonoPropietario"]=$_POST["txtTelefonoPropietario"];
            $proyecto["txtCelularPropietario"]=$_POST["txtCelularPropietario"];
            $proyecto["txtNombreProyecto"]=$_POST["txtNombreProyecto"];
            $proyecto["txtUtmEste"]=$_POST["txtUtmEste"];
            $proyecto["txtUtmNorte"]=$_POST["txtUtmNorte"];
            $proyecto["txtUtmZona"]=$_POST["txtUtmZona"];
            $proyecto["txtIdentidadPropietario"]=$_POST["txtIdentidadPropietario"];
            $proyecto["cmbDepartamentoProyecto"]=$_POST["cmbProyectoDepartamento"];
            $proyecto["txtDireccionProyecto"]=$_POST["txtDireccionProyecto"];
            $proyecto["txtDescripcionProyecto"]=$_POST["txtDescripcionProyecto"];
            $proyecto["cmbProyectoTipo"]=$_POST["cmbProyectoTipo"];
            $proyecto["cmbRegion"]=$_POST["cmbRegion"];
            $proyecto["fechahora"]=time();
            $respueta=registrarProyecto($proyecto["txtNombrePropietario"],
            $proyecto["txtIdentidadPropietario"],
            $proyecto["txtDireccionPropietario"],
            $proyecto["txtEmailPropietario"],
            $proyecto["txtTelefonoPropietario"],
            $proyecto["txtCelularPropietario"],
            $proyecto["txtNombreProyecto"],
            $proyecto["txtUtmEste"],
            $proyecto["txtUtmNorte"],
            $proyecto["txtDescripcionProyecto"],
            $proyecto["cmbDepartamentoProyecto"],
            $proyecto["txtDireccionProyecto"],
            $proyecto["txtNombreProyecto"],
            $proyecto["cmbProyectoTipo"],
            $proyecto["txtUtmZona"],
            $proyecto["cmbRegion"],
            $proyecto["fechahora"]);
            print_r($respueta);
            redirectWithMessage("El proyecto ha sido agregado exitosamente $respueta","index.php?page=verProyectos");
            $location="Location:index.php?page=registroProyectos&error=".$respueta;
            redirectWithMessage("El proyecto se registro con exito.","?page=verProyectos");
            header($location);

          }

          renderizar("registroProyectos",  array("departamentos"=>$departamentos, "tipos"=>$tipos,"region"=>$region));

        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }
      }else if ($_SESSION["estado"] == 4) {
          redirectWithMessage("Su cuenta todavia no ha sido verificada por el CIMEQH.","?page=login");
      }elseif ($_SESSION["estado"] == 3) {
        redirectWithMessage("Su cuenta ha sido supendida por: ".$_SESSION["comentario"],"?page=login");
      }
    }else {
      mw_redirectToLogin("page=login");
    }


  }

  run();
?>
