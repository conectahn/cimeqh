<!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <!--<meta charset="utf-8" />-->
            <title>{{prueba}}</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
          <!--  <link href="public/css/bootstrap.min.css" rel="stylesheet">

            <link href="public/css/font-awesome.min.css" rel="stylesheet">

            <link href="public/css/nprogress.css" rel="stylesheet">-->

            <link rel="stylesheet" href="public/dist/css/bootstrapValidator.min.css"/>
            <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

            <link href="public/css/bootstrap-datepicker.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!-- NProgress -->
            <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

            <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!-- NProgress -->
            <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
            <!-- iCheck -->
            <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
            <!-- bootstrap-wysiwyg -->
            <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
            <!-- Select2 -->
            <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
            <!-- Switchery -->
            <link href="./vendors/switchery/dist/switchery.min.css" rel="stylesheet">
            <!-- starrr -->
            <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
            <!-- bootstrap-daterangepicker -->
            <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

            <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
            <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
            <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
            <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
            <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

            <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
            <!-- PNotify -->
            <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
            <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
            <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
            <script src="public/js/jquery.min.js"></script>
            <script src="public/js/bootstrapValidator.js"></script>
            <script src="public/js/bootstrap-datepicker.js"></script>

            <!-- Custom Theme Style -->
            <link href="public/css/custom.min.css" rel="stylesheet">
        </head>
        <body class="nav-md">

          <div class="container body">
            <div class="main_container">
              <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php?page=home"><img src="images/eneelogo.jpg"  class="img-circle profile_img" alt="CIMEQH"></a>
                  </div>

                  <div class="clearfix"></div>

                  <!-- menu profile quick info -->
                  <div class="profile clearfix">
                    <div class="profile_pic">
                    </div>
                    <div class="profile_info">
                      <br>
                      <span>Bienvenido</span>
                      <h2>{{nombre}} {{apellido}}</h2>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <!-- /menu profile quick info -->

                  <br />

                  <!-- sidebar menu -->
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                      <h3>Opciones</h3>
                      <ul class="nav side-menu">
                        <li><a ><i class="fa fa-user"></i>Control de Usuarios<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="index.php?page=registroUsuariosEnee">Ingresar Usuario ENEE</a></li>
                        <!--<li><a href="index.php?page=verUsuarios">Administrar Usuarios</a></li>-->
                        </ul>
                        </li>
                      <h3>General</h3>
                      <ul class="nav side-menu">
                        <li><a href="index.php?page=revisarSolicitudFactibilidadEnee"><i class="fa fa-list-alt"></i>Revisar Solicitudes de Factibilidad de Proyectos<span class="fa fa-chevron-down"></span></a>
                        </li>
                        <li><a href="index.php?page=revisarSolicitudAprobacionEnee"><i class="fa fa-check"></i>Revisar Solicitudes de Aprobación de Proyectos<span class="fa fa-chevron-down"></span></a>
                        </li>
                        <li><a href="index.php?page=revisarSolicitudRecepcionEnee"><i class="fa fa-cloud-upload"></i>Revisar Solicitudes de Recepcion de Proyectos<span class="fa fa-chevron-down"></span></a>
                        </li>
                        <li><a href="index.php?page=revisarSolicitudDespejeEnee"><i class="fa fa-flash"></i>Revisar Solicitudes de Despeje de Energía<span class="fa fa-chevron-down"></span></a>
                        </li>
                        <li><a ><i class="fa fa-file-photo-o"></i>Reportes<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="index.php?page=reporteFinancieroCimeqh">Reportes Financieros</a></li>
                        <li><a href="index.php?page=reporteProyectoCimeqh">Reportes de Gestion de Proyectos</a></li>
                        </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /sidebar menu -->

                  <!-- /menu footer buttons -->
                  <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout"  href="index.php?page=cerrarSesion">
                      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                  </div>
                  <!-- /menu footer buttons -->
                </div>
              </div>

              <!-- top navigation -->
              <div class="top_nav">
                <div class="nav_menu">
                  <nav>
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                      <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <!--  <img src="" alt="">--><span class="glyphicon glyphicon-user"> </span>{{nombre}} {{apellido}}
                          <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                          <li><a href="javascript:;"> Profile</a></li>
                          <li>
                            <a href="javascript:;">
                              <span class="badge bg-red pull-right">50%</span>
                              <span>Settings</span>
                            </a>
                          </li>
                          <li><a href="javascript:;">Help</a></li>
                          <li><a href="index.php?page=cerrarSesion"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                        </ul>
                      </li>
                      <li role="presentation" class="dropdown">
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!-- /top navigation -->

              <!-- page content -->

            <div class="contenido">
                {{{page_content}}}
            </div>

            <footer>
              <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        </div>

          <!-- jQuery -->
          <!-- Bootstrap -->
          <script src="public/js/bootstrap.min.js"></script>
          <!-- FastClick -->
          <script src="public/js/fastclick.js"></script>
          <!-- NProgress -->
          <script src="public/js/nprogress.js"></script>

          <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
          <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
          <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
          <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
          <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
          <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
          <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
          <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
          <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
          <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
          <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
          <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
          <script src="vendors/jszip/dist/jszip.min.js"></script>
          <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
          <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

          <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
          <!-- iCheck -->
          <script src="vendors/iCheck/icheck.min.js"></script>
          <!-- PNotify -->
        <!--  <script src="vendors/pnotify/dist/pnotify.js"></script>
          <script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
          <script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>

          <script src="vendors/dropzone/dist/min/dropzone.min.js"></script>-->


          <!-- Custom Theme Scripts -->
          <script src="public/js/custom.min.js"></script>

          <script type="text/javascript">
              $("#txtMonto").on('input',function(e){
                var monto =$("#txtMonto").val();
                var cantidadAPagar=0;
                if (monto>=1 && monto<=100000) {
                  cantidadAPagar=50;
                }else if (monto>100000 && monto<=250000) {
                  cantidadAPagar=150;
                }else if (monto>250000 && monto<=500000) {
                  cantidadAPagar=350;
                }else if (monto>500000 && monto<=1000000) {
                  cantidadAPagar=700;
                }else if (monto>=1100000) {
                  monto=monto-1000000;
                  monto=parseInt(monto/100000);
                  cantidadAPagar=(monto*30)+700;
                  cantidadAPagar=parseInt(cantidadAPagar);
                }
                $("#txtTotalTimbres").val(cantidadAPagar);
              });

          </script>

          <script>
          $(".radioBtn").click(function() {
            $("#comentario").attr("disabled", true);
            $("#comentario").val("");
            if ($("input[name=ynRadio]:checked").val() == "no") {
              $("#comentario").attr("disabled", false);
        }
      });
          </script>

          <script>
          $(".radioBtn").click(function() {
            $("#monto").attr("disabled", true);
            $("#monto").val("");
            if ($("input[name=ynRadio]:checked").val() == "yes") {
              $("#monto").attr("disabled", false);
        }
      });
          </script>

        </body>
    </html>
