<?php

require_once("libs/dao.php");

function registrarDespeje($tiempo,$cuadrillas,$personal,$fecha,$aprobacionId){
  $insertSQL = "INSERT INTO `cimeqh`.`tblsolicituddespeje`
  (`solicitudDespejeHoras`,`solicitudDespejeCuadrillas`,
    `solicitudDespejeCantidadPersonal`,`solicitudDespejeFecha`,
    `tblsolicitudaprobacion_solicitudAprobacionId`,`estadoDespejeId`,
    `fechaRegistro`)VALUES(%d,%d,%d,'%s',%d,4,now());";
     $insertSQL = sprintf($insertSQL,$tiempo,$cuadrillas,$personal,$fecha,$aprobacionId);
     if(ejecutarNonQuery($insertSQL)){$ultimoID=getLastInserId();
       return $ultimoID;}
}
function actualizarDespeje($tiempo,$cuadrillas,$personal,$fecha,$despejeId){  $insertSQL = "UPDATE `tblsolicituddespeje`SET`solicitudDespejeHoras` =%d,`solicitudDespejeCuadrillas` = %d,`solicitudDespejeCantidadPersonal` = %d,`solicitudDespejeFecha` = '%s',`estadoDespejeId` = 4,`comentarioDespeje` = ''WHERE `solicitudDespejeId` = %d;";
  $insertSQL = sprintf($insertSQL,$tiempo,$cuadrillas,$personal,$fecha,$despejeId);

  if (ejecutarNonQuery($insertSQL)) {
    return getLastInserId();
  }

}
function verSolicitudesDespejeENEERegSupervision($region){  $solicitud = array();  $sqlrt = "SELECT tbled.estadoDespejeDescripcion,solicitudDespejeId,solicitudDespejeHoras,solicitudDespejeCuadrillas,solicitudDespejeCantidadPersonal,solicitudDespejeFecha, proyectoNombrePropietario,proyectoIdentidadPropietario,proyectoDescrpcion,proyectoLatitud,proyectoLongitud,departamentoDescripcion,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',proyectoNombre,proyectoDescrpcion,usuarioNumeroColegiacion,proyectoDireccion,proyectoTelefonoPropietario,proyectoEmailPropietario,proyectoEmailPropietario,proyectoIdentidadPropietario,usuarioCelular,usuarioTelefono,proyectoCelularPropietario,proyectoTelefonoPropietario,proyectoDireccionPropietarioFROM tblsolicituddespeje tblsd,tblsolicitudaprobacion tblsa, tblproyectos tblp, tblusuarios tblu,  tblregion as reg,tbldepartamentos tblde, tblestadodespeje tbledwhere tblsd.tblsolicitudaprobacion_solicitudAprobacionId=tblsa.solicitudAprobacionId andtbled.estadoDespejeId=tblsd.estadoDespejeIdand tblsa.proyectoId=tblp.proyectoId and tblde.departamentoId=tblp.departamentoId andtblp.usuarioIdentidad=tblu.usuarioIdentidad and tblsd.estadoDespejeId IN (1,2,5) and reg.idRegion=tblp.regionProyecto and reg.idRegion=$region;";$solicitud = obtenerRegistros($sqlrt);return $solicitud;}function verSolicitudesDespejeENEERegAprobacion($region){  $solicitud = array();  $sqlrt = "SELECT tbled.estadoDespejeDescripcion,solicitudDespejeId,solicitudDespejeHoras,solicitudDespejeCuadrillas,solicitudDespejeCantidadPersonal,solicitudDespejeFecha, proyectoNombrePropietario,proyectoIdentidadPropietario,proyectoDescrpcion,proyectoLatitud,proyectoLongitud,departamentoDescripcion,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',proyectoNombre,proyectoDescrpcion,usuarioNumeroColegiacion,proyectoDireccion,proyectoTelefonoPropietario,proyectoEmailPropietario,proyectoEmailPropietario,proyectoIdentidadPropietario,usuarioCelular,usuarioTelefono,proyectoCelularPropietario,proyectoTelefonoPropietario,proyectoDireccionPropietarioFROM tblsolicituddespeje tblsd,tblsolicitudaprobacion tblsa, tblproyectos tblp, tblusuarios tblu,  tblregion as reg,tbldepartamentos tblde, tblestadodespeje tbledwhere tblsd.tblsolicitudaprobacion_solicitudAprobacionId=tblsa.solicitudAprobacionId andtbled.estadoDespejeId=tblsd.estadoDespejeIdand tblsa.proyectoId=tblp.proyectoId and tblde.departamentoId=tblp.departamentoId andtblp.usuarioIdentidad=tblu.usuarioIdentidad and tblsd.estadoDespejeId IN (2,5) and reg.idRegion=tblp.regionProyecto and reg.idRegion=$region;";$solicitud = obtenerRegistros($sqlrt);return $solicitud;}
function verSolicitudesDespejeAdminCimeqh(){
    $solicitudFactibilidad = array();
    $sqlstr = "SELECT if(tbled.estadoDespejeId!=1 and tbled.estadoDespejeId!=2,true,false)'aprobado',tbled.estadoDespejeId, tbled.estadoDespejeDescripcion,solicitudDespejeId,solicitudDespejeHoras,solicitudDespejeCuadrillas,solicitudDespejeCantidadPersonal,solicitudDespejeFecha, proyectoNombrePropietario,proyectoIdentidadPropietario,proyectoDescrpcion,proyectoLatitud,proyectoLongitud,departamentoDescripcion,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',proyectoNombre,proyectoDescrpcion,usuarioNumeroColegiacion,proyectoDireccion,proyectoTelefonoPropietario,proyectoEmailPropietario,proyectoEmailPropietario,proyectoIdentidadPropietario,usuarioCelular,usuarioTelefono,proyectoCelularPropietario,proyectoTelefonoPropietario,proyectoDireccionPropietarioFROM tblsolicituddespeje tblsd,tblsolicitudaprobacion tblsa, tblproyectos tblp, tblusuarios tblu,tbldepartamentos tblde, tblestadodespeje tbledwhere tblsd.tblsolicitudaprobacion_solicitudAprobacionId=tblsa.solicitudAprobacionId andtbled.estadoDespejeId=tblsd.estadoDespejeIdand tblsa.proyectoId=tblp.proyectoId and tblde.departamentoId=tblp.departamentoId andtblp.usuarioIdentidad=tblu.usuarioIdentidad;";    $solicitudFactibilidad = obtenerRegistros($sqlstr);
    return $solicitudFactibilidad;
}function verSolicitudesDespejeRegCimeqh($region){    $solicitudFactibilidad = array();    $sqlstr = "SELECT tbled.estadoDespejeDescripcion,solicitudDespejeId,solicitudDespejeHoras,solicitudDespejeCuadrillas,solicitudDespejeCantidadPersonal,solicitudDespejeFecha, proyectoNombrePropietario,proyectoIdentidadPropietario,proyectoDescrpcion,proyectoLatitud,proyectoLongitud,departamentoDescripcion,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',proyectoNombre,proyectoDescrpcion,usuarioNumeroColegiacion,proyectoDireccion,proyectoTelefonoPropietario,proyectoEmailPropietario,proyectoEmailPropietario,proyectoIdentidadPropietario,usuarioCelular,usuarioTelefono,proyectoCelularPropietario,proyectoTelefonoPropietario,proyectoDireccionPropietarioFROM cimeqh.tblsolicituddespeje tblsd,cimeqh.tblsolicitudaprobacion tblsa, cimeqh.tblproyectos tblp, cimeqh.tblusuarios tblu, cimeqh.tblregion as reg,cimeqh.tbldepartamentos tblde, cimeqh.tblestadodespeje tbledwhere tblsd.tblsolicitudaprobacion_solicitudAprobacionId=tblsa.solicitudAprobacionId andtbled.estadoDespejeId=tblsd.estadoDespejeIdand tblsa.proyectoId=tblp.proyectoId and tblde.departamentoId=tblp.departamentoId andtblp.usuarioIdentidad=tblu.usuarioIdentidad and tblsd.estadoDespejeId IN (1,4) and reg.idRegion=tblp.regionProyecto and reg.idRegion=$region;";    $solicitudFactibilidad = obtenerRegistros($sqlstr);    return $solicitudFactibilidad;}

function verSolicitudesDespejeEneeAdmin(){
    $solicitudFactibilidad = array();
    $sqlstr = "SELECT tbled.estadoDespejeDescripcion,solicitudDespejeId,solicitudDespejeHoras,solicitudDespejeCuadrillas,solicitudDespejeCantidadPersonal,
solicitudDespejeFecha, proyectoNombrePropietario,proyectoIdentidadPropietario,proyectoDescrpcion,
proyectoLatitud,proyectoLongitud,departamentoDescripcion,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',
usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',proyectoNombre,proyectoDescrpcion,
usuarioNumeroColegiacion,proyectoDireccion,proyectoTelefonoPropietario,proyectoEmailPropietario,
proyectoEmailPropietario,proyectoIdentidadPropietario,usuarioCelular,usuarioTelefono,proyectoCelularPropietario,
proyectoTelefonoPropietario,proyectoDireccionPropietario
FROM tblsolicituddespeje tblsd,tblsolicitudaprobacion tblsa, tblproyectos tblp, tblusuarios tblu,
tbldepartamentos tblde, tblestadodespeje tbled
where tblsd.tblsolicitudaprobacion_solicitudAprobacionId=tblsa.solicitudAprobacionId and
tbled.estadoDespejeId=tblsd.estadoDespejeId
and tblsa.proyectoId=tblp.proyectoId and tblde.departamentoId=tblp.departamentoId and
tblp.usuarioIdentidad=tblu.usuarioIdentidad and tblsd.estadoDespejeId IN (1,2);";
    $solicitudFactibilidad = obtenerRegistros($sqlstr);
    return $solicitudFactibilidad;
}

function agregarComentarioDespeje($solicitudId, $comentario, $estado,$costo=0){
  $sqlstr="UPDATE `tblsolicituddespeje`
  SET  `estadoDespejeId` = %d,
  `solicitudDespejeCosto` = %f,
  `comentarioDespeje` = '%s'
  WHERE `solicitudDespejeId` = %d;";
  $sqlstr = sprintf($sqlstr,$estado,$costo,$comentario,$solicitudId);

  return ejecutarNonQueryConErrores($sqlstr);
}

function posponerDespeje($solicitudId, $costo, $fecha,$comentario,$estado){
  $sqlstr="UPDATE `tblsolicituddespeje`
  SET  `estadoDespejeId` = %d,
  `solicitudDespejeCosto` = %f,
  `comentarioDespeje` = '%s',
  `solicitudDespejeFecha`='%s'
  WHERE `solicitudDespejeId` = %d;";
  $sqlstr = sprintf($sqlstr,$estado,$costo,$comentario,$fecha,$solicitudId);

  return ejecutarNonQueryConErrores($sqlstr);
}


function obtenerSolicitudDespejePorId($solicitudId){
$proyecto = array();
$sqlstr = "SELECT estadoDespejeDescripcion,solicitudDespejeId,solicitudDespejeHoras,solicitudDespejeCuadrillas,solicitudDespejeCantidadPersonal,
solicitudDespejeFecha, proyectoNombrePropietario,proyectoIdentidadPropietario,proyectoDescrpcion,
proyectoLatitud,proyectoLongitud,departamentoDescripcion,concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',
usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',proyectoNombre,proyectoDescrpcion,
usuarioNumeroColegiacion,proyectoDireccion,proyectoTelefonoPropietario,proyectoEmailPropietario,
proyectoEmailPropietario,proyectoIdentidadPropietario,usuarioCelular,usuarioTelefono,proyectoCelularPropietario,
proyectoTelefonoPropietario,proyectoDireccionPropietario
FROM tblsolicituddespeje tblsd,tblsolicitudaprobacion tblsa, tblproyectos tblp, tblusuarios tblu,
tbldepartamentos tblde, tblestadodespeje tbled
where tblsd.tblsolicitudaprobacion_solicitudAprobacionId=tblsa.solicitudAprobacionId and
tbled.estadoDespejeId=tblsd.estadoDespejeId
and tblsa.proyectoId=tblp.proyectoId and tblde.departamentoId=tblp.departamentoId and
tblp.usuarioIdentidad=tblu.usuarioIdentidad and solicitudDespejeId=%d;";
$sqlstr = sprintf($sqlstr, $solicitudId);
$proyecto = obtenerUnRegistro($sqlstr);
return $proyecto;
}

function obtenerDespeje(){
    $solicitudes = array();
    $sqlstr = "SELECT if(ed.estadoDespejeId=1 || ed.estadoDespejeId=3 || ed.estadoDespejeId=4,true,false) 'reintentar',
if(ed.estadoDespejeId=3 ,true,false) 'pospuesto',

sd.solicitudDespejeId,ed.estadoDespejeDescripcion,sd.solicitudDespejeId,sd.estadoDespejeId,
sa.solicitudAprobacionId,p.proyectoId,p.proyectoNombre,p.proyectoNombrePropietario,
p.proyectoIdentidadPropietario,sd.solicitudDespejeFecha,sd.solicitudDespejeHoras,sd.solicitudDespejeCantidadPersonal,
sd.solicitudDespejeCantidadPersonal,sd.comentarioDespeje,dep.departamentoDescripcion,p.proyectoDireccion,
p.proyectoDescrpcion,p.proyectoLatitud,p.proyectoLongitud,p.proyectoCelularPropietario,p.proyectoTelefonoPropietario,
p.proyectoEmailPropietario,p.proyectoDireccionPropietario,sd.solicitudDespejeCantidadPersonal,sd.solicitudDespejeCuadrillas,
DATE_FORMAT(sd.solicitudDespejeFecha,'%d/%m/%Y') 'fecha',sd.solicitudDespejeHoras,sd.solicitudDespejeCosto
FROM tblsolicituddespeje as sd,tblsolicitudaprobacion as sa,tblproyectos as p,
tblestadodespeje as ed, tbldepartamentos as dep
where p.proyectoId=sa.proyectoId and
sa.solicitudAprobacionId=sd.tblsolicitudaprobacion_solicitudAprobacionId and
sd.estadoDespejeId=ed.estadoDespejeId and dep.departamentoId=p.departamentoId and p.usuarioIdentidad='".$_SESSION["userName"]."';";
    //$sqlstr = sprintf($sqlstr);
    $solicitudes = obtenerRegistros($sqlstr);
    return $solicitudes;
}

function obtenerUnDespeje($id){
    $solicitudes = array();
    $sqlstr = "SELECT *
    FROM tblsolicituddespeje as sd, tblsolicitudaprobacion as sa, tblproyectos as p, tblestadodespeje as ed
    where p.proyectoId=sa.proyectoId
    and sa.solicitudAprobacionId=sd.tblsolicitudaprobacion_solicitudAprobacionId
    and sd.estadoDespejeId=ed.estadoDespejeId
    and sd.solicitudDespejeId=%d;";
    $sqlstr = sprintf($sqlstr, $id);
    $solicitudes = obtenerUnRegistro($sqlstr);
    return $solicitudes;
}

function pagarDespeje($id, $estadoId){
  $sqlstr="UPDATE `tblsolicituddespeje`
  SET  `estadoDespejeId` = %d
  WHERE `solicitudDespejeId` = %d;";
$sqlstr = sprintf($sqlstr,$estadoId,$id);

  return ejecutarNonQueryConErrores($sqlstr);
}

 ?>
