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
        and tblrp.solicitudRecepcioEstado in (1,2)
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
          B.regionDescripcion
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

  function obtenerIngresos($fecha1,$fecha2,$concepto)
  /*******************************************************************************************************
  se envia el codigo del concepto que se quiere ver pero si se quieren ver los ingresos totales
  independientemente de los conceptos se enviara un 0 como parametro
  **********************************************************************************************************/
  {
    $ingresos = "";
    $sqlrt = "";
    if($concepto != 0)
    {
      $sqlrt = "
        select
        	sum(montoPagado) as monto
        from
        	tblfacturas
        where
        	idConcepto = $concepto and
          fechaPago between '$fecha1' and '$fecha2' and
          estado = 1;
      ";
    }
    else {
      $sqlrt = "
        select
        	sum(montoPagado) as monto
        from
        	tblfacturas
        where
          fechaPago between '$fecha1' and '$fecha2' and
          estado = 1;
      ";
    }
    $ingresos = obtenerUnRegistro($sqlrt);
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

  function obtenerDisenosAprobacion($fecha1,$fecha2,$estadoSolicitud)
/*************************************************************************************************************
  $estadoSolicitud debe ser 1 o 2 dado que se quiera ver los recibidos o aprobados respectivamente
*************************************************************************************************************/
  {
    $diseños = array();
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
        and A.estadoSolicitudAprobacion = $estadoSolicitud
      group by B.regionDescripcion;
    ";
    $diseños = obtenerRegistros($sqlrt);
    return $diseños;
  }

  function obtenerDisenosRecepcion($fecha1,$fecha2,$estadoSolicitud)
  {
    /*************************************************************************************************************
      $estadoSolicitud debe ser 1 o 2 dado que se quiera ver los recibidos o aprobados respectivamente
    *************************************************************************************************************/
    $diseños = array();
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
      and A.solicitudRecepcioEstado = $estadoSolicitud
    group by B.regionDescripcion;
    ";
    $diseños = obtenerRegistros($sqlrt);
    return $diseños;

    function obtenerDisenosFactibilidad($fecha1,$fecha2,$estadoSolicitud)
    {
      /***********************************************************************************************************
        $estadoSolicitud debe ser 1 o 2 dado que se quiera ver los recibidos o aprobados respectivamente
      ***********************************************************************************************************/
      $diseños = array();
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
          and A.estadoFactibilidad = $estadoSolicitud
        group by B.regionDescripcion;
      ";
      $diseños = obtenerRegistros($sqlrt);
      return $diseños;
    }

    function obtenerDisenosDespeje($fecha1,$fecha2,$estadoSolicitud)
    {
      $diseños = array();
      $sqlrt = "
        select
          count(1) as cantidad_proyectos_despeje,
            B.regionDescripcion
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
          tbldp.fechaRegistro between '$fecha1' and '$fecha1'
          and A.estadoSolicitudAprobacion  = $estadoSolicitud
        group by B.regionDescripcion;
      ";
      $diseños = obtenerRegistros($sqlrt);
      return $diseños;
    }

    function usuarioAprueba($fecha1,$fecha2)
    {
      $usuarios = array();
      $sqlrt = "
        select
        	A.nombreUsuario,
            B.proyectoNombre
        from cimeqh.tblsolicitudaprobacion tblsp
        inner join
        (
        	select concat(usuarioPrimerNombre, ' ', usuarioPrimerApellido) as nombreUsuario, usuarioIdentidad from cimeqh.tblusuarios
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
    }
  }
?>
