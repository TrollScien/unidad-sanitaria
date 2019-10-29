<?php

if ($_SESSION["perfil"] != "Administrador") {

echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">

  <div id="modalAgregarDiaf" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Días feriados</h3>
        <form name="formu" class="formulario" id="dias_fe" method="post">
          <div class="row">
            <div class="col s12">
              <label for="feriado">Fecha ingreso:</label>
              <input type="date" class="datepicker" name="feriado" id="feriado">
            </div>

          </div>


          <!-- botones -->
          <div class="center">
            <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
            </button>
          </div>

          <?php 
            $feriado = new GestorFeriado();
            $feriado -> guardarFeriadoController();
            $feriado -> editarFeriadoController();
          ?>
        </form>

    </div>


    <div class="modal-footer">
    <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>



  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="Feriado">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarDiaf">Agregar día feriado</a>
                </div>

                <div class="box-body">
                  <table class="table table-bordered table-striped dt-responsive tablaDiaferiado" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Día feriado</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>

                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">
                </div>
                <?php 
                  $verFeriado = new GestorFeriado();
                  $verFeriado -> borrarFeriadoController();
                ?>
                <div class="right">
                  <a href="tcpdf/pdf/Feriados.php" target="blank">
                    <button class="btn waves-effect" style="margin:20px;">Imprimir Días feriados</button>
                  </a>
                </div>



              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

<!--========================================
=            EDITAR DIA FERIADO            =
=========================================-->
  <div id="modalEditarDiaf" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Días feriados</h3>
        <form name="formu" class="formulario" id="dias_fe" method="post">
          <div class="row">
            <div class="col 12">
              <label for="editarFeriado">Fecha ingreso:</label>
              <input type="date" name="editarFeriado" id="editarFeriado">

              <input type="hidden" id="idDiaf" name="idDiaf">
            </div>

          </div>


            <!-- botones -->
            <div class="center">
              <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar cambios
              </button>
            </div>

        </form>

    </div>


    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>


<!--====  End of EDITAR DIA FERIADO  ====-->



</main>
<script>
$(".datepicker").pickadate({
  format: "d mmmm, yyyy",
  formatSubmit: "yyyy/mm/dd",
  closeOnSelect: true,
  closeOnClear: true,
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 50, // Creates a dropdown of 15 years to control year
  hiddenName: true
});
</script>