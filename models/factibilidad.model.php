<?php
require_once("libs/dao.php");

  require_once("libs/dao.php");

function registrarFactibilidad($voltajeId, $conexionId, $potencia, $crecmientoesperado, $kva, $proyectoId){
  $insertSQL = "INSERT INTO `tblsolicitudfactibilidad`
(
`voltajeId`,
`conexionId`,
`solicitudFactibilidadPotencia`,
`solicitudadFactibilidadCrecimientoEsperado`,
`solicitudFactibilidadKva`,
`estadoFactibilidadId`,
`proyectoId`,`fechaSolicitud`)
VALUES(
%d, %d, %f, %f, %f, 4, %d, now());";
$insertSQL = sprintf($insertSQL, $voltajeId, $conexionId, $potencia, $crecmientoesperado,$kva, $proyectoId);

return ejecutarNonQueryConErrores($insertSQL);
}

function actualizarFactibilidad($voltajeId, $conexionId, $potencia, $crecmientoesperado, $kva, $proyectoId){
  $insertSQL = "UPDATE `tblsolicitudfactibilidad`
SET `voltajeId` = %d,
`conexionId` = %d,
`solicitudFactibilidadPotencia` = %f,
`solicitudadFactibilidadCrecimientoEsperado` = %f,
`solicitudFactibilidadKva` = %f,
`estadoFactibilidadId` = 4,
`comentario` = ' '
WHERE `proyectoId` = %d;";
$insertSQL = sprintf($insertSQL, $voltajeId, $conexionId, $potencia, $crecmientoesperado,$kva, $proyectoId);

return ejecutarNonQueryConErrores($insertSQL);
}

function agregarComentarioFactibilidad($solicitudId, $comentario, $estado){
  $sqlstr="UPDATE `tblsolicitudfactibilidad`
  SET `estadoFactibilidadId` = $estado,
  `comentario` = '$comentario'
  WHERE `solicitudFactibilidadId` = $solicitudId;";
  if(ejecutarNonQuery($sqlstr)){
  return ejecutarNonQueryConErrores($sqlstr);
  }
}

function verFactbilidadPorId($factId){
$solicitudFactibilidad = array();
$sqlstr = "SELECT  tblsf.solicitudFactibilidadId,proyectoNombre,departamentoDescripcion,proyectoDireccion,proyectoDescrpcion,
proyectoNombrePropietario, concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ' ,usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',
usuarioNumeroColegiacion, voltajeDescripcion,conexionDescripcion,solicitudFactibilidadPotencia,solicitudadFactibilidadCrecimientoEsperado,
solicitudFactibilidadKva,estadoFactibilidadDescripcion
FROM tblsolicitudfactibilidad tblsf, tblconexiones tblc, tblvoltajes tblv, tbldepartamentos tbld,tblproyectos tblp,
tblusuarios tblu, tblestadofactibilidad
where tblsf.proyectoId=tblp.proyectoId and tblsf.conexionId=tblc.conexionId
and tblsf.voltajeId=tblv.voltajeId and tblp.usuarioIdentidad=tblu.usuarioIdentidad
and tbld.departamentoId=tblp.departamentoId
and tblsf.estadoFactibilidadId=tblestadofactibilidad.estadoFactibilidadId
and tblsf.solicitudFactibilidadId=$factId;";
$solicitudFactibilidad = obtenerUnRegistro($sqlstr);
return $solicitudFactibilidad;
}

function verSolicitudesFactbilidadAdminCimeqh(){
    $solicitudFactibilidad = array();
    $sqlstr = "SELECT  tblsf.solicitudFactibilidadId,tblsf.estadoFactibilidadId,proyectoNombre, departamentoDescripcion, proyectoDireccion, proyectoDescrpcion,
    proyectoLatitud,proyectoLongitud, proyectoNombrePropietario,
    proyectoIdentidadPropietario, proyectoTelefonoPropietario, proyectoCelularPropietario,
    proyectoEmailPropietario, proyectoDireccionPropietario,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' '
    ,usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',
    usuarioNumeroColegiacion, usuarioTelefono, usuarioCelular, voltajeDescripcion, conexionDescripcion,
    solicitudFactibilidadPotencia, solicitudadFactibilidadCrecimientoEsperado, solicitudFactibilidadKva,
    estadoFactibilidadDescripcion
    FROM tblsolicitudfactibilidad tblsf, tblconexiones tblc, tblvoltajes tblv, tbldepartamentos tbld,
    tblproyectos tblp, tblusuarios tblu,  tblestadofactibilidad
    where tblsf.proyectoId=tblp.proyectoId and tblsf.conexionId=tblc.conexionId
    and tblsf.voltajeId=tblv.voltajeId and tblp.usuarioIdentidad=tblu.usuarioIdentidad
    and tbld.departamentoId=tblp.departamentoId
    and tblsf.estadoFactibilidadId=tblestadofactibilidad.estadoFactibilidadId
    and tblsf.estadoFactibilidadId IN (1,4);";
    $solicitudFactibilidad = obtenerRegistros($sqlstr);
    return $solicitudFactibilidad;
}

function verSolicitudesFactbilidadRegCimeqh($region){
    $solicitudFactibilidad = array();
    $sqlstr = "SELECT  tblsf.solicitudFactibilidadId,tblsf.estadoFactibilidadId,proyectoNombre, departamentoDescripcion, proyectoDireccion, proyectoDescrpcion,
        proyectoLatitud,proyectoLongitud, proyectoNombrePropietario,
        proyectoIdentidadPropietario, proyectoTelefonoPropietario, proyectoCelularPropietario,
        proyectoEmailPropietario, proyectoDireccionPropietario,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' '
        ,usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',
        usuarioNumeroColegiacion, usuarioTelefono, usuarioCelular, voltajeDescripcion, conexionDescripcion,
        solicitudFactibilidadPotencia, solicitudadFactibilidadCrecimientoEsperado, solicitudFactibilidadKva,
        estadoFactibilidadDescripcion, reg.regionDescripcion
        FROM tblsolicitudfactibilidad tblsf, tblconexiones tblc, tblvoltajes tblv, tbldepartamentos tbld,
        tblproyectos tblp, tblusuarios tblu,  tblestadofactibilidad, tblregion reg
        where tblsf.proyectoId=tblp.proyectoId and tblsf.conexionId=tblc.conexionId
        and tblsf.voltajeId=tblv.voltajeId and tblp.usuarioIdentidad=tblu.usuarioIdentidad
        and tbld.departamentoId=tblp.departamentoId
        and tblsf.estadoFactibilidadId=tblestadofactibilidad.estadoFactibilidadId
        and tblsf.estadoFactibilidadId IN (1,4) and reg.idRegion=tblp.regionProyecto and reg.idRegion=$region;";
    $solicitudFactibilidad = obtenerRegistros($sqlstr);
    return $solicitudFactibilidad;
}


function verSolicitudesFactbilidadEneeSup($region){
    $solicitudFactibilidad = array();
    $sqlstr = "SELECT  tblsf.solicitudFactibilidadId,tblsf.estadoFactibilidadId,proyectoNombre, departamentoDescripcion, proyectoDireccion, proyectoDescrpcion,
    proyectoLatitud,proyectoLongitud, proyectoNombrePropietario,
    proyectoIdentidadPropietario, proyectoTelefonoPropietario, proyectoCelularPropietario,
    proyectoEmailPropietario, proyectoDireccionPropietario,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' '
    ,usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',
    usuarioNumeroColegiacion, usuarioTelefono, usuarioCelular, voltajeDescripcion, conexionDescripcion,
    solicitudFactibilidadPotencia, solicitudadFactibilidadCrecimientoEsperado, solicitudFactibilidadKva,
    estadoFactibilidadDescripcion
    FROM tblsolicitudfactibilidad tblsf, tblconexiones tblc, tblvoltajes tblv, tbldepartamentos tbld,
    tblproyectos tblp, tblusuarios tblu,  tblestadofactibilidad, tblroles
    where tblsf.proyectoId=tblp.proyectoId and tblsf.conexionId=tblc.conexionId
    and tblsf.voltajeId=tblv.voltajeId and tblp.usuarioIdentidad=tblu.usuarioIdentidad
    and tbld.departamentoId=tblp.departamentoId
    and tblsf.estadoFactibilidadId=tblestadofactibilidad.estadoFactibilidadId
    and tblsf.estadoFactibilidadId=1 and tblp.regionProyecto=$region and tblu.rolId=tblroles.rolId";
    $solicitudFactibilidad = obtenerRegistros($sqlstr);
    return $solicitudFactibilidad;
}




function verSolicitudesFactbilidadEnee(){
    $solicitudFactibilidad = array();
    $sqlstr = "SELECT  tblsf.solicitudFactibilidadId,tblsf.estadoFactibilidadId,proyectoNombre, departamentoDescripcion, proyectoDireccion, proyectoDescrpcion,
    proyectoLatitud,proyectoLongitud, proyectoNombrePropietario,
    proyectoIdentidadPropietario, proyectoTelefonoPropietario, proyectoCelularPropietario,
    proyectoEmailPropietario, proyectoDireccionPropietario,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' '
    ,usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',
    usuarioNumeroColegiacion, usuarioTelefono, usuarioCelular, voltajeDescripcion, conexionDescripcion,
    solicitudFactibilidadPotencia, solicitudadFactibilidadCrecimientoEsperado, solicitudFactibilidadKva,
    estadoFactibilidadDescripcion
    FROM tblsolicitudfactibilidad tblsf, tblconexiones tblc, tblvoltajes tblv, tbldepartamentos tbld,
    tblproyectos tblp, tblusuarios tblu,  tblestadofactibilidad
    where tblsf.proyectoId=tblp.proyectoId and tblsf.conexionId=tblc.conexionId
    and tblsf.voltajeId=tblv.voltajeId and tblp.usuarioIdentidad=tblu.usuarioIdentidad
    and tbld.departamentoId=tblp.departamentoId
    and tblsf.estadoFactibilidadId=tblestadofactibilidad.estadoFactibilidadId
    and tblsf.estadoFactibilidadId=1;";
    $solicitudFactibilidad = obtenerRegistros($sqlstr);
    return $solicitudFactibilidad;
}

function obtenerSolicitudesFactibilidad(){
    $solicitudes = array();
    $sqlstr = "SELECT if(ef.estadoFactibilidadId=1 || ef.estadoFactibilidadId=3 ||
 ef.estadoFactibilidadId=4,true,false) 'reintentar',sf.factibilidadDocumentoNombre,
 sf.factibilidadDocumentoDireccion,sf.comentario,p.proyectoId, sf.solicitudFactibilidadId,
 p.proyectoNombre, p.proyectoNombrePropietario, p.proyectoIdentidadPropietario,
 ef.estadoFactibilidadDescripcion,dep.departamentoDescripcion,p.proyectoDireccion,p.proyectoDescrpcion,
 p.proyectoLongitud,p.proyectoLatitud,p.proyectoTelefonoPropietario,p.proyectoCelularPropietario,
 p.proyectoEmailPropietario,p.proyectoDireccionPropietario,sf.solicitudFactibilidadKva,sf.solicitudFactibilidadPotencia,
 vol.voltajeDescripcion,con.conexionDescripcion,sf.solicitudadFactibilidadCrecimientoEsperado
FROM tblsolicitudfactibilidad as sf, tblproyectos as p, tblestadofactibilidad as ef,
tbldepartamentos as dep,tblvoltajes as vol, tblconexiones as con
where p.proyectoId=sf.proyectoId and sf.estadoFactibilidadId=ef.estadoFactibilidadId and
p.departamentoId=dep.departamentoId and sf.conexionId=con.conexionId and sf.voltajeId=vol.voltajeId and p.usuarioIdentidad='%s';";
    $sqlstr = sprintf($sqlstr, $_SESSION["userName"]);
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

 ?>
