<?php

if ($_SESSION["perfil"] != "Administrador") {

echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">

  <div id="modalAgregarTipoper" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Tipo personal</h3>
        <form class="formulario" name="tipoper" id="tipoper" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="nombre_tipoper">Nombre:</label>
            <input class="input-field" type="text" name="nombre_tipoper" id="nombre_tipoper" onkeypress="return soloLetras(event)" maxlength="40" required>
          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
            </button>
          </div>

          <?php
          $tipoper = new GestorTipoper();
          $tipoper -> guardarTipoperController();
          $tipoper -> editarTipoperController();
          ?>

        </form>
    </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>



  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="tipoper">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarTipoper">Agregar tipo personal</a>

                </div>

                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaTipoper">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tipo de personal</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>

                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                  <?php
                    $verTipoper = new GestorTipoper();
                    $verTipoper -> borrarTipoperController();
                  ?> 

                </div>                
                <div class="right">
                  <a href="tcpdf/pdf/Tipopersonal.php" target="blank">
                    <button class="btn waves-effect" style="margin:20px;">Imprimir Tipo de personal</button>
                  </a>
                </div>



              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<!--==========================================
=            EDITAR TIPO PERSONAL            =
===========================================-->


  <div id="modalEditarTipoper" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Tipo personal</h3>
        <form class="formulario" name="tipoper" id="tipoper" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="editarTipoper">Nombre:</label>
            <input class="input-field" type="text" name="editarTipoper" id="editarTipoper" onkeypress="return soloLetras(event)" maxlength="40" required>

            <input type="hidden" id="idTipoper" name="idTipoper">
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

<!--====  End of EDITAR TIPO PERSONAL  ====-->

</main>