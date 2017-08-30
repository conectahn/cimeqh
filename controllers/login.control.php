<?php
/* Login Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  require_once("libs/dao.php");
  require_once("clases/PHPMailerAutoload.php");
  require_once("clases/class.phpmailer.php");
  require_once("clases/class.phpmaileroauth.php");
  require_once("clases/class.smtp.php");
  require_once("clases/class.pop3.php");
  require_once("clases/class.phpmaileroauthgoogle.php");


  function run(){

    $userName = "";
    $returnUrl = "";
    $mensaje = "";
    $errores = array();
    if(isset($_POST["btnLogin"])){
        $userName = $_POST["txtUser"];
        $pswd = $_POST["txtPswd"];
        $usuario = obtenerUsuariosPorId($userName);

        if($usuario){
          $salt = $usuario["usuarioFechaIngreso"];
          if ($salt % 2 == 0){
            $pswd = $pswd . $salt;
          }else {
            $pswd = $salt . $pswd;
          }

          $pswd = md5($pswd);
          if($usuario["usuarioContrasenia"] == $pswd){
            mw_setEstaLogueado($userName, true,$usuario["rolId"],$usuario["estadoCuentaId"], $usuario["usuarioPrimerNombre"],$usuario["usuarioPrimerApellido"],$usuario["usuarioComentario"]);
            header("Location:index.php?page=home");
            die();
          }elseif ($usuario["usuarioContrasenia"] == $pswd) {
            redirectWithMessage("Usuario o contraseña incorrectas.","?page=login");
          }
        }else{
          $errores[] = array("errmsg"=>"Credenciales Incorrectas");
          redirectWithMessage("Usuario o contraseña incorrectas.","?page=login");
        }
    }

    if(isset($_GET["returnUrl"])){
      $returnUrl = urldecode($_GET["returnUrl"]);
    }



    if(isset($_POST["btnRestore"])){
      $user=array();
      $user=obtenerIdporCorreo($_POST["txtcorreo"]);
      if ($user!="") {
        $last_inserted_id = getLastInserId();
        $cadena = base_convert(rand(1,99),10,36).base_convert(time(), 10, 36).base_convert($last_inserted_id, 10, 36);
        $token = $cadena;
        $mensaje=generarToken($token,$user["usuarioIdentidad"]);
        $link = 'http://localhost/cimeqh/index.php?page=restablecerPass&id='.$user["usuarioIdentidad"].'&token='.$token;

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
          $mail->addAddress($_POST["txtcorreo"], '');
          //$mail->addAddress('ellen@example.com');
          $mail->addReplyTo('cimeqh@conectahn.org', 'Information');
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');
          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
          $mail->isHTML(true);                                  // Set email format to HTML
          $asunto = 'Alerta de cambio de Contraseña.';
           $mail->Subject = "=?ISO-8859-1?B?".base64_encode($asunto)."=?=";
          $mail->Body    = "<html>
     <head>
        <title>Recuperar su Contraseña</title>
     </head>
     <body>
       <p>Recibimos una solicitud para cambiar su contraseña.</p>
       <p>Si usted hizo la solicitud por favor haga clic en el siguiente enlace, en caso contrario ignore este mensaje.</p>
       <p>
         <strong>Enlace para recuperar su contraseña</strong><br>
         <a href=".$link."> Haga clic aqui para recuperar su contraseña </a>
       </p>
     </body>
    </html>'";
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $mail->send();

        redirectWithMessage("Se ha enviado un mensaje a su correo electronico, favor siga los pasos para recuperar su cuenta.","?page=login");
      } else {
        redirectWithMessage("El correo ingresado no existe.","?page=login");
      }
    }

    //si llega aqui algo sucedio asi que hay que rendizar nuevamente el login
    $datos = array("txtUser" => $userName,
                   "returnUrl" => $returnUrl,
                   "mostrarErrores" => (count($errores)>0),
                   "errores" => $errores);
    echo $mensaje;
    if(!mw_estaLogueado() || $_SESSION["estado"]==4){ // Pagina de login no deberia aparecer si usuario esta loggeado
        renderizar("login", $datos,'layoutSinSesion.view.tpl');
    }else{
        renderizar("home",array());
    }

  }

  run();
?>
