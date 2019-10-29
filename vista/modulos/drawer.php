
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50" id="mdl-layout__drawer">
  <header class="demo-drawer-header">
    <?php 
      if ($_SESSION["foto"] != "") {

        echo '<img src="'.$_SESSION["foto"].'" class="demo-avatar">';

      }else{
        echo '<img src="vista/img/usuarios/default/anonymous.png" class="demo-avatar">';
      }

    ?>

    <div class="demo-avatar-dropdown">
      <span class="mdl-color-text--blue-grey-400 white-text"><?php echo $_SESSION["nombre"];?></span>
      <div class="mdl-layout-spacer"></div>
      <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--blue-grey-400 white-text">
        <i class="material-icons" role="presentation">arrow_drop_down</i>
        <span class="visuallyhidden">Accounts</span>
      </button>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
          <li class="mdl-menu__item"><i class="material-icons">exit_to_app</i> <a href="salir" class="mdl-navigation__link">  Cerrar sesión</a></li>
        </ul>
    </div>
  </header>

