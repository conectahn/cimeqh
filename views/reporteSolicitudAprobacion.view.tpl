<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><small>Users</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <a href="temp/{{codigoAprobacion}}.png" download="qrcode">
        <div class="x_content">
          <h1>Descargue el Siguiente Codigo QR y el Timbre Electronico</h1>
          <img src="temp/{{codigoAprobacion}}.png" height="300px" width="300px">
        </div>
      </div>
      <button type="button" class="btn btn-warning btn-lg">Descargar Codigo QR</button>
      <a href="index.php?page=verMisSolicitudesDeAprobacion&codigo={{codigoAprobacion}}"  <button type="submit" id="btnQr" name="btnQr" class="btn btn-success btn-lg">Regresar</button></a>
      </a>
    </div>
  </div>
</div>
