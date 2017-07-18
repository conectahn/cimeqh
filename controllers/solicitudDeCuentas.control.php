<?php
/* Home Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  require_once("clases/PHPMailerAutoload.php");
  require_once("clases/class.phpmailer.php");
  require_once("clases/class.phpmaileroauth.php");
  require_once("clases/class.smtp.php");
  require_once("clases/class.pop3.php");
  require_once("clases/class.phpmaileroauthgoogle.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==1) {
          $usuario = array();

          if(isset($_POST["btnRechazar"])){

            $numeroId="";
            $estadoCuenta=2;
            $numeroId=$_POST["usuarioIdentidad"];
            actualizarEstado($numeroId,$estadoCuenta);
            }

          if(isset($_POST["btnAceptar"])){
            $respuesta="";
            $numeroId="";
            $estadoCuenta=1;
            $numeroId=$_POST["usuarioIdentidad"];
            $respuesta=actualizarEstado($numeroId,$estadoCuenta);

            $mail = new PHPMailer;
            $mail->SMTPDebug=2;
            $mail->isSMTP();
            $mail->Host = 'chimera.lunarpages.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cimeqh@conectahn.org';
            $mail->Password = 'conecta2017';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('cimeqh@conectahn.org', 'CIMEQH');
            $mail->addAddress($_POST["usuarioCorreo"], '');
             //$mail->addAddress('ellen@example.com');
            $mail->addReplyTo('cimeqh@conectahn.org', 'Information');
             //$mail->addCC('cc@example.com');
             //$mail->addBCC('bcc@example.com');
             //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
             //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
             $mail->isHTML(true);                                  // Set email format to HTML
             $asunto = 'Alerta de aprobacion de cuenta.';
              $mail->Subject = "=?ISO-8859-1?B?".base64_encode($asunto)."=?=";
             $mail->Body    = "Su cuenta ha sido aprobada.";
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             if(!$mail->send()) {

             } else {

             }
          }


          if(isset($_POST["btnEnviar"])){

            if(isset($_POST["comentario"])){
            $numeroId=$_POST["usuarioIdentidad"];
            $comentario=$_POST["comentario"];
            $monto="";
            $mensaje="Su cuenta no se ha podido aprobar por el siguiente motivo: ";
            $respuesta=usuarioRechazado($numeroId,$monto,$comentario);
            }
            if(isset($_POST["monto"])){
            $numeroId=$_POST["usuarioIdentidad"];
            $comentario="";
            $monto=$_POST["monto"];
            $mensaje="Lamentamos informarle que su cuenta ha sido rechazada debido a falta de pago, segun el CIMQH usted tiene un saldo pendiente de: ";
            $respuesta=usuarioRechazado($numeroId,$monto,$comentario);
            }

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
             $mail->addAddress($_POST["usuarioCorreo"], '');
             //$mail->addAddress('ellen@example.com');
             $mail->addReplyTo('cimeqh@conectahn.org', 'Information');
             //$mail->addCC('cc@example.com');
             //$mail->addBCC('bcc@example.com');
             //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
             //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
             $mail->isHTML(true);                                  // Set email format to HTML
            $asunto = 'Alerta de rechazo de cuenta.';
            $mail->Subject = "=?ISO-8859-1?B?".base64_encode($asunto)."=?=";
             $mail->Body    = "$mensaje $monto $comentario";
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             $mail->send();
          }


        $usuario=obtenerUsuariosLogueado($_SESSION["userName"]);
        renderizar("solicitudDeCuentas",array('usuario'=>$usuario),"layoutCimeqh.view.tpl");
        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }
      }else {
      redirectWithMessage("Su cuenta todavia no ha sido verificada por el CIMEQH.","?page=login");
      }
    }else {
      mw_redirectToLogin("page=login");
    }
}



  run();
?>
