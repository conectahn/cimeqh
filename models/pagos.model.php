<?php

require_once("libs/dao.php");

  function obtenerPagosPendientes($usuarioId){

      $solicitudes = array();

$sqlstr = "select fac.idFacturas,fac.numeroFactua, fac.idUsuario,fac.fechaRegistro,fac.montoPagado,fac.fechaPago,
concat(usuarioPrimerNombre, ' ' ,usuarioSegundoNombre ,' ',
usuarioPrimerApellido, ' ', usuarioSegundoApellido) 'ingenieroNombre',con.conceptoDescripcion
from tblfacturas as fac, tblusuarios as us, tblconceptos as con
where fac.idUsuario=us.usuarioIdentidad and fac.idConcepto=con.idConecpto and fac.idUsuario='0801-1995';";
$sqlstr=sprintf($sqlstr,valstr($usuarioId));
$solicitudes = obtenerRegistros($sqlstr);

return $solicitudes;

  }








?>
