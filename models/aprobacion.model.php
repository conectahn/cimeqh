<?php
  require_once("libs/dao.php");

function registrarAprobacion($monto, $costo, $proyectoId,$codigo,$idFactura){
  $insertSQL = "INSERT INTO `tblsolicitudaprobacion`
(`solicitudAaprobacionMontoEstimado`,`solicitudAprobacionCosto`,`estadoSolicitudAprobacion`,
  `proyectoId`,`codigoAprobacion`,`fechaRegistroSolicitud`,`idFactura`)
VALUES (%f,%f,4,%d,'%s',now(),%d);";
$insertSQL = sprintf($insertSQL,$monto,$costo,$proyectoId,$codigo,$idFactura);
return ejecutarNonQueryConErrores($insertSQL);
}
/*
INSERT INTO `tblsolicitudaprobacion`
(`solicitudAaprobacionMontoEstimado`,
`solicitudAprobacionCosto`,
`estadoSolicitudAprobacion`,
`proyectoId`,
`usuarioIdentidad`,
`fechaRegistroSolicitud`,
`idFactura`)
VALUES
(%f,%f,5,%d,%s,now(),'%s');
*/

function actualizarAprobacionEstado($id){
  $insertSQL = "UPDATE tblsolicitudaprobacion set `estadoSolicitudAprobacion`= 4;";
  return ejecutarNonQueryConErroresQuery($insertSQL);

}

function obtenerDocumentos($solicitudId){
    $solicitudes = array();
    $sqlstr = "SELECT documentoNombre,proyectoNombre,proyectoDescrpcion,documentoDireccion
FROM cimeqh.tbldocumentosaprobacion tbld, tblsolicitudaprobacion tbls, tblproyectos tblp,
tblusuarios tblu
where tbls.solicitudAprobacionId=tbld.solicitudAprobacionId and
tblp.proyectoId=tbls.proyectoId and tblu.usuarioIdentidad=tblp.usuarioIdentidad and tbld.solicitudAprobacionId=$solicitudId;";
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function obtenerSolicitudAprobacionPorCodigo($codigo){
    $solicitudes = array();
    $sqlstr = "SELECT * FROM tblsolicitudaprobacion as sa,tblestadoaprobacion as ea, tblproyectos as p,tblusuarios as u where sa.proyectoId=p.proyectoId and ea.estadoAprobacionId=sa.estadoSolicitudAprobacion and p.usuarioIdentidad=u.usuarioIdentidad and sa.codigoAprobacion='%s';";
    $sqlstr = sprintf($sqlstr,$codigo);
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function obtenerDocumentosSolicitudAprobacionPorCodigo($codigo){
    $documentos = array();
    $sqlstr = "SELECT da.documentoNombre, da.documentoDireccion FROM tblsolicitudaprobacion as sa, tbldocumentosaprobacion as da where sa.solicitudAprobacionId=da.solicitudAprobacionId and sa.codigoAprobacion='%s';";
    $sqlstr = sprintf($sqlstr,$codigo);
    $documentos = obtenerRegistros($sqlstr);
    return $documentos;
}

function obtenerUnDocumento(){
    $solicitudes = array();
    $sqlstr = "SELECT documentoNombre,proyectoNombre,proyectoDescrpcion,documentoDireccion
    FROM cimeqh.tbldocumentosaprobacion tbld, tblsolicitudaprobacion tbls, tblproyectos tblp,
    tblusuarios tblu
    where tbls.solicitudAprobacionId=tbld.solicitudAprobacionId and
    tblp.proyectoId=tbls.proyectoId and tblu.usuarioIdentidad=tblp.usuarioIdentidad and tbld.solicitudAprobacionId=84
    order by proyectoNombre limit 1;";
    $solicitudes = obtenerUnRegistro($sqlstr);
    return $solicitudes;
}

function borrarAprobacion($aprobacionID){
   $sqlstr = sprintf("delete from tblsolicitudaprobacion where solicitudAprobacionId= %d",$aprobacionID);
   if(ejecutarNonQuery($sqlstr)){
       return getLastInserId();
   }
}


function borrarDocumentoAprobacion($documentoId,$direccion){
  unlink($direccion);
   $sqlstr = sprintf("DELETE FROM `tbldocumentosaprobacion` WHERE `documentosAprobacionId`= %d;",$documentoId);
   if(ejecutarNonQuery($sqlstr)){
       return getLastInserId();
   }
}



function obtenerSolicitudAprobacionPorId($solicitudId){
    $proyecto = array();
    $sqlstr = "SELECT *
    from tblproyectos as p, tblusuarios as u, tbldepartamentos as d, tblsolicitudaprobacion as sa, tblestadoaprobacion as ea
 where p.proyectoId=sa.proyectoId
 and p.usuarioIdentidad=u.usuarioIdentidad
 and sa.estadoSolicitudAprobacion=ea.estadoAprobacionId
 and p.departamentoId=d.departamentoId
 and sa.solicitudAprobacionId=%d";
 $sqlstr = sprintf($sqlstr, $solicitudId);
 $proyecto = obtenerUnRegistro($sqlstr);
 return $proyecto;
}



function obtnerAprobacionPorId($proyectoId){
    $proyecto = array();
    $sqlstr = "select * from tblproyectos as p, tbldepartamentos as d, tblsolicitudaprobacion as sa where d.departamentoId=p.departamentoId and p.proyectoId=sa.proyectoId and p.proyectoId=%d;";
    $sqlstr = sprintf($sqlstr, $proyectoId);
    $proyecto = obtenerUnRegistro($sqlstr);
    return $proyecto;
}


function obtenerDocumentosAprobacionPorId($aprobacionId){
    $proyecto = array();
    $sqlstr = "SELECT * FROM tbldocumentosaprobacion where solicitudAprobacionId=%d;";
    $sqlstr = sprintf($sqlstr, $aprobacionId);
    $proyecto = obtenerRegistros($sqlstr);
    return $proyecto;
}


function obtenerSolicitudAprobacion(){
    $solicitudes = array();
    $sqlstr = "SELECT  *
    FROM cimeqh.tblsolicitudaprobacion tbls, tblproyectos tblp, tblestadoaprobacion tble,
    tblusuarios tblu, tbldepartamentos tbld, tbldocumentosaprobacion tbldoc
    where tbls.proyectoId=tblp.proyectoId and
    tble.estadoAprobacionId=tbls.estadoSolicitudAprobacion
    and tblu.usuarioIdentidad=tblp.usuarioIdentidad and tbld.departamentoId=tblp.departamentoId
    and tbldoc.solicitudAprobacionId and tbls.estadoSolicitudAprobacion=4;";
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function verSolicitudesAprobacionAdminCimeqh(){
    $solicitudes = array();
    $sqlstr = "SELECT if(sa.estadoSolicitudAprobacion!=1 and sa.estadoSolicitudAprobacion!=2,true,false)'aprobado',
sa.codigoAprobacion,sa.comentarioAprobacion,sa.estadoSolicitudAprobacion,sa.fechaRegistroSolicitud,
sa.solicitudAaprobacionMontoEstimado,sa.solicitudAprobacionCosto,sa.solicitudAprobacionFecha,
sa.solicitudAprobacionId,ea.estadoAprobacionDescripcion
,proyectoNombrePropietario,proyectoIdentidadPropietario,
proyectoDescrpcion,proyectoLatitud,proyectoLongitud,departamentoDescripcion,
concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',
usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',proyectoNombre,
proyectoDescrpcion,usuarioNumeroColegiacion,proyectoDireccion,proyectoTelefonoPropietario,
proyectoEmailPropietario,proyectoEmailPropietario,proyectoIdentidadPropietario,
usuarioCelular,usuarioTelefono,proyectoCelularPropietario,proyectoTelefonoPropietario,
proyectoDireccionPropietario
from tblproyectos as p, tblusuarios as u, tbldepartamentos as d, tblsolicitudaprobacion as sa,
tblestadoaprobacion as ea
 where p.proyectoId=sa.proyectoId
 and p.usuarioIdentidad=u.usuarioIdentidad
 and sa.estadoSolicitudAprobacion=ea.estadoAprobacionId
 and p.departamentoId=d.departamentoId;";
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function verSolicitudesAprobacionRegCimeqh($region){
    $solicitudes = array();
    $sqlstr = "SELECT *
    from tblproyectos as p, tblusuarios as u, tbldepartamentos as d, tblsolicitudaprobacion as sa,
    tblestadoaprobacion as ea, tblregion as reg
    where p.proyectoId=sa.proyectoId
    and p.usuarioIdentidad=u.usuarioIdentidad
    and sa.estadoSolicitudAprobacion=ea.estadoAprobacionId
    and p.departamentoId=d.departamentoId
    and ea.estadoAprobacionId=4 and p.regionProyecto=$region and p.regionProyecto=reg.idRegion";
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function verSolicitudesAprobacionEneeAdmin(){
    $solicitudes = array();
    $sqlstr = "SELECT *
from tblproyectos as p, tblusuarios as u, tbldepartamentos as d, tblsolicitudaprobacion as sa, tblestadoaprobacion as ea
 where p.proyectoId=sa.proyectoId
 and p.usuarioIdentidad=u.usuarioIdentidad
 and sa.estadoSolicitudAprobacion=ea.estadoAprobacionId
 and p.departamentoId=d.departamentoId
 and ea.estadoAprobacionId IN (1,2);";
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function verSolicitudesAprobacionEneeRegRevision($region){
    $solicitudes = array();
    $sqlstr = "SELECT *
  from tblproyectos as p, tblusuarios as u, tbldepartamentos as d, tblsolicitudaprobacion as sa,
  tblestadoaprobacion as ea, tblregion as reg
 where p.proyectoId=sa.proyectoId
 and p.usuarioIdentidad=u.usuarioIdentidad
 and sa.estadoSolicitudAprobacion=ea.estadoAprobacionId
 and p.departamentoId=d.departamentoId
 and ea.estadoAprobacionId IN (1,5,2) and reg.idRegion=p.regionProyecto and reg.idRegion=$region;";
 $solicitudes = obtenerRegistros($sqlstr);
 return $solicitudes;
}

function verSolicitudesAprobacionEneeRegAprobacion($region){
    $solicitudes = array();
    $sqlstr = "SELECT *
  from tblproyectos as p, tblusuarios as u, tbldepartamentos as d, tblsolicitudaprobacion as sa,
  tblestadoaprobacion as ea, tblregion as reg
 where p.proyectoId=sa.proyectoId
 and p.usuarioIdentidad=u.usuarioIdentidad
 and sa.estadoSolicitudAprobacion=ea.estadoAprobacionId
 and p.departamentoId=d.departamentoId
 and ea.estadoAprobacionId IN (5,2) and reg.idRegion=p.regionProyecto and reg.idRegion=$region;";
 $solicitudes = obtenerRegistros($sqlstr);
 return $solicitudes;
}

function agregarComentarioAprobacion($solicitudId, $comentario, $estado){
  $sqlstr="UPDATE `tblsolicitudaprobacion`
SET
`estadoSolicitudAprobacion` = %d,
`comentarioAprobacion` ='%s',
`solicitudAprobacionFecha` = CURDATE()
WHERE `solicitudAprobacionId` = %d;";
$sqlstr = sprintf($sqlstr, $estado,$comentario,$solicitudId);
  if(ejecutarNonQuery($sqlstr)){
  return ejecutarNonQueryConErrores($sqlstr);
  }
}

function obtenerAprobacion(){
    $solicitudes = array();
    $sqlstr = "SELECT
	if(ea.estadoAprobacionId=2 ,true,false) 'aprobado',
	if(ea.estadoAprobacionId=3 || ea.estadoAprobacionId=1 || ea.estadoAprobacionId=4,true,false) 'reintentar',
    if(exists(select * from tblsolicitudrecepcion as sr where sr.solicitudAprobacionId=sa.solicitudAprobacionId),false,true) 'recepcion',
    if(exists(select * from tblsolicituddespeje as sd where sd.tblsolicitudaprobacion_solicitudAprobacionId=sa.solicitudAprobacionId),false,true) 'despeje',
    sa.comentarioAprobacion, p.proyectoId, p.proyectoNombre, p.proyectoNombrePropietario,
    p.proyectoIdentidadPropietario,sa.codigoAprobacion, sa.solicitudAprobacionId, ea.estadoAprobacionId,
    ea.estadoAprobacionDescripcion, dep.departamentoDescripcion, p.proyectoDireccion,
    p.proyectoDescrpcion, p.proyectoLatitud, p.proyectoLongitud,  p.proyectoTelefonoPropietario,
    p.proyectoCelularPropietario,  p.proyectoEmailPropietario,  p.proyectoDireccionPropietario,
    sa.solicitudAaprobacionMontoEstimado,  sa.solicitudAprobacionCosto
    FROM tblsolicitudaprobacion as sa,  tblproyectos as p,
    tblestadoaprobacion as ea,  tbldepartamentos as dep
    where p.proyectoId=sa.proyectoId
    and sa.estadoSolicitudAprobacion=ea.estadoAprobacionId and p.departamentoId=dep.departamentoId and p.usuarioIdentidad='%s';
    ";
    $sqlstr = sprintf($sqlstr, $_SESSION["userName"]);
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function actualizarAprobacion($monto, $costo, $aprobacionId){
  $insertSQL = "UPDATE `tblsolicitudaprobacion`
SET
`solicitudAaprobacionMontoEstimado` = %f,
`solicitudAprobacionCosto` = %f,
`estadoSolicitudAprobacion` = 4,
`comentarioAprobacion` = ''
WHERE `solicitudAprobacionId` = %d";
$insertSQL = sprintf($insertSQL,$monto, $costo, $aprobacionId);

return ejecutarNonQueryConErrores($insertSQL);
}


function pagarTimbre($idFactura){
  $insertSQL = "UPDATE `cimeqh`.`tblsolicitudaprobacion`
SET `estadoPago` = 1
WHERE `idFactura` = %d;";
$insertSQL = sprintf($insertSQL,$idFactura);

return ejecutarNonQueryConErrores($insertSQL);
}

 ?>
