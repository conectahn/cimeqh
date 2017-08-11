<?php

    session_start();

    require_once("libs/utilities.php");

    $pageRequest = "landingPage";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }

    //Incorporando los midlewares son codigos que se deben ejecutar
    //Siempre
    require_once("controllers/verificar.mw.php");
    require_once("controllers/site.mw.php");
    //Este switch se encarga de todo el enrutamiento

    switch($pageRequest){
        case "home":
        //llamar al controlador
        require_once("controllers/home.control.php");
        break;

        case "revisarSolicitudRecepcionEnee":
        //llamar al controlador
        require_once("controllers/revisarSolicitudRecepcionEnee.control.php");
        break;

        case "reporteProyectoCimeqh":
        //llamar al controlador
        require_once("controllers/reporteProyectoCimeqh.control.php");
        break;

        case "reporteProyectoEnee":
        //llamar al controlador
        require_once("controllers/reporteProyectoEnee.control.php");
        break;

        case "reporte":
        require_once("controllers/reporte.control.php");
        break;
        case "landingPage":
        //llamar al controlador
        require_once("controllers/landingPage.control.php");
        break;

        case "posponerDespeje":
        //llamar al controlador
        require_once("controllers/posponerDespeje.control.php");
        break;

        case "pagos":
        //llamar al controlador
        require_once("controllers/pagos.control.php");
        break;

        case "reporteAprobacion":
        //llamar al controlador
        require_once("controllers/reporteAprobacion.control.php");
        break;

        case "pagarAprobacion":
        //llamar al controlador
        require_once("controllers/pagarAprobacion.control.php");
        break;

        case "pagarDespeje":
        //llamar al controlador
        require_once("controllers/pagarDespeje.control.php");
        break;

        case "pagarMora":
        //llamar al controlador
        require_once("controllers/pagarMora.control.php");
        break;

        case "pagarRecepcion":
        //llamar al controlador
        require_once("controllers/pagarRecepcion.control.php");
        break;

        case "verMisDocumentosDeRecepcion":
        //llamar al controlador
        require_once("controllers/verMisDocumentosDeRecepcion.control.php");
        break;

        case "registroUsuariosEnee":
        //llamar al controlador
        require_once("controllers/registroUsuariosEnee.control.php");
        break;

        case "revisarSolicitudAprobacionEnee":
        //llamar al controlador
        require_once("controllers/revisarSolicitudAprobacionEnee.control.php");
        break;

        case "revisarSolicitudAprobacionPublico":
        //llamar al controlador
        require_once("controllers/revisarSolicitudAprobacionPublico.control.php");
        break;

        case "revisarSolicitudFactibilidadEnee":
        //llamar al controlador
        require_once("controllers/revisarSolicitudFactibilidadEnee.control.php");
        break;

        case "reporteSolicitudAprobacion":
        //llamar al controlador
        require_once("controllers/reporteSolicitudAprobacion.control.php");
        break;

        case "cerrarSesion":
        //llamar al controlador
        require_once("controllers/cerrarSesion.control.php");
        break;

        case "login":
        //llamar al controlador
        require_once("controllers/login.control.php");
        break;

        case "transicionAprobacion":
        //llamar al controlador
        require_once("controllers/transicionAprobacion.control.php");
        break;

        case "verMisDocumentosDeAprobacion":
        //llamar al controlador
        require_once("controllers/verMisDocumentosDeAprobacion.control.php");
        break;

        case "verMisSolicitudesDeDespeje":
        //llamar al controlador
        require_once("controllers/verMisSolicitudesDeDespeje.control.php");
        break;

        case "revisarSolicitudDespejeCimeqh":
        //llamar al controlador
        require_once("controllers/revisarSolicitudDespejeCimeqh.control.php");
        break;

        case "revisarSolicitudDespejeEnee":
        //llamar al controlador
        require_once("controllers/revisarSolicitudDespejeEnee.control.php");
        break;

        case "revisarSolicitudAprobacionCimeqh":
        //llamar al controlador
        require_once("controllers/revisarSolicitudAprobacionCimeqh.control.php");
        break;


        case "verMisSolicitudesDeAprobacion":
        //llamar al controlador
        require_once("controllers/verMisSolicitudesDeAprobacion.control.php");
        break;

        case "verMisSolicitudesDeRecepcion":
        //llamar al controlador
        require_once("controllers/verMisSolicitudesDeRecepcion.control.php");
        break;

        case "documentos":
        //llamar al controlador
        require_once("controllers/documentos.control.php");
        break;

        case "verMisSolicitudesDeFactibilidad":
        //llamar al controlador
        require_once("controllers/verMisSolicitudesDeFactibilidad.control.php");
        break;

        case "transicionFactibilidad":
        //llamar al controlador
        require_once("controllers/transicionFactibilidad.control.php");
        break;

        case "verProyectos":
        //llamar al controlador
        require_once("controllers/verProyectos.control.php");
        break;

        case "solicitudDeCuentas":
        //llamar al controlador
        require_once("controllers/solicitudDeCuentas.control.php");
        break;

        case "registroProyectos":
        //llamar al controlador
        require_once("controllers/registroProyectos.control.php");
        break;

        case "factibilidadProyectos":
        //llamar al controlador
        require_once("controllers/factibilidadProyectos.control.php");
        break;

        case "recepcionProyectos":
        //llamar al controlador
        require_once("controllers/recepcionProyectos.control.php");
        break;

        case "registroUsuarios":
            //llamar al controlador
            require_once("controllers/registroUsuarios.control.php");
            break;

        case "aprobacionProyectos":
        //llamar al controlador
        require_once("controllers/aprobacionProyectos.control.php");
        break;

        case "registroUsuariosCimeqh":
        require_once("controllers/registroUsuariosCimeqh.control.php");
        break;

        case "solicitudDespeje":
        //llamar al controlador
        require_once("controllers/solicitudDespeje.control.php");
        break;

        case "productos":
        //llamar al controlador
        require_once("controllers/productos.control.php");
        break;

        case "modificarProyectos":
        require_once("controllers/modificarProyectos.control.php");
        break;

        case "verUsuarios":
        //llamar al controlador
        require_once("controllers/verUsuarios.control.php");
        break;

        case "modificarUsuario":
        //llamar al controlador
        require_once("controllers/modificarUsuario.control.php");
        break;


        case "revisarSolicitudFactibilidadCimeqh":
                        //llamar al controlador
        require_once("controllers/revisarSolicitudFactibilidadCimeqh.control.php");
        break;

        case "revisarSolicitudRecepcionCimeqh":
            //llamar al controlador
        require_once("controllers/revisarSolicitudRecepcionCimeqh.control.php");
        break;

        case "comentarios":
            //llamar al controlador
        require_once("controllers/comentarios.control.php");
        break;

        case "usuarioRechazado":
            //llamar al controlador
        require_once("controllers/usuarioRechazado.control.php");
        break;

        case "restablecerPass":
            //llamar al controlador
        require_once("controllers/restablecerPass.control.php");
        break;

        case "reporteFinancieroCimeqh":
        require_once("controllers/reporteFinancieroCimeqh.control.php");
        break;

        case "reporteFinancieroEnee":
        require_once("controllers/reporteFinancieroEnee.control.php");
        break;

        default:
            require_once("controllers/error.control.php");

    }
?>
