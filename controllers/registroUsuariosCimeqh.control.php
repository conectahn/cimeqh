<?php

require_once("libs/template_engine.php");
require_once("models/usuarios.model.php");
require_once("clases/PHPMailerAutoload.php");
require_once("clases/class.phpmailer.php");
require_once("clases/class.phpmaileroauth.php");
require_once("clases/class.smtp.php");
require_once("clases/class.pop3.php");
require_once("clases/class.phpmaileroauthgoogle.php");

  function run(){
    $usuarios=array();
    $htmlData = array();
    $htmlData["mostrarErrores"] = false;
    $htmlData["errores"] = array();
    $respueta="";
    $regiones=array();
    $roles=array();

    if(isset($_POST["btnRegistroUsuariosCimeqh"])){
      $usuarios["txtNumeroId"]=$_POST["txtNumeroId"];
      $usuarios["txtNumeroColegiacion"]=$_POST["txtNumeroColegiacion"];
      $usuarios["txtPrimerNombre"]=$_POST["txtPrimerNombre"];
      $usuarios["txtSegundoNombre"]=$_POST["txtSegundoNombre"];
      $usuarios["txtPrimerApellido"]=$_POST["txtPrimerApellido"];
      $usuarios["txtSegundoApellido"]=$_POST["txtSegundoApellido"];
      $usuarios["txtNumeroCelular"]=$_POST["txtNumeroCelular"];
      $usuarios["txtNumeroFijo"]=$_POST["txtNumeroFijo"];
      $usuarios["txtDireccion"]=$_POST["txtDireccion"];
      $usuarios["txtContrasena"]=$_POST["txtContrasena"];
      $usuarios["txtContrasenaConfirmacion"]=$_POST["txtContrasenaConfirmacion"];
      $usuarios["txtCorreo"]=$_POST["txtCorreo"];
      $usuarios["rol"]=$_POST["cmbRol"];
      $usuarios["region"]=$_POST["cmbRegion"];
      $respueta=$usuarios["txtContrasena"];
      $estadoCuenta = 1;
      $resultado = 0;
/*
($userId, $userPrimernombre, $userSegundonombre, $primerApellido, $segundoApellido,
$numeroColegiacion, $userCelular,$userTelefono, $userDireccion, $userPassword, $estadoCuenta, $rolId)

*/

    if($usuarios["txtContrasena"]==$usuarios["txtContrasenaConfirmacion"]){
    /*Crear contraseña encriptada*/
    $fchingreso = time(); //date("YmdHisu"); //20141104203730069785
    //$pswdSalted = "";
    $contrasena= "";
    if($fchingreso % 2 == 0){
      $contrasena = $usuarios["txtContrasena"] . $fchingreso;
    }else{
      $contrasena = $fchingreso . $usuarios["txtContrasena"];
    }
    //$pswdSalted = md5($pswdSalted);
    $contrasena = md5($contrasena);
    //ingresar datos a la base de datos este caso tabla de usuarios

    $user["mail"]=obtenerUsuariosPorMail($usuarios["txtCorreo"]);
    $user["id"]=obtenerUsuariosPorId($usuarios["txtNumeroId"]);

    if($user["mail"]=="" || $user["id"]=="")
    {
      insertUsuarioEnee($usuarios["txtNumeroId"],
      $usuarios["txtPrimerNombre"],
      $usuarios["txtSegundoNombre"],
      $usuarios["txtPrimerApellido"],
      $usuarios["txtSegundoApellido"],
      $usuarios["txtNumeroColegiacion"],
      $usuarios["txtNumeroCelular"],
      $usuarios["txtNumeroFijo"],
      $usuarios["txtDireccion"],
      $contrasena,
      $estadoCuenta,
      $usuarios["rol"],
      $usuarios["txtCorreo"],
      $fchingreso,
      $usuarios["region"]);
      //envio del correo al momento de registrar usuarios
      $mail = new PHPMailer;
      $mail->SMTPDebug=0;
      $mail->isSMTP();
      $mail->Host = 'chimera.lunarpages.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'cimeqh@conectahn.org';
      $mail->Password = 'conecta2017';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setFrom('cimeqh@conectahn.org', 'CIMEQH');
      $mail->addAddress($usuarios["txtCorreo"], '');
      $mail->addReplyTo('cimeqh@conectahn.org', 'Information');
      $mail->isHTML(true);                                  // Set email format to HTML
      $asunto = 'Alerta de creación de cuenta.';
      $mail->Subject = "=?ISO-8859-1?B?".base64_encode($asunto)."=?=";
      $mail->Body    = "Se ha creado una cuenta en su nombre para nuestra plataforma favor ingrese a la plataforma y siga los pasos<br> de recuperacion de contraseña para cambiarla su contraseña provicional es:  $respueta";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      if($mail->send()) {
      redirectWithMessage("Su cuenta ha sido creada, esta debe ser verificada por el CIMEQH, se le notificara mediante un correo cuando su cuenta este activa.","?page=login");
      }
    }


    echo $respueta;
    redirectWithMessage("Su cuenta ya existe verifique su correo para enterarse si esta ha sido verificada por el CIMEQH.","?page=login");
    header($location);

    }
    else{
      $htmlData["mostrarErrores"] = true;
      $htmlData["errores"][]=array("errmsg"=>"Contraseñas no coinciden");
      }

    }

    $regiones=obtenerRegiones();
    $roles=obtenerRolesEnee();
    renderizar("registroUsuariosCimeqh",array('datos' =>$htmlData, 'regiones'=>$regiones, 'roles'=>$roles),'layoutCimeqh.view.tpl');
  }
  run();
?>
