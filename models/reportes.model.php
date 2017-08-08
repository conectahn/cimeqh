<?php
  require_once("libs/dao.php");

  function obtenerPlanosAprobacion($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
    select
    	count(1) as cantidad_proyectos_aprobacion,
        B.regionDescripcion
    from
    	tblsolicitudaprobacion A
    	inner join
        (
    		select
    			tblr.regionDescripcion,
    			tblp.proyectoId,
    			tblp.proyectoNombre
    		from
    			tblproyectos tblp,
    			tblregion tblr
    		where
    			tblp.regionProyecto = tblr.idRegion
        ) B
        ON (B.proyectoId = A.proyectoId)
    where
    	A.fechaRegistroSolicitud between '$fecha1' and '$fecha2'
      and A.estadoSolicitudAprobacion in (1,2)
    group by B.regionDescripcion;";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerPlanosRecepcion($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
      select
      	count(1) as cantidad_proyectos_recepcion,
          B.regionDescripcion
      from
      	tblsolicitudrecepcion tblrp
      	inner join
      	(
      		select solicitudAprobacionId,proyectoId from tblsolicitudaprobacion
      	) A
      	ON A.solicitudAprobacionId = tblrp.solicitudAprobacionId
      	inner join
      	(
      		select
      				tblr.regionDescripcion,
      				tblp.proyectoId,
      				tblp.proyectoNombre
      			from
      				tblproyectos tblp,
      				tblregion tblr
      			where
      				tblp.regionProyecto = tblr.idRegion
      	) B
      	ON (B.proyectoId = A.proyectoId)
      where
      	tblrp.fechaRegistroSolicitud between '$fecha1' and '$fecha2'
        and A.estadoSolicitudAprobacion in (1,2)
      group by B.regionDescripcion;
    ";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerPlanosFactibilidad($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
      select
      	count(1) as cantidad_proyectos_Factibilidad,
          B.regionDescripcion
      from
      	tblsolicitudfactibilidad A
      	inner join
          (
      		select
      			tblr.regionDescripcion,
      			tblp.proyectoId,
      			tblp.proyectoNombre
      		from
      			tblproyectos tblp,
      			tblregion tblr
      		where
      			tblp.regionProyecto = tblr.idRegion
          ) B
          ON (B.proyectoId = A.proyectoId)
      where
      	A.fechaSolicitud between '$fecha1' and '$fecha2'
        and A.estadoSolicitudAprobacion in (1,2)
      group by B.regionDescripcion;
    ";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerPlanosDespeje($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
      select
      	count(1) as cantidad_proyectos_despeje,
          B.regionDescripcion
      from
      	tblsolicituddespeje tbldp
      	inner join
      	(
      		select solicitudAprobacionId,proyectoId from tblsolicitudaprobacion
      	) A
      	ON A.solicitudAprobacionId = tbldp.tblsolicitudaprobacion_solicitudAprobacionId
      	inner join
      	(
      		select
      				tblr.regionDescripcion,
      				tblp.proyectoId,
      				tblp.proyectoNombre
      			from
      				tblproyectos tblp,
      				tblregion tblr
      			where
      				tblp.regionProyecto = tblr.idRegion
      	) B
      	ON (B.proyectoId = A.proyectoId)
      where
      	tbldp.fechaRegistro between '2017-07-26 14:03:50' and '2017-08-26 14:03:50'
        and A.estadoSolicitudAprobacion in (1,2)
      group by B.regionDescripcion;
    ";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerIngresosPorAprobacion($fecha1,$fecha2)
  {
    $ingresos = "";
    $sqlrt = "
      select
      	sum(montoPagado) as monto
      from
      	cimeqh.tblfacturas
      where
      	idConcepto = 2 and
          fechaPago between '2017-05-26 13:23:55' and '2017-08-26 13:23:55' and
          estado = 1;
    ";
    $ingresos = obtenerUnRegistro($sqlrt);
    return $ingresos;
  }
?>
