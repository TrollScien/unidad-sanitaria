<?php

if($_SESSION["perfil"] != "Administrador"){

  echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">
  <div id="modalAgregarLugar" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Lugar de trabajo</h3>
        <form name="formu" class="formulario" id="lugar" method="post">
          <div class="">
            <label for="nombre_lugar">Nombre:</label>
            <input class="input-field" type="text" name="nombre_lugar" id="nombre_lugar" maxlength="50" required>
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
            </button>
          </div>
          <?php
            $lugar = new GestorLugar();
            $lugar -> guardarLugarController();
            $lugar -> editarLugarController();
          ?>    
        </form>

    </div>


    <div class="modal-footer">
    <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>





  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="lugar">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">
                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarLugar">Agregar Lugar</a>

                </div>

                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaLugar">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Lugar de trabajo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>

                  </table>
                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                </div>

                <?php
                  $verLugar = new GestorLugar();
                  $verLugar -> borrarLugarController();
                ?>
                <div class="right">
                  <a href="tcpdf/pdf/Lugar.php" target="blank">
                   <button class="btn waves-effect" style="margin:20px;">Imprimir Lugares de trabajo</button>
                  </a>
                </div>



              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<!--==================================
=            EDITAR LUGAR            =
===================================-->

  <div id="modalEditarLugar" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Lugar de trabajo</h3>
        <form name="formu" class="formulario" id="lugar" method="post">
          <div class="">
            <label for="editarLugar">Nombre:</label>
            <input class="input-field" type="text" name="editarLugar" id="editarLugar" maxlength="50" required>

            <input type="hidden" id="idLugar" name="idLugar">
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar cambios
            </button>
          </div>

        </form>

    </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>

<!--====  End of EDITAR LUGAR  ====-->

</main>

