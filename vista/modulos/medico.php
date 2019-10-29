<?php

if($_SESSION["perfil"] != "Administrador"){

echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

}

?>
<main class="mdl-layout__content mdl-color--grey-100">

  <div id="modalAgregarMedico" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Médicos</h3>
        <form class="formulario" name="formu" id="medico" method="post">



          <div class="">
              <label for="doc"></label>
              <select id="doc" name="doc" required>
                <option value="selec" disabled selected>Seleccione</option>
                <option value="1">DR.</option>
                <option value="0">DRA.</option>
              </select>
            <div class="input-field">
              <input class="input-field" type="text" name="nombre_medico" id="nombre_medico" onkeypress="return soloLetras(event)" maxlength="30" required>
              <label  for="nombre_medico">Nombre</label>
            </div>
            <div class="input-field">
              <input class="input-field" type="text" name="apellido_medico" id="apellido_medico" onkeypress="return soloLetras(event)" maxlength="30" required>
              <label  for="apellido_medico">Apellido</label>
            </div>
          </div>



            <!-- botones -->
            <div class="center">
              <button class="btn tooltipped waves-effect waves-light indigo" type="submit" name="action"
                data-position="bottom" data-delay="50" data-tooltip="Registrar médico">Guardar
              </button>
            </div>

            <?php
              $medico = new GestorMedico();
              $medico -> guardarMedicoController();
              $medico -> editarMedicoController();
            ?>       
        </form>


    </div>


    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>






  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="medico">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarMedico">Agregar Médico</a>

                </div>

                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaMedico">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Médico</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                </div>
                <?php  
                  $verMedico = new GestorMedico();
                  $verMedico -> borrarMedicoController();
                ?>
                <div class="right">
                  <a href="tcpdf/pdf/Medico.php" target="blank">
                    <button class="btn waves-effect" style="margin:20px;">Imprimir Médicos</button>
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
=            EDITAR MEDICO            =
====================================-->
  <div id="modalEditarMedico" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Editar Médico</h3>
        <form class="formulario" name="formu" id="medico" method="post">

          <input type="hidden" id="idMedico" name="idMedico">

          <div class="">
            <label for="editarDoc"></label>
            <select class="browser-default" id="editarDoc" name="editarDoc" required>
              <option value="selec" disabled selected>Seleccione</option>
              <option value="1">DR.</option>
              <option value="0">DRA.</option>
            </select>
            <div class="input-field">
              <input class="input-field" type="text" name="EditarNombre" id="EditarNombre" onkeypress="return soloLetras(event)" maxlength="30" required>
              <label  for="EditarNombre">Nombre</label>
            </div>
            <div class="input-field">
              <input class="input-field" type="text" name="EditarApellido" id="EditarApellido" onkeypress="return soloLetras(event)" maxlength="30" required>
              <label  for="EditarApellido">Apellido</label>
            </div>
          </div>



          <!-- botones -->
          <div class="center">
            <button class="btn tooltipped waves-effect waves-light indigo" type="submit" name="action"
            data-position="bottom" data-delay="50" data-tooltip="Registrar médico">Guardar cambios
            </button>
          </div>


        </form>


    </div>


    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>


<!--====  End of EDITAR MEDICO  ====-->

</main>
