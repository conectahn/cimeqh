<!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <!--<meta charset="utf-8" />-->
            <title>{{prueba}}</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1"/>



            <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

            <link href="public/css/bootstrap-datepicker.css" rel="stylesheet">
            <link href="public/css/bootstrapValidator.css" rel="stylesheet">
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

            <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
            <!-- bootstrap-progressbar -->
            <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
            <!-- JQVMap -->
            <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
            <!-- bootstrap-daterangepicker -->

            <link href="pagar/css/bootstrap-formhelpers.css" rel="stylesheet">

            <!-- Custom Theme Style -->
            <link href="public/css/custom.min.css" rel="stylesheet">
              <script src="public/js/jquery.min.js"></script>
              <script src="public/js/bootstrap.min.js"></script>
              <script src="pagar/js/bootstrap-formhelpers-min.js"></script>
              <script src="public/js/bootstrapValidator.js"></script>
              <script src="public/js/bootstrap-datepicker.js"></script>

        </head>
        <body class="nav-md">

          <div class="container body">
            <div class="main_container">
              <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">

                    <a href="index.php?page=home"><img src="images/ingeniero.jpg"  class="img-circle profile_img" alt="Ingeniero"></a>

                  </div><br><br><br><br><br><br><br>

                  <div class="clearfix"></div>

                  <!-- menu profile quick info -->
                  <div class="profile clearfix">
                    <div class="profile_info">
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
                      <h3>General</h3>
                      <ul class="nav side-menu">
                        <li><a href="index.php?page=pagos"><i class="fa fa-money"></i>Realizar Pagos</a>
                        <li><a><i class="fa fa-briefcase"></i>Proyectos <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="index.php?page=registroProyectos">Agregar Proyectos</a></li>
                            <li><a href="index.php?page=verProyectos">Ver Proyectos Registrados</a></li>
                          </ul>
                        </li>
                        <li><a><i class="fa fa-list-alt"></i> Solicitud de Factibilidad de Proyectos <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="index.php?page=transicionFactibilidad">Realizar Solicitud de Factibilidad</a></li>
                            <li><a href="index.php?page=verMisSolicitudesDeFactibilidad">Ver Mis Solicitudes de Factibilidad</a></li>
                          </ul>
                        </li>
                        <li><a><i class="fa fa-check"></i> Solicitudes de Aprobación de Proyectos <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="index.php?page=transicionAprobacion">Realizar Solicitud de Aprobación de Proyectos</a></li>
                            <li><a href="index.php?page=verMisSolicitudesDeAprobacion">Ver Mis Solicitudes de Aprobación</a></li>
                          </ul>
                        </li>
                        <li><a><i class="fa fa-cloud-upload"></i>Solicitudes de Recepción de Proyectos <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="index.php?page=verMisSolicitudesDeAprobacion">Realizar Solicitud de Recepción de Proyectos</a></li>
                            <li><a href="index.php?page=verMisSolicitudesDeRecepcion">Ver Mis Soliciutdes de Recepción</a></li>
                          </ul>
                        </li>
                        <li><a><i class="fa fa-flash"></i> Solicitudes de Despeje de Energia <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="index.php?page=verMisSolicitudesDeAprobacion">Realizar Solicitud de Despeje de Energia</a></li>
                            <li><a href="index.php?page=verMisSolicitudesDeDespeje">Ver Solicitudes de Despeje</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /sidebar menu -->

                  <!-- /menu footer buttons -->
                  <div class="sidebar-footer hidden-small">

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

          <!-- FastClick -->
          <script src="public/js/fastclick.js"></script>
          <!-- NProgress -->
          <script src="public/js/nprogress.js"></script>

          <script src="vendors/Chart.js/dist/Chart.min.js"></script>
          <!-- gauge.js -->
          <script src="vendors/gauge.js/dist/gauge.min.js"></script>
          <!-- bootstrap-progressbar -->
          <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
          <!-- iCheck -->
          <script src="vendors/iCheck/icheck.min.js"></script>
          <!-- Skycons -->
          <script src="vendors/skycons/skycons.js"></script>
          <!-- Flot -->
          <script src="vendors/Flot/jquery.flot.js"></script>
          <script src="vendors/Flot/jquery.flot.pie.js"></script>
          <script src="vendors/Flot/jquery.flot.time.js"></script>
          <script src="vendors/Flot/jquery.flot.stack.js"></script>
          <script src="vendors/Flot/jquery.flot.resize.js"></script>
          <!-- Flot plugins -->
          <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
          <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
          <script src="vendors/flot.curvedlines/curvedLines.js"></script>
          <!-- DateJS -->
          <script src="vendors/DateJS/build/date.js"></script>
          <!-- JQVMap -->
          <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
          <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
          <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
          <!-- bootstrap-daterangepicker -->
          <script src="vendors/moment/min/moment.min.js"></script>
          <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

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

          <script src="vendors/iCheck/icheck.min.js"></script>
          <script src="code/highcharts.js"></script>
          <script src="code/highcharts-3d.js"></script>
          <script src="code/modules/exporting.js"></script>
          <script src="public/js/custom.min.js"></script>

        </body>
    </html>
