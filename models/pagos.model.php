<?php

require_once("libs/dao.php");

function obtenerPagosPendientes($usuarioId){
$solicitudes = array();

$sqlstr = "select fac.idFacturas,fac.numeroFactua, fac.idUsuario,fac.fechaRegistro,fac.montoPagado,fac.fechaPago,
concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',
usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',con.conceptoDescripcion
from tblfacturas as fac, tblusuarios as us, tblconceptos as con
where fac.idUsuario=us.usuarioIdentidad and fac.idConcepto=con.idConecpto and fac.idUsuario='$usuarioId';";
$sqlstr=sprintf($sqlstr,valstr($usuarioId));
$solicitudes = obtenerRegistros($sqlstr);

return $solicitudes;
}

function obtenerIdFactura($numeroFactua){
$solicitudes = array();
$sqlstr = "select idFacturas from tblfacturas where numeroFactua='$numeroFactua';";
$sqlstr=sprintf($sqlstr,valstr($numeroFactua));
$solicitudes = obtenerUnRegistro($sqlstr);
return $solicitudes;
}


function agregarFactura($numeroFactua,$usuarioId,$concepto,$monto,$proyectoId){
$sqlstr="INSERT INTO `cimeqh`.`tblfacturas`
(`numeroFactua`,`idUsuario`,`idConcepto`,`fechaRegistro`,`montoPagado`,`proyectoId`)
VALUES
('%s','%s',%d,now(),%f,%d);";
$sqlstr = sprintf($sqlstr, $numeroFactua,$usuarioId,$concepto,$monto,$proyectoId);
return ejecutarNonQueryConErrores($sqlstr);
}
?>
