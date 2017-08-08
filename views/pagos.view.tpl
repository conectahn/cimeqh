<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Modulo de Pagos <small>Seleccione los pagos que realizara</small></h2>
              </div>
            </div>

            <div class="clearfix"></div>
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pagos <small>Seleccione lo que desea pagar</small></h2>
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

                  <div class="x_content">
                  <form method="post" action="index.php?page=pagos" id="facturas">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Numero de Facturacion</th>
                            <th class="column-title">Nombre del Ingeniero</th>
                            <th class="column-title">Concepto</th>
                            <th class="column-title">Fecha de Facturacion</th>
                            <th class="column-title">Cantidad a Pagar</th>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          {{foreach pagos}}
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" id="check[]" name="check[]" class="flat" value="{{idFacturas}}">
                            </td>
                            <td class=" ">{{numeroFactua}}</td>
                            <td class=" ">{{ingenieroNombre}}</td>
                            <td class=" ">{{conceptoDescripcion}}</td>
                            <td class=" ">{{fechaRegistro}}</td>
                            <td class=" ">{{montoPagado}}</td>
                            </td>
                          </tr>
                          {{endfor pagos}}
                        </tbody>
                      </table>
                    </div>
                    <button id="btnPagar" name="btnPagar" type="submit" class="btn btn-success btn-lg"><i class="fa fa-dollar"></i> Realizar Pagos <i class="fa fa-dollar"></i></button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
