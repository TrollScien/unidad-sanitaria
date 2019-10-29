<?php

if ($_SESSION["perfil"] != "Administrador") {

echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">

  <div id="modalAgregarPatologia" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Patologías</h3>
        <form  name="patologia" class="formulario" id="patologia" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="nombre_patologia">Nombre:</label>
            <input class="input-field" type="text" name="nombre_patologia" id="nombre_patologia" onkeypress="return soloLetras(event)" maxlength="40" required>
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
            </button>
          </div>

          <?php
            $patologia = new GestorPatologia();
            $patologia -> guardarPatologiaController();
            $patologia -> editarPatologiaController();
          ?>
        </form>

    </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>



  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="patologia">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarPatologia">Agregar Patología</a>

                </div>

                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaPatologias">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Patologías</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>
                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                  <?php 
                    $borrarPatologia = new GestorPatologia();
                    $borrarPatologia -> borrarPatologiaController();
                  ?>
                </div>
                <div class="right">
                  <a href="tcpdf/pdf/Patologias.php" target="blank">
                    <button class="btn waves-effect" style="margin:20px;">Imprimir Patologías</button>
                  </a>
                </div>



              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<!--===================================
=            EDITAR PATOLOGÍA           =
====================================-->
  <div id="modalEditarPatologia" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Editar Patología</h3>
        <form  name="patologia" class="formulario" id="patologia" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="editarPatologia">Nombre:</label>
            <input class="input-field" type="text" name="editarPatologia" id="editarPatologia" onkeypress="return soloLetras(event)" maxlength="40" required>

            <input type="hidden" id="idPatologia" name="idPatologia">
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
  
</main>
