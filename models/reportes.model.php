<?php
  require_once("libs/dao.php");

  function obtenerPlanosAprobacion($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
    select
    	B.regionDescripcion as region,
        B.proyectoId,
        B.proyectoNombre,
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
    A.estadoSolicitudAprobacion in (1,2) and tbla.estadoAprobacionId = A.estadoSolicitudAprobacion
    and A.fechaRegistroSolicitud between '$fecha1' and '$fecha2';";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerPlanosRecepcion($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
    select
      B.regionDescripcion as region,
      B.proyectoId,
      B.proyectoNombre,
      tbla.estadoRecepcionDescripcion
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
      ON (B.proyectoId = A.proyectoId),tblestadorecepcion tbla
    where
      tblrp.fechaRegistroSolicitud between '$fecha1' and '$fecha2'
      and tblrp.solicitudRecepcioEstado in (1,2) and tbla.estadoRecepcionId = tblrp.solicitudRecepcioId;
    ";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerPlanosFactibilidad($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
    select
      B.regionDescripcion as region,
      B.proyectoId,
      B.proyectoNombre,
      tbla.estadoFactibilidadDescripcion
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
        ON (B.proyectoId = A.proyectoId), tblestadofactibilidad as tbla
    where
      A.estadoFactibilidadId in (1,2) and tbla.estadoFactibilidadId = A.estadoFactibilidadId
      and A.fechaSolicitud between '$fecha1' and '$fecha2';
    ";
    $cantidadPlanos = obtenerRegistros($sqlrt);
    return $cantidadPlanos;
  }

  function obtenerPlanosDespeje($fecha1,$fecha2)
  {
    $cantidadPlanos = array();
    $sqlrt = "
    select
      B.regionDescripcion as region,
      B.proyectoId,
      B.proyectoNombre,
      tbla.estadoDespejeDescripcion
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
      ON (B.proyectoId = A.proyectoId), tblestadodespeje tbla
    where
      tbldp.fechaRegistro between '$fecha1' and '$fecha2'
      and tbldp.estadoDespejeId in (1,2) and tbla.estadoDespejeId = tbldp.estadoDespejeId;
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
    $sqlrt = "select pro.proyectoNombre,con.conceptoDescripcion, reg.regionDescripcion, fa.montoPagado
    from tblfacturas as fa, tblconceptos as con, tblproyectos as pro, tblregion as reg
    where fa.idConcepto=con.idConecpto and pro.proyectoId=fa.proyectoid and reg.idRegion=pro.regionProyecto
    and fa.fechaPago between '$fecha1' and '$fecha2';";
    $ingresos = obtenerRegistros($sqlrt);
    return $ingresos;
  }


  function graficarCimeqhFinanzas($fecha1,$fecha2)
  {
    $ingresos = array();
    $sqlrt = "select con.conceptoDescripcion, sum(fa.montoPagado) as total
    from tblfacturas as fa, tblconceptos as con
    where fa.idConcepto=con.idConecpto
    and fa.fechaPago between '$fecha1' and '$fecha2'
    group by con.conceptoDescripcion;";
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

  function obtenerDisenosAprobacion($fecha1,$fecha2)
/*************************************************************************************************************
  $estadoSolicitud debe ser 1 o 2 dado que se quiera ver los recibidos o aprobados respectivamente
*************************************************************************************************************/
  {
    $diseños = array();
    $sqlrt = "
    select
      B.regionDescripcion,
      B.proyectoId,
      B.proyectoNombre,
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
      and A.estadoSolicitudAprobacion in (1,2) and tbla.estadoAprobacionId = A.estadoSolicitudAprobacion;
    ";
    $diseños = obtenerRegistros($sqlrt);
    return $diseños;
  }

  function obtenerDisenosRecepcion($fecha1,$fecha2)
  {
    /*************************************************************************************************************
      $estadoSolicitud debe ser 1 o 2 dado que se quiera ver los recibidos o aprobados respectivamente
    *************************************************************************************************************/
    $diseños = array();
    $sqlrt = "
    select
      B.regionDescripcion as region,
      B.proyectoId,
      B.proyectoNombre,
      tbla.estadoRecepcionDescripcion as estado
    from
      tblsolicitudrecepcion tblrp
      inner join
      (
        select solicitudAprobacionId,proyectoId,estadoSolicitudAprobacion from tblsolicitudaprobacion
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
      and A.estadoSolicitudAprobacion in (1,2) and tblrp.solicitudRecepcioEstado = tbla.estadoRecepcionId;
    ";
    $diseños = obtenerRegistros($sqlrt);
    return $diseños;
  }

    function obtenerDisenosFactibilidad($fecha1,$fecha2)
    {
      $diseños = array();
      $sqlrt="
      SELECT fa.proyectoId, p.proyectoNombre, e.estadoFactibilidadDescripcion,tble.regionDescripcion as region
            FROM tblsolicitudfactibilidad fa, tblproyectos p, tblestadofactibilidad e,tblregion tble
            where fa.proyectoId=p.proyectoId and fa.estadoFactibilidadId=e.estadoFactibilidadId
            and fa.fechaSolicitud between '$fecha1' and '$fecha2' and fa.estadoFactibilidadId in (1,2) and tble.idRegion = p.regionProyecto;
      ";
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
        tbla.estadoDespejeDescripcion
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
        ON (B.proyectoId = A.proyectoId),tblestadodespeje tbla
      where
        tbldp.fechaRegistro between '$fecha1' and '$fecha1'
        and tbldp.estadoDespejeId in (1,2) and tbla.estadoDespejeId = tbldp.estadoDespejeId;
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
        	select concat(usuarioPrimerNombre,' ', usuarioPrimerApellido) as nombreUsuario, usuarioIdentidad from cimeqh.tblusuarios

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
<<<<<<< HEAD
=======

    function totalesPorRegiones($fecha1,$fecha2)
    {
      $total = array();
      $sqlrt ="
      select sum(f.montoPagado)as monto,r.regionDescripcion as region from tblfacturas f, tblproyectos p,tblregion r
      where p.proyectoId = f.proyectoId and p.regionProyecto = r.idRegion and f.fechaPago between '$fecha1' and '$fecha2' group by r.idRegion;
      ";
      $total = obtenerRegistros($sqlrt);
      return $total;
    }

    function total($fecha1,$fecha2)
    {
      $total = "";
      $sqlrt ="
      select sum(A.monto) as totales from (select sum(f.montoPagado)as monto,r.regionDescripcion as region from tblfacturas f, tblproyectos p,tblregion r
      where p.proyectoId = f.proyectoId and p.regionProyecto = r.idRegion and f.fechaPago between '$fecha1' and '$fecha2' group by r.idRegion) A;
      ";
      $total = obtenerRegistros($sqlrt);
      return $total;
    }
>>>>>>> master
?>
