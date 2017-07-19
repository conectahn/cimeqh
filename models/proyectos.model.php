<?php
    require_once("libs/dao.php");

    function obtenerDepartamentos(){
        $departamentos = array();
        $sqlstr = "select * from tbldepartamentos;";
        $departamentos = obtenerRegistros($sqlstr);
        return $departamentos;
    }

    function obtenerTipoProyectos(){
        $tipos = array();
        $sqlstr = "select * from tbltipoproyectos;";
        $tipos = obtenerRegistros($sqlstr);
        return $tipos;
    }

    function obtenerVoltajes(){
        $voltajes = array();
        $sqlstr = "select * from tblvoltajes;";
        $voltajes = obtenerRegistros($sqlstr);
        return $voltajes;
    }



    function obtenerConexions(){
        $conexiones = array();
        $sqlstr = "select * from tblconexiones;";
        $conexiones = obtenerRegistros($sqlstr);
        return $conexiones;
    }

    function obtenerTodosLosProyectos(){
        $departamentos = array();
        $sqlstr = "select
	(if (exists (select * from tblsolicitudaprobacion as sa where p.proyectoId=sa.proyectoId), false,true)) 'aprobacion',
    (if (exists (select * from tblsolicitudfactibilidad as sf where p.proyectoId=sf.proyectoId), false,true)) 'factibilidad',
    p.proyectoId,
    p.proyectoNombrePropietario,
    p.proyectoNombre,
    p.proyectoDescrpcion,
    d.departamentoDescripcion,
    p.proyectoNombrePropietario,
    p.proyectoIdentidadPropietario,
    p.proyectoDireccion,
    p.proyectoLatitud,
    p.proyectoLongitud,
    p.proyectoCelularPropietario,
    p.proyectoTelefonoPropietario,
    p.proyectoEmailPropietario,
    p.proyectoDireccionPropietario
    from tblproyectos as p, tbldepartamentos as d
    where d.departamentoId=p.departamentoId and p.usuarioIdentidad='%s';";
    $sqlstr = sprintf($sqlstr, $_SESSION["userName"]);
    $departamentos = obtenerRegistros($sqlstr);
    return $departamentos;
    }

    function obtenerRegion(){
    $region = array();
    $sqlstr = "SELECT * FROM cimeqh.tblregion;";
    $sqlstr = sprintf($sqlstr, $_SESSION["userName"]);
    $region = obtenerRegistros($sqlstr);
    return $region;
    }



    function obtnerProyectosPorId($proyectoId){
        $proyecto = array();
        $sqlstr = "select * from tblproyectos as p, tbldepartamentos as d where d.departamentoId=p.departamentoId and p.proyectoId=%d;";
        $sqlstr = sprintf($sqlstr, $proyectoId);
        $proyecto = obtenerUnRegistro($sqlstr);
        return $proyecto;
    }

    function registrarProyecto($txtNombrePropietario,
    $txtIdentidadPropietario,$txtDireccionPropietario,$txtEmailPropietario,
    $txtTelefonoPropietario,$txtCelularPropietario,$txtProyectoNombre,
    $txtLatitud,$txtLongitud,$txtDescripcionProyecto,$cmbDepartamentoProyecto,
    $txtDireccionProyecto,$txtProyectoNombre,$tipos,$zonaUtm,$region,$fecha){
    $insertSQL = "INSERT INTO `cimeqh`.`tblproyectos`
      (`proyectoNombrePropietario`,`proyectoIdentidadPropietario`,
        `proyectoCelularPropietario`,`proyectoEmailPropietario`,
        `proyectoDireccionPropietario`,`proyectoTelefonoPropietario`,
      `departamentoId`, `proyectoDescrpcion`,`proyectoLatitud`,`proyectoLongitud`,
        `proyectoDireccion`, `usuarioIdentidad`,`proyectoNombre`,`tipoId`,
      `regionProyecto`,`zonaUtm`,fechaRegistro)
        VALUES
        ('%s','%s','%s','%s','%s','%s','%s','%s',%f,%f,'%s','%s','%s',%d,%d,'%s',NOW());";
          $insertSQL = sprintf($insertSQL,
                               valstr($txtNombrePropietario),
                               valstr($txtIdentidadPropietario),
                               valstr($txtCelularPropietario),
                               valstr($txtEmailPropietario),
                               valstr($txtDireccionProyecto),
                               valstr($txtTelefonoPropietario),
                               $cmbDepartamentoProyecto,
                               valstr($txtDescripcionProyecto),
                               $txtLatitud,
                               $txtLongitud,//a
                               valstr($txtDireccionProyecto),
                               $_SESSION["userName"],
                               valstr($txtProyectoNombre),
                               $tipos,
                               $region,
                               $zonaUtm);
          return ejecutarNonQueryConErrores($insertSQL);
        }


/*
function registrarProyecto($txtNombrePropietario,
$txtIdentidadPropietario,
$txtDireccionPropietario,
$txtEmailPropietario,
$txtTelefonoPropietario,
$txtCelularPropietario,
$txtProyectoNombre,
$txtLatitud,
$txtLongitud,
$txtDescripcionProyecto,
$cmbDepartamentoProyecto,
$txtDireccionProyecto,
$txtProyectoNombre,
$tipos,
$zonaUtm,
$region){
$insertSQL = "INSERT INTO `tblProyectos` (`proyectoNombrePropietario`,
`proyectoIdentidadPropietario`,`proyectoCelularPropietario`,
`proyectoEmailPropietario`,`proyectoDireccionPropietario`,
`proyectoTelefonoPropietario`,`departamentoId`,
`proyectoDescrpcion`,`proyectoLatitud`,`proyectoLongitud`,
`proyectoDireccion`,`usuarioIdentidad`,`proyectoNombre`,
`tipoId`,`zonaUtm`,`usuarioRegion`)
values ('%s','%s','%s','%s','%s','%s',%d,'%s',%f,%f,'%s','%s','%s',%d,'%s',%d);";
      $insertSQL = sprintf($insertSQL,
                           valstr($txtNombrePropietario),
                           valstr($txtIdentidadPropietario),
                           valstr($txtDireccionPropietario),
                           valstr($txtCelularPropietario),
                           valstr($txtEmailPropietario),
                           valstr($txtTelefonoPropietario),
                           $cmbDepartamentoProyecto,
                           valstr($txtDescripcionProyecto),
                           $txtLatitud,
                           $txtLongitud,
                           valstr($txtDireccionProyecto),
                           $_SESSION["userName"],
                           valstr($txtProyectoNombre),
                           $tipos,
                           $zonaUtm, $region);
      return ejecutarNonQueryConErrores($insertSQL);
    }*/
 ?>
