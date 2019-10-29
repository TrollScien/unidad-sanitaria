<?php

if ($_SESSION["perfil"] != "Administrador") {

echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">

  <div id="modalAgregarTipovac" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Tipo de vacaciones</h3>
        <form  name="tipocond" id="tipocond" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="nombre_tipovac">Nombre:</label>
            <input class="input-field" type="text" name="nombre_tipovac" id="nombre_tipovac" onkeypress="return soloLetras(event)" maxlength="40" required>
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">guardar
            </button>
          </div>
          <?php
            $tipovacaciones = new GestorTipovacaciones();
            $tipovacaciones -> guardarTipovacacionesController();
            $tipovacaciones -> editarTipovacacionesController();
          ?>

        </form>

      </div>

    <div class="modal-footer">
    <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>





  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="tipovacaciones">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarTipovac">Agregar tipo vacaciones</a>

                </div>

                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaTipovac">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tipo de vacaciones</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>

                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                </div>

                <?php
                  $verTipovacaciones = new GestorTipovacaciones();
                  $verTipovacaciones -> borrarTipovacacionesController();
                ?>
                <div class="right">
                  <a href="tcpdf/pdf/Tipovacaciones.php" target="blank">
                    <button class="btn waves-effect" style="margin:20px;">Imprimir Tipo de vacaciones</button>
                  </a>
                </div>



              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<!--============================================
=            EDITAR TIPO VACACIONES            =
=============================================-->

  <div id="modalEditarTipovac" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Tipo de vacaciones</h3>
        <form  name="tipocond" id="tipocond" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="editarTipovac">Nombre:</label>
            <input class="input-field" type="text" name="editarTipovac" id="editarTipovac" onkeypress="return soloLetras(event)" maxlength="40" required>

            <input type="hidden" id="idTipovac" name="idTipovac">
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">guardar cambios
            </button>
          </div>


        </form>

    </div>

    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>

<!--====  End of EDITAR TIPO VACACIONES  ====-->

</main>
