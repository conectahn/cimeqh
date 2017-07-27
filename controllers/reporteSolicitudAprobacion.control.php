<?php
  require_once("libs/template_engine.php");
  require_once("models/aprobacion.model.php");
  //libreria de php para poder generar QR code
  include_once("libs/phpqrcode/qrlib.php");

  function run(){
    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==4) {
          $revisar = array();
          $htmlDatos= array();
          $error="";

            $htmlDatos["codigoAprobacion"] = $_GET["id"];
            $codigo=$htmlDatos["codigoAprobacion"];
            $htmlDatos["link"] = "http://conectahn.org/colegiodeingenieros/index.php?page=revisarSolicitudAprobacionPublico&codigo=";
            //procedemos a crear el codigo QR con la funcion QRcode::png(data a codificar,direccion donde se guardara el codigo como imagen,tamano de la imagen "ECC Level",pixeles,frame)
            $htmlDatos["codigoqr"] = QRcode::png($htmlDatos["link"].$htmlDatos["codigoAprobacion"],"temp/$codigo.png",QR_ECLEVEL_Q,2,1);

            renderizar("reporteSolicitudAprobacion",$htmlDatos,"layout.view.tpl");
            imagenes($codigo);


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
/*
  Funcion para el proceso de unir imagenes .png en una sola imagen
*/
  function imagenes($codigoAprobacion)
  {
    define("WIDTH", 100);
    define("HEIGHT", 135);
    //creamos la imagen destino a colores, pasando como parametros el alto y ancho que tendra esta imagen
    $dest_image = imagecreatetruecolor(WIDTH, HEIGHT);
    imagesavealpha($dest_image, true);
    $trans_background = imagecolorallocatealpha($dest_image, 0, 0, 0, 300);
    imagefill($dest_image, 0, 0, $trans_background);
    //traemos todas las imagenes que queremos unir,es posible unir dos o mas imagenes siempre y cuando tengan la misma extension en este caso .png
    $a = imagecreatefrompng("images/timbre.png");
    $b = imagecreatefrompng("temp/$codigoAprobacion.png");
    $c = imagecreatefrompng("images/borde.png");
    //se procede a hacer la copia de las imagenes a la imagen destino con la funcion imagecopy(ImagenDestino,imagenCopiar,posx1,posy1,posx2,posy2,ancho,alto)
    //las posiciones 1 y 2 son usadas para ubicar la imagen a copiar en la imagen final
    imagecopy($dest_image, $a, 0, 0, 0, 0, WIDTH, HEIGHT);
    imagecopy($dest_image, $b, 0, 35, 0, 0, WIDTH, HEIGHT);
    //imagecopy($dest_image, $c, 0, 0, 0, 0, WIDTH, HEIGHT);
    //guardamos la imagen en una carpeta temporal
    imagepng($dest_image,"temp/a$codigoAprobacion.png");
    //destruimos las imagenes que usamos en el proceso
    imagedestroy($a);
    imagedestroy($b);
    imagedestroy($b);
    imagedestroy($dest_image);
  }
  run();
?>
