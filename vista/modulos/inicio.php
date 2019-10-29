<?php


if ($_SESSION["perfil"] != "Administrador") {

echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=personal'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">

      <div class="page-content" id="registro">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <!-- Titulo -->
              
                <!-- <h2 class="indigo-text center">Bienvenido al panel de control</h2><br> -->
                  <script>
                    Materialize.toast("¡Bienvenido <?php echo $_SESSION["nombre"]?>!", 4000, "rounded green");
                  </script>
                      
     


<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <h3 class="center">Acceso rápido</h3>

                <div class="divider"></div>
                <div class="center">
                  <a class="mdl-navigation__link" href="personal"><i class="large mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Personal</a>
                  <a class="mdl-navigation__link" href="reposo"><i class="large mdl-color-text--blue-grey-400 material-icons" role="presentation">event_note</i>Reposos</a>
                  <a class="mdl-navigation__link" href="vacaciones"><i class="large mdl-color-text--blue-grey-400 material-icons" role="presentation">insert_invitation</i>Vacaciones</a>
            
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>
