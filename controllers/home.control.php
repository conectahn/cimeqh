<?php
/* Home Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");

  function run(){

    if (mw_estaLogueado()) {

      switch ($_SESSION["estado"]) {
        case '1':
        switch ($_SESSION["rol"]) {
          case '1':
            renderizar("home", array(),"layoutCimeqh.view.tpl");
            echo $_SESSION["rol"];
            break;

            case '2':
              renderizar("home",array(),"layoutEneeAdmin.view.tpl");
              echo $_SESSION["rol"];
              break;

              case '3':
                renderizar("home", array(),"layoutCimeqhAprobacion.view.tpl");
                echo $_SESSION["rol"];
                break;


                case '4':
                  renderizar("home",array());
                  echo $_SESSION["rol"];
                  break;

                  case '5':
                    renderizar("home",array(),"layoutEnee.view.tpl");
                    echo $_SESSION["rol"];
                    break;

                    case '6':
                      renderizar("home",array(),"layoutEnee.view.tpl");
                      echo $_SESSION["rol"];
                      break;

          default:
            redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
            break;
        }
          break;

          case '2':
          redirectWithMessage("Lamentamos informarle que el cimeqh ha decidido rechazar su solicitud","index");
            break;

            case '3':
            redirectWithMessage("Su cuenta ha sido supendida por: ".$_SESSION["comentario"],"?page=login");
              break;


              case '4':
              redirectWithMessage("su cuenta aun no ha sido verificada por el CIMEQH","?page=login");              
                break;

        default:
          mw_redirectToLogin("page=login");
          break;
      }

  }
}
  run();
?>
