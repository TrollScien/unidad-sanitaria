<?php

if ($_SESSION["perfil"] != "Administrador") {

echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">

  <div id="modalAgregarTipocon" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Tipo condición</h3>
        <form class="formulario" name="tipocond" id="tipocond" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="nombre_tipocon">Nombre:</label>
            <input class="input-field" type="text" name="nombre_tipocon" id="nombre_tipocon" onkeypress="return soloLetras(event)" maxlength="40" required>
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
            </button>
          </div>
          <?php

            $TipoCondicion = new GestorTipoCondicion();
            $TipoCondicion -> guardarTipoCondicionController();
            $TipoCondicion -> editarTipoCondicionController();

          ?>

        </form>

    </div>


    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>





  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="TipoCondicion">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarTipocon">Agregar tipo condición</a>

                </div>

                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaTipocon">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tipo de condición</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">
                </div>
                <?php
                  $verTipoCondicion = new GestorTipoCondicion();
                  $verTipoCondicion -> borrarTipoCondicionController();
                ?>
                <div class="right">
                  <a href="tcpdf/pdf/Tipocondicion.php" target="blank">
                    <button class="btn waves-effect" style="margin:20px;">Imprimir Tipo de condición</button>
                  </a>
                </div>



              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<!--===========================================
=            EDITAR TIPO CONDICION            =
============================================-->

  <div id="modalEditarTipocon" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Tipo condición</h3>
        <form class="formulario" name="tipocond" id="tipocond" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="editarTipocon">Nombre:</label>
            <input class="input-field" type="text" name="editarTipocon" id="editarTipocon" onkeypress="return soloLetras(event)" maxlength="40" required>

            <input type="hidden" id="idTipocon" name="idTipocon">
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
            </button>
          </div>
        </form>

      </div>


    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
    
  </div>

<!--====  End of EDITAR TIPO CONDICION  ====-->

</main>
