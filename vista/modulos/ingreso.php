<head>
  <link href="vista/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>
  <body class="cyan">

    <div class="mdl-grid demo-content">
      <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">

          <form class="login-form" method="POST" >
            <div class="row">
              <div class="input-field col s12 center">
                <img src="vista/images/prosalud-logo.png" alt="Logo-prosalud" width="150" height="150" class="responsive-img valign profile-image-login">
                <p class="center login-form-text">GESTIÓN DE PROCESOS ADMINISTRATIVOS</p>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <i class="material-icons prefix">person outline</i>
                <input type="text" id="ingUsuario" name="ingUsuario"  maxlength="20" required>
                <label for="ingUsuario">Usuario</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <i class="material-icons  prefix">lock outline</i>
               <input type="password" id="ingPassword" name="ingPassword" maxlength="20" required>
                <label for="ingPassword">Contraseña</label>
              </div>
            </div>
              <?php 
                $login = new ControladorUsuarios();
                $login -> ctrIngresoUsuario();
              ?>
              <br>
              <div class="center">
                 <button class="btn waves-effect waves-light indigo" type="submit" name="action">Iniciar
                </button>
              </div>
              <br>
          </form>
        </div>
      </div>
    </div>