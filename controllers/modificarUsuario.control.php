<?php
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==1) {
          $usuarios = array();
          $htmlDatos = array();
        

          if(isset($_GET["usuarioId"])){
            $algo=$_GET["usuarioId"];
            $usuarios=obtenerUsuariosPorId($algo);
            if($usuarios){
              $htmlDatos["usuarioIdentidad"] = $usuarios["usuarioIdentidad"];
              $htmlDatos["usuarioPrimerNombre"] = $usuarios["usuarioPrimerNombre"];
              $htmlDatos["usuarioSegundoNombre"] = $usuarios["usuarioSegundoNombre"];
              $htmlDatos["usuarioPrimerApellido"] = $usuarios["usuarioPrimerApellido"];
              $htmlDatos["usuarioSegundoApellido"] = $usuarios["usuarioSegundoApellido"];
              $htmlDatos["usuarioNumeroColegiacion"] = $usuarios["usuarioNumeroColegiacion"];
              $htmlDatos["usuarioCelular"] = $usuarios["usuarioCelular"];
              $htmlDatos["usuarioTelefono"] = $usuarios["usuarioTelefono"];
              $htmlDatos["usuarioDireccion"] = $usuarios["usuarioDireccion"];
              $htmlDatos["rolDescripcion"] = $usuarios["rolDescripcion"];
              $htmlDatos["estadoCuentaDescripcion"] = $usuarios["estadoCuentaDescripcion"];
              $htmlDatos["estado"]=obtenerEstadoCuenta();
              $htmlDatos["roles"]=obtenerRoles();
              $htmlDatos["rolId"]=$usuarios["rolId"];
              $htmlDatos["estadoCuentaId"]=$usuarios["estadoCuentaId"];
            }
          }

          renderizar("modificarUsuario", $htmlDatos,"layoutCimeqh.view.tpl");
        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }
      }else {
      redirectWithMessage("Su cuenta todavia no ha sido verificada por el CIMEQH.","?page=login");
      }
    }else {
      mw_redirectToLogin("page=login");
    }

  }
  run();
?>
