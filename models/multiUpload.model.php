<?php
class Multiupload
{

    /**
    *sube archivos al servidor a través de un formulario
    *@access public
    *@param array $files estructura de array con todos los archivos a subir
    */
    public function upFiles($files = array(), $Id, $accion)
    {
        //inicializamos un contador para recorrer los archivos
        $i = 0;
        $direccion="";
        $nombreArchivo="";
        //si no existe la carpeta files la creamos
        if(!is_dir("files/"))
            mkdir("files/", 0777);

        //recorremos los input files del formulario
        foreach($files as $file)
        {
            //si se está subiendo algún archivo en ese indice
            if($_FILES['userfile']['tmp_name'][$i])
            {

                //separamos los trozos del archivo, nombre extension
                $trozos[$i] = explode(".", $_FILES["userfile"]["name"][$i]);

                //obtenemos la extension
                $extension[$i] = end($trozos[$i]);

                //si la extensión es una de las permitidas
                if($this->checkExtension($extension[$i]) === TRUE)
                {

                    //comprobamos si el archivo existe o no, si existe renombramos
                    //para evitar que sean eliminados
                    $_FILES['userfile']['name'][$i] = $this->checkExists($trozos[$i]);

                    //comprobamos si el archivo ha subido
                    if(move_uploaded_file($_FILES['userfile']['tmp_name'][$i],"files/".$_FILES['userfile']['name'][$i]))
                    {
                      $direccion="files/".$_FILES["userfile"]["name"][$i];
                      $nombreArchivo=$_FILES["userfile"]["name"][$i];
                      switch ($accion) {
                        case 'aprobacion':
                          $strsql = "INSERT INTO `tbldocumentosaprobacion`(`documentoDireccion`,`solicitudAprobacionId`,`documentoNombre`) VALUES('%s',%d,'%s');";
                          $strsql = sprintf($strsql,  $direccion, $Id,$nombreArchivo);
                          $resultado=0;
                          $resultado=  ejecutarNonQuery($strsql);
                          break;

                        case 'factibilidad':
                          $strsql = "UPDATE `tblsolicitudfactibilidad` SET
                          `factibilidadDocumentoDireccion` = '%s',
                          `factibilidadDocumentoNombre` = '%s'
                          WHERE `solicitudFactibilidadId` = %d;";
                          $strsql = sprintf($strsql,  $direccion, $nombreArchivo,$Id);
                          $resultado=0;
                          $resultado=  ejecutarNonQuery($strsql);
                          break;

                          case 'recepcion':
                            $strsql = "INSERT INTO `tbldocumentosrecepcion`(`documentoRecepcionDireccion`,`solicitudRecepcionId`,`documentoNombre`)
                            VALUES('%s',%d,'%s');";
                            $strsql = sprintf($strsql,  $direccion, $Id,$nombreArchivo);
                            $resultado=0;
                            $resultado=  ejecutarNonQuery($strsql);
                            break;

                            case 'despeje':
                            $strsql = "UPDATE tblsolicituddespeje SET
                            rutaArchivo = '%s',
                            nombreArchivo = '%s'
                            WHERE solicitudDespejeId = %d;";
                            $strsql = sprintf($strsql,  $direccion, $nombreArchivo,$Id);
                            $resultado=0;
                            $resultado=  ejecutarNonQuery($strsql);
                              break;

                        default:
                          # code...
                          break;
                      }


                        //aqui podemos procesar info de la bd referente a este archivo
                    }
                //si la extension no es una de las permitidas
                }else{
                }
            //si ese input file no ha sido cargado con un archivo
            }else{
            }
            //en cada pasada por el loop incrementamos i para acceder al siguiente archivo
            $i++;
        }
    }

    /**
    *funcion privada que devuelve true o false dependiendo de la extension
    *@access private
    *@param string
    *@return boolean - si esta o no permitido el tipo de archivo
    */
    private function checkExtension($extension)
    {
        //aqui podemos añadir las extensiones que deseemos permitir
        $extensiones = array("jpg","png","dwg","pdf","gpx","kmz");
        if(in_array(strtolower($extension), $extensiones))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
    *funcion que comprueba si el archivo existe, si es asi, iteramos en un loop
    *y conseguimos un nuevo nombre para el, finalmente lo retornamos
    *@access private
    *@param array
    *@return array - archivo con el nuevo nombre
    */
    private function checkExists($file)
    {
        //asignamos de nuevo el nombre al archivo
        $archivo = $file[0] . '.' . end($file);
        $i = 0;
        //mientras el archivo exista entramos
        while(file_exists('files/'.$archivo))
        {
            $i++;
            $archivo = $file[0]."(".$i.")".".".end($file);
        }
        //devolvemos el nuevo nombre de la imagen, si es que ha
        //entrado alguna vez en el loop, en otro caso devolvemos el que
        //ya tenia
        return $archivo;
    }
}
