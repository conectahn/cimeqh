<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerUsuarios(){
          $usuario = array();
          $sqlstr = "SELECT *
          FROM tblusuarios tblu, tblroles tblr, tblestadocuenta tble WHERE tblu.rolId=tblr.rolId
          AND tblu.estadoCuentaId=tble.estadoCuentaId AND tblu.estadoCuentaId=4;";
          $usuario = obtenerRegistros($sqlstr);
          return $usuario;
    }


    function obtenerIdporCorreo($email){
      $usuario =array();
      $query= "select usuarioIdentidad
      from tblusuarios
      WHERE `usuarioCorreo` = '%s';";
      $query=sprintf($query,valstr($email));
      $usuario= obtenerUnRegistro($query);
      return $usuario;
    }

    function generarToken($token,$id){
      $usuario= array();
      $query= "UPDATE `cimeqh`.`tblusuarios`
      SET `usuarioToken` = '%s'
      WHERE `usuarioIdentidad` = '%s';";
      $query=sprintf($query,$token,$id);
      ejecutarNonQueryConErrores($query);
    }

    function agregarContrasena($password, $id){
      $usuario=array();
      $query="UPDATE `tblusuarios`
      SET `usuarioContrasenia` = '%s',
      `usuarioToken` = ''
      WHERE `usuarioIdentidad` = '%s';";
      $query=sprintf($query,$password,$id);
      ejecutarNonQueryConErrores($query);
    }


    function obtenerUsuariosLogueado($id){
          $usuario = array();
          $sqlstr = "select * from tblusuarios as u, tblroles as r, tblestadocuenta as ec  where
          u.estadoCuentaId=ec.estadoCuentaId and u.rolId=r.rolId
          and usuarioIdentidad!='%s' AND u.estadoCuentaId=4;";
          $sqlstr = sprintf($sqlstr, valstr($id));
          $usuario = obtenerRegistros($sqlstr);
          return $usuario;
    }


    function obtenerRoles(){
        $roles = array();
        $sqlstr = "select * from tblroles;";
        $roles = obtenerRegistros($sqlstr);
        return $roles;
    }

    function obtenerEstadoCuenta(){
        $estado = array();
        $sqlstr = "select * from tblestadocuenta;";
        $estado = obtenerRegistros($sqlstr);
        return $estado;
    }


    function obtenerUsuariosPorId($id){
          $usuario = array();
          $sqlstr = "select * from tblusuarios as u, tblroles as r, tblestadocuenta as ec  where
          u.estadoCuentaId=ec.estadoCuentaId and u.rolId=r.rolId and usuarioIdentidad='%s';";
          $sqlstr = sprintf($sqlstr, valstr($id));
          $usuario = obtenerUnRegistro($sqlstr);
          return $usuario;
    }


    function obtenerUsuariosPorMail($email){
          $usuario = array();
          $sqlstr = "select * from tblusuarios as u, tblroles as r, tblestadocuenta as ec  where
          u.estadoCuentaId=ec.estadoCuentaId and u.rolId=r.rolId and usuarioCorreo='%s';";
          $sqlstr = sprintf($sqlstr, valstr($email));
          $usuario = obtenerUnRegistro($sqlstr);
          return $usuario;
    }


    function obtenerUsuariosMenosLogueado($id){
          $usuario = array();
          $sqlstr = "select * from tblusuarios as u, tblroles as r, tblestadocuenta as ec  where
          u.estadoCuentaId=ec.estadoCuentaId and u.rolId=r.rolId and usuarioIdentidad!='%s';";
          $sqlstr = sprintf($sqlstr, valstr($id));
          $usuario = obtenerRegistros($sqlstr);
          return $usuario;
    }

    function obtenerTodosLosUsuarios(){
          $usuario = array();
          $sqlstr = sprintf("SELECT *
          FROM tblusuarios tblu, tblroles tblr, tblestadocuenta tble WHERE tblu.rolId=tblr.rolId
          AND tblu.estadoCuentaId=tble.estadoCuentaId;");
          $usuario = obtenerRegistros($sqlstr);
          return $usuario;
    }


    function modificarUsuarios($usuarioIdentidad, $estadoCuenta,$rolId){
    $sqlstr="UPDATE `tblusuarios`
    SET `estadoCuentaId` = %d,
    `rolId` = %d
    WHERE `usuarioIdentidad` = '%s';";
    $sqlstr = sprintf($sqlstr,$estadoCuenta,$rolId,$usuarioIdentidad);
    ejecutarNonQueryConErrores($sqlstr);
    }

    function actualizarMora($estadoCuentaId, $mora, $usuarioIdentidad){
      $sqlstr="UPDATE `tblusuarios`
               SET
               `estadoCuentaId` = %d,
               `usuarioMora` = %f
               WHERE `usuarioIdentidad` = '%s';";
      $sqlstr = sprintf($sqlstr,$estadoCuentaId,$mora,$usuarioIdentidad);
      return ejecutarNonQueryConErrores($sqlstr);

    }

    function actualizarEstado($usuarioIdentidad, $estadoCuenta){
    $sqlstr="UPDATE `tblusuarios`
    SET `estadoCuentaId` = $estadoCuenta
    WHERE `usuarioIdentidad` = '$usuarioIdentidad';";
    if(ejecutarNonQuery($sqlstr)){
    return ejecutarNonQueryConErrores($sqlstr);
    }
    return 0;
    }

    function usuarioRechazado($usuarioIdentidad, $monto, $comentario){
    $sqlstr="UPDATE `tblusuarios`
    SET `usuarioComentario` = '%s',
    `estadoCuentaId` = 2,
    `usuarioMora` = %d
    WHERE `usuarioIdentidad` = '%s';";
    $sqlstr = sprintf($sqlstr,$comentario,$monto,$usuarioIdentidad);
    if(ejecutarNonQuery($sqlstr)){
    return ejecutarNonQueryConErrores($sqlstr);
    }
    return 0;
    }


  function insertUsuario($userId, $userPrimernombre, $userSegundonombre, $primerApellido, $segundoApellido,
  $numeroColegiacion, $userCelular,$userTelefono, $userDireccion, $userPassword, $estadoCuenta, $rolId, $email){

  $strsql = "INSERT INTO `tblusuarios`
  (`usuarioIdentidad`,`usuarioPrimerNombre`,`usuarioSegundoNombre`,`usuarioPrimerApellido`,
  `usuarioSegundoApellido`,`usuarioNumeroColegiacion`,`usuarioCelular`,`usuarioTelefono`,
  `usuarioDireccion`,`usuarioContrasenia`, estadoCuentaId, rolId, `usuarioCorreo`,`usuarioFechaIngreso`)
  VALUES
  ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, %d, '%s',now());";
        $strsql = sprintf($strsql,
        valstr($userId),
        valstr($userPrimernombre),
        valstr($userSegundonombre),
        valstr($primerApellido),
        valstr($segundoApellido),
        valstr($numeroColegiacion),
        valstr($userCelular),
        valstr($userTelefono),
        valstr($userDireccion),
        valstr($userPassword),
        $estadoCuenta,
        $rolId,
        valstr($email));
        ejecutarNonQueryConErrores($strsql);

    }

    function insertUsuarioEnee($userId, $userPrimernombre, $userSegundonombre, $primerApellido, $segundoApellido,
    $numeroColegiacion, $userCelular,$userTelefono, $userDireccion, $userPassword, $estadoCuenta, $rolId, $email,
    $region){

    $strsql = "INSERT INTO `tblusuarios`
    (`usuarioIdentidad`,`usuarioPrimerNombre`,`usuarioSegundoNombre`,`usuarioPrimerApellido`,
    `usuarioSegundoApellido`,`usuarioNumeroColegiacion`,`usuarioCelular`,`usuarioTelefono`,
    `usuarioDireccion`,`usuarioContrasenia`, estadoCuentaId, rolId, `usuarioCorreo`,`usuarioFechaIngreso`,
    `usuarioFechaIngreso`,`usuarioRegion`)
    VALUES
    ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, %d, '%s',now(),%d);";
          $strsql = sprintf($strsql,
          valstr($userId),
          valstr($userPrimernombre),
          valstr($userSegundonombre),
          valstr($primerApellido),
          valstr($segundoApellido),
          valstr($numeroColegiacion),
          valstr($userCelular),
          valstr($userTelefono),
          valstr($userDireccion),
          valstr($userPassword),
          $estadoCuenta,
          $rolId,
          valstr($email),
          $region);
          ejecutarNonQueryConErrores($strsql);

      }



    function obtenerRegiones(){
          $usuario = array();
          $sqlstr = sprintf("SELECT * FROM cimeqh.tblregion;");
          $usuario = obtenerRegistros($sqlstr);
          return $usuario;
    }

    function obtenerRolesEnee(){
          $usuario = array();
          $sqlstr = sprintf("SELECT * FROM tblroles where rolId in (5,6);");
          $usuario = obtenerRegistros($sqlstr);
          return $usuario;
    }


?>
