<?php
  require_once("libs/dao.php");

  function obtenerPlanosAprobacion($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
    select
    	B.proyectoId,
        B.proyectoNombre,
        B.regionDescripcion as region,
        tbla.estadoAprobacionDescripcion
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
        ON (B.proyectoId = A.proyectoId), tblestadoaprobacion tbla
    where
    	A.fechaRegistroSolicitud between '$fecha1' and '$fecha2'
      and A.estadoSolicitudAprobacion in (1,2) and tbla.estadoAprobacionId = A.estadoSolicitudAprobacion;";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerPlanosRecepcion($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
    select
      B.regionDescripcion as region,
      B.proyectoId as id,
      B.proyectoNombre as nombre,
      tbla.estadoRecepcionDescripcion as estado
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
      ON (B.proyectoId = A.proyectoId), tblestadorecepcion tbla
    where
      tblrp.fechaRegistroSolicitud between '$fecha1' and '$fecha2'
      and tblrp.solicitudRecepcioEstado in (1,2) and tbla.estadoRecepcionId = tblrp.solicitudRecepcioEstado;
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
          B.regionDescripcion as region
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
        and A.estadoFactibilidadId in (1,2)
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
          B.regionDescripcion as region
      from
      	tblsolicituddespeje tbldp
      	inner join
      	(
      		select solicitudAprobacionId,proyectoId,estadoSolicitudAprobacion from tblsolicitudaprobacion
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
      	tbldp.fechaRegistro between '$fecha1' and '$fecha2'
        and tbldp.estadoDespejeId in (1,2)
      group by B.regionDescripcion;
    ";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerIngresos($fecha1,$fecha2)
  /*******************************************************************************************************
  se envia el codigo del concepto que se quiere ver pero si se quieren ver los ingresos totales
  independientemente de los conceptos se enviara un 0 como parametro
  **********************************************************************************************************/
  {
    $ingresos = "";
    $sqlrt = "";
    $sqlrt = "
    select sum(montoPagado) as monto,tblc.conceptoDescripcion as concepto from tblfacturas tblf,tblconceptos tblc
    where tblf.idConcepto = tblc.idConecpto and fechaPago between '$fecha1' and '$fecha2'
    and tblf.estado = 1 group by tblc.conceptoDescripcion;
      ";
    $ingresos = obtenerRegistros($sqlrt);
    return $ingresos;
  }

  function obtenerIngresosCuotas($fecha1,$fecha2)
  {
    $ingresos = array();
    $sqlrt = "
      select
      	sum(montoPagado) as total,
          A.nombre,
          A.usuarioNumeroColegiacion
      from
      	cimeqh.tblfacturas tblf
          inner join
          (
      		select
      			usuarioIdentidad,
      			concat(usuarioPrimerNombre ,' ', usuarioPrimerApellido) as nombre,
      			concat(usuarioPrimerNombre , ' ' , usuarioPrimerApellido) as nombre,
                  usuarioNumeroColegiacion
      		from
      			cimeqh.tblusuarios
          ) A
          on (A.usuarioIdentidad = tblf.idUsuario)
      where
      	idConcepto = 1 and
          estado = 1 and
          tblf.fechaPago between '$fecha1' and '$fecha2'
      group by A.nombre,A.usuarioNumeroColegiacion;
    ";
    $ingresos = obtenerRegistros($sqlrt);
    return $ingresos;
  }

  function obtenerDisenosAprobacion($fecha1,$fecha2){
    $diseños = array();
    $sqlrt = "
    select
         B.regionDescripcion as region,
         B.proyectoNombre as nombre,
         B.proyectoId as id,
        tbla.estadoAprobacionDescripcion as estado
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
          ON (B.proyectoId = A.proyectoId),
          tblestadoaprobacion tbla
      where
        A.estadoSolicitudAprobacion in (1,2)
        and tbla.estadoAprobacionId = A.estadoSolicitudAprobacion
        and  A.fechaRegistroSolicitud between '$fecha1' and '$fecha2' ;
    ";
    $diseños = obtenerRegistros($sqlrt);
    return $diseños;
  }

  function obtenerDisenosRecepcion($fecha1,$fecha2)
  {
    $diseños = array();
    $sqlrt = "
    select
       tblp.proyectoNombre,tblp.proyectoId,tbler.estadoRecepcionDescripcion as estado,tblr.regionDescripcion as region
    from
     tblsolicitudrecepcion tblrp,tblsolicitudaprobacion tblap, tblproyectos tblp, tblregion tblr,tblestadorecepcion tbler
  where tblrp.solicitudAprobacionId = tblap.solicitudAprobacionId and tblap.proyectoId = tblp.proyectoId
    and tblp.regionProyecto = tblr.idRegion and tblrp.solicitudRecepcioEstado = tbler.estadoRecepcionId
    and tblrp.solicitudRecepcioEstado in (1,2) and tblrp.fechaRegistroSolicitud between '$fecha1' and '$fecha2';
    ";
    $diseños = obtenerRegistros($sqlrt);
    return $diseños;
  }

    function obtenerDisenosFactibilidad($fecha1,$fecha2)
    {
      /***********************************************************************************************************
        $estadoSolicitud debe ser 1 o 2 dado que se quiera ver los recibidos o aprobados respectivamente
      ***********************************************************************************************************/
      $diseños = array();
      $sqlrt="SELECT fa.proyectoId, p.proyectoNombre, e.estadoFactibilidadDescripcion,tblr.regionDescripcion
      FROM tblsolicitudfactibilidad fa, tblproyectos p, tblestadofactibilidad e,tblregion tblr
      where fa.proyectoId=p.proyectoId and fa.estadoFactibilidadId=e.estadoFactibilidadId
      and fa.fechaSolicitud between '$fecha1' and '$fecha2' and fa.estadoFactibilidadId in (1,2) and tblr.idRegion = p.regionProyecto;";
      $diseños = obtenerRegistros($sqlrt);
      return $diseños;
    }

   function obtenerDisenosDespeje($fecha1,$fecha2)
    {
      $diseños = array();
      $sqlrt = "
      select
        B.regionDescripcion,
        B.proyectoNombre,
        B.proyectoId,
        tbla.estadoAprobacionDescripcion
      from
        tblsolicituddespeje tbldp
        inner join
        (
          select solicitudAprobacionId,proyectoId,estadoSolicitudAprobacion from tblsolicitudaprobacion
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
        ON (B.proyectoId = A.proyectoId),tblestadoaprobacion tbla
      where
        tbldp.fechaRegistro between '$fecha1' and '$fecha2'
        and A.estadoSolicitudAprobacion  in (1,2) and tbla.estadoAprobacionId = A.estadoSolicitudAprobacion;
      ";
      $diseños = obtenerRegistros($sqlrt);
      return $diseños;
    }

    /*function usuarioAprueba($fecha1,$fecha2)
    {
      $usuarios = array();
      $sqlrt = "
        select
        	A.nombreUsuario,
            B.proyectoNombre
        from cimeqh.tblsolicitudaprobacion tblsp
        inner join
        (
<<<<<<< HEAD
        	select concat(usuarioPrimerNombre,' ', usuarioPrimerApellido) as nombreUsuario, usuarioIdentidad from cimeqh.tblusuarios
=======
        	select concat(usuarioPrimerNombre, ' ', usuarioPrimerApellido) as nombreUsuario, usuarioIdentidad from cimeqh.tblusuarios
>>>>>>> master
        ) A
        on (A.usuarioIdentidad = tblsp.usuarioIdentidad)
        inner join
        (
        	select proyectoNombre,proyectoId from cimeqh.tblproyectos
        ) B
        on (B.proyectoId = tblsp.proyectoId)
        where tblsp.fechaRegistroSolicitud between $fecha1 and $fecha2;
      ";
      $usuario = obtenerRegistros($sqlrt);
      return $usuario;
    }*/
?>
