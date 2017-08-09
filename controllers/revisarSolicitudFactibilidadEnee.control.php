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
            //en caso que la factibilidad sea rechazada se ejecutara este codigo
            //que es un update al estado de la factibilidad en este caso 3 ya que 3 es
            //igual a rechazado
            if ($_POST["tipo"]=="rechazo") {
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],3);
            //en caso que la factibilidad sea aceptada se ejecutara este codigo
            //que es un update al estado de la factibilidad en este caso 2 ya que 2 es
            //igual a aceptado
          }elseif ($_POST["tipo"]=="aceptado") {
//Esta linea ejecuta el query de insert para agregar el comentario en la base de datos
            agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],2);

            $files = $_FILES['userfile']['name'];

            //creamos una nueva instancia de la clase multiupload
            $upload = new Multiupload();
            //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
            $isUpload = $upload->upFiles($files,$_POST["factibilidadId"],"factibilidad");
          }
          }

          ###################################################################
          //Se ingresa el query necesario para poder ver los proyectos en este cas
          //todos los proyectos de la enee ya que este es super usuario
          ###################################################################
          $revisar=verSolicitudesFactbilidadEneeAdmin();
          ###################################################################
          /*
          Esta es la funcion final del case la cual sirve para mostrar la vista
          que requerimos en estos momentos en este caso "revisarSolicitudFactibilidadEnee"
          adicionalmente se le envia el arreglo con los datos que necesita "array(solicitud)"
          el ultimo punto en renderizar es que se le pasa el layaout o barra lateral que
          deseamos mostrar para este caso es layoutEnee
          */
          ###################################################################
          renderizar("revisarSolicitudFactibilidadEnee",array('solicitud'=>$revisar),"layoutEneeAdmin.view.tpl");
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

              agregarComentarioFactibilidad($_POST["codigoProyecto"],$_POST["comentario"],5);

              $files = $_FILES['userfile']['name'];

              //creamos una nueva instancia de la clase multiupload
              $upload = new Multiupload();
              //llamamos a la funcion upFiles y le pasamos el array de campos file del formulario
              $isUpload = $upload->upFiles($files,$_POST["factibilidadId"],"factibilidad");
            }
            }

            ###################################################################
            //Se busca la region a la que pertenece el usuario logueado para
            //poder diferenciarlo de las diferentes regiones
            ###################################################################
            $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
            ###################################################################
            //Se ingresa el query necesario para poder ver los proyectos que pertenecen a la misma
            //region del usuario logueado
            ###################################################################
            $revisar=verSolicitudesFactbilidadEneeSupervisor($usuarios["usuarioRegion"]);
            ###################################################################
            /*
            Esta es la funcion final del case la cual sirve para mostrar la vista
            que requerimos en estos momentos en este caso "revisarSolicitudFactibilidadEnee"
            adicionalmente se le envia el arreglo con los datos que necesita "array(solicitud)"
            el ultimo punto en renderizar es que se le pasa el layaout o barra lateral que
            deseamos mostrar para este caso es layoutEnee
            */
            ###################################################################
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

###################################################################
//Se busca la region a la que pertenece el usuario logueado para
//poder diferenciarlo de las diferentes regiones
###################################################################
              $usuarios=obtenerUsuariosPorId($_SESSION["userName"]);
###################################################################
//Se ingresa el query necesario para poder ver los proyectos que pertenecen a la misma
//region del usuario logueado
###################################################################
              $revisar=verSolicitudesFactbilidadEneeAprobacion($usuarios["usuarioRegion"]);
###################################################################
/*
Esta es la funcion final del case la cual sirve para mostrar la vista
que requerimos en estos momentos en este caso "revisarSolicitudFactibilidadEnee"
adicionalmente se le envia el arreglo con los datos que necesita "array(solicitud)"
el ultimo punto en renderizar es que se le pasa el layaout o barra lateral que
deseamos mostrar para este caso es layoutEnee
*/
###################################################################
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
