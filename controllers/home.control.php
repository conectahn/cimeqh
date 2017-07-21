<?php
/* Home Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");

  function run(){

    if (mw_estaLogueado()) {
      if ($_SESSION["estado"]==1) {
        if ($_SESSION["rol"]==1 || $_SESSION["rol"]==2 || $_SESSION["rol"]==3
        ||  $_SESSION["rol"]==4 || $_SESSION["rol"]==5
        || $_SESSION["rol"]==6) {
          switch ($_SESSION["rol"]) {
            case '1':
              renderizar("home", array(),"layoutCimeqh.view.tpl");
              echo $_SESSION["rol"];
              break;

              case '2':
                renderizar("home",array(),"layoutEnee.view.tpl");
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
/*
          if ($_SESSION["rol"]==1) {
              renderizar("home",array(),"layoutCimeqh.view.tpl");
                echo $_SESSION["rol"];
          }elseif ($_SESSION["rol"]==2) {
            renderizar("home",array(),"layoutEnee.view.tpl");
          }else {
            renderizar("home",array());
          }*/
        }else {
          redirectWithMessage("No cuenta con los privilegios de usuario adecuado para ver esta páagina.","?page=login");
        }
      }else if ($_SESSION["estado"]==4) {
          redirectWithMessage("Su cuenta todavia no ha sido verificada por el CIMEQH.","?page=login");
      }elseif ($_SESSION["estado"]==3) {
        redirectWithMessage("Su cuenta ha sido supendida por: ".$_SESSION["comentario"],"?page=login");
      }
    }else {
      mw_redirectToLogin("page=login");
    }

  }
  run();
?>
