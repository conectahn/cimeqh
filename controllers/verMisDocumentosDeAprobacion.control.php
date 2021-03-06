<?php
/* Home Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==4) {
          $respuesta="";
          $documentos = array();

          if (isset($_GET["aprobacionId"])) {
            $documentos=obtenerDocumentosAprobacionPorId($_GET["aprobacionId"]);
          }

          if (isset($_POST["btnEliminarDocumento"])) {
            borrarDocumentoAprobacion($_POST["txtDocumentoId"],$_POST["txtDocumentoDireccion"]);
          }

          renderizar("verMisDocumentosDeAprobacion",array('documentos'=>$documentos,'aprobacionId'=>$_GET["aprobacionId"]));

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
