<?php

if($_SESSION["perfil"] != "Administrador"){

  echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">

  <div id="modalAgregarCondicion" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Condición</h3>
        <form name="formu" class="formulario" id="condicion" method="post">
          <div class="">
            <!-- descripcion -->
            <label for="nombre_condicion">Nombre:</label>
            <input class="input-field" type="text" name="nombre_condicion" id="nombre_condicion" onkeypress="return soloLetras(event)" maxlength="30" required>
          </div>


            <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
            </button>
          </div>

          <?php 
            $condicion = new GestorCondicion();
            $condicion -> guardarCondicionController();
            $condicion -> editarCondicionController();
          ?>
        </form>


    </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>

  </div>


  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="condicion">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarCondicion">Agregar condición</a>

                </div>

                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaCondicion">
                    <thead>
                      <style>
                        th,td{text-align: center}
                      </style>
                      <tr>
                        <th>#</th>
                        <th>Condición</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                </div>

                <div class="right">
                  <a href="tcpdf/pdf/Condicion.php" target="blank">
                    <button class="btn waves-effect" style="margin:20px;">Imprimir Condición</button>
                  </a>
                </div>


                <?php 
                  $verCondicion = new GestorCondicion();
                  $verCondicion -> borrarCondicionController();
                ?>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<!--======================================
=            EDITAR CONDICIÓN            =
=======================================-->


  <div id="modalEditarCondicion" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Editar Condición</h3>
        <form name="formu" class="formulario" id="condicion" method="post">
          <div class="">
            <!-- descripcion -->
              <label for="editarCondicion">Nombre:</label>
              <input class="input-field" type="text" name="editarCondicion" id="editarCondicion" onkeypress="return soloLetras(event)" maxlength="30" required>

              <input type="hidden" id="idCondicion" name="idCondicion">

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

<!--====  End of EDITAR CONDICIÓN  ====-->



</main>
