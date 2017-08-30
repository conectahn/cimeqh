<body class="login">
    <div class="contenido">
<div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form method="post">
          <h1>Inicio de Sesión</h1>
          <div>
            <input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Número de Identidad" required="" maxlength="13"/>
          </div>
          <div>
            <input type="password" name="txtPswd" id="txtPswd" class="form-control" placeholder="Contraseña" required="" />
          </div>
          <div>
            <div class="clearfix"></div>

                <input class="btn btn-success submit" type="submit" name="btnLogin" value="Entrar">
                <a href="#signup" class="to_register"><input type="button" class="btn btn-dark submit" value="He olvidado mi contraseña"></a>
                </p>
                <div class="clearfix"></div>



          <div class="clearfix"></div>

          <div class="separator">
            <h2 class="change_link">Primera vez?</h2>
              <a href="index.php?page=registroUsuarios" ><button type="button" name="btnRestore" id="btnRestore" class="btn btn-warning btn-lg">Crear Cuenta</button>



            <div class="clearfix"></div>
            <br />

            <div>
              <h1>CIMEQH</h1>
                <a href="index.php?page=revisarSolicitudAprobacionPublico"><input class="btn btn-info submit" type="button" name="" value="Buscar Proyectos Aprobados"></a>
              <p></p>
            </div>
          </div>
        </form>
      </section>
    </div>

    <div id="register" class="animate form registration_form">
      <section class="login_content">
        <form method="post" action="index.php?page=login">
          <h1>Recuperar Contraseña</h1>
          <div>
            <input type="email" id="txtcorreo" name="txtcorreo" class="form-control" placeholder="Ingresar Correo Electronico" required="" />
          </div>
          <div>
            <button type="submit" name="btnRestore" id="btnRestore" class="btn btn-primary btn-lg">Enviar</button>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
              No necesita recuperar su contraseña <a href="#signin" class="to_register"><input type="button"  class="btn btn-danger submit" value="Regresar"></a>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1>CIMEQH</h1>
              <p></p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
