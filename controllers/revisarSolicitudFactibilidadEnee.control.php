<?php
  require_once("libs/template_engine.php");
  require_once("models/factibilidad.model.php");
  require_once("models/usuarios.model.php");
  require_once("models/multiUpload.model.php");

  function run(){
    $revisar = array();
    $usuario=array();
    if (mw_estaLogueado()) {

//revisa primero si el usuario esta activo en este caso activo es igual a 1
      if ($_SESSION["estado"]==1) {
################################################################################
//revisa el rol al que el usuario pertenece si es 5 = enee supervisor pasa
################################################################################
        if($_SESSION["rol"]==5){

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

//agregar comentario en caso de ser aceptada o rechazada una aprobacion
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

#################################################################
//se realiza un query para obtener la region del usuatio logueado
$usuario=obtenerUsuariosPorId($_SESSION["userName"]);
//se llama el query para ver las solicitudes de
//factibilidad enee segun la region a la que pretenece
$revisar=verSolicitudesFactbilidadEneeSup($usuario["usuarioRegion"]);
renderizar("revisarSolicitudFactibilidadEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");


        }

################################################################################
//revisa el rol al que el usuario pertenece si es 6 = enee aprobadora pasa
################################################################################

        if($_SESSION["rol"]==6){
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

//se llama el query para ver las solicitudes de factibilidad enee
              $revisar=verSolicitudesFactbilidadEnee();
              renderizar("revisarSolicitudFactibilidadEnee",array('solicitud'=>$revisar),"layoutEnee.view.tpl");


        }

################################################################################
//revisa el rol al que el usuario pertenece si es 2 = enee superusuario pasa
################################################################################


        if ($_SESSION["rol"]==2) {

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
