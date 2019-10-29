<?php

  if($_SESSION["perfil"] != "Administrador"){

    echo "<META HTTP-EQUIV='refresh' CONTENT='0; url=inicio'>";

  }

?>

<main class="mdl-layout__content mdl-color--grey-100">
  <div id="modalAgregarCargo" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Denominación del Cargo</h3>
    
      <form  id="formulario_cargo" name="formulario_cargo" method="post" >
        <div class="">
            <label for="tipoper">Tipo de personal:</label>
            <select id="tipoper" name="tipoper">
               <option value="selec" disabled selected>Seleccione</option>
                  <?php

                    $item = null;
                    $valor = null;

                    $tipoper = GestorTipoper::verTipoperController($item, $valor);

                    foreach ($tipoper as $key => $value) {

                      echo '<option value="'.$value["id_tipoper"].'">'.$value["nombre_tipoper"].'</option>';

                    }

                  ?>
            </select>
        </div>
        <div class="">
          <!-- Nombre -->
          <label for="nombrecar">Nombre:</label>
          <input class="input-field" type="text" name="nombrecar" id="nombrecar" maxlength="30" required>
        </div>
     
        <!-- botones -->
        <div class="center">
          <button class="btn tooltipped waves-effect waves-light indigo" type="submit" name="action"
            data-position="bottom" data-delay="50" data-tooltip="Registrar Cargo">Guardar
          </button>
        </div>

        <?php
          $cargo = new GestorCargo();
          $cargo -> guardarCargoController();
          $cargo -> editarCargoController();
        ?>   
      </form>

    </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>

  </div>




  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content" id="cargo">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="">
              <div class="row">

                <div class="box-header with-border">

                  <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarCargo">Agregar cargo</a>
                </div>

                <div class="box-body">
                  <table class="table table-bordered table-striped dt-responsive tablaCargo" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tipo de personal</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>

                  </table>

                  <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                    <?php
                      $verCargo = new GestorCargo();
                      $verCargo -> borrarCargoController();
                    ?>
                </div>

                <div class="right"><a href="tcpdf/pdf/Cargo.php" target="blank">
                  <button class="btn waves-effect" style="margin:20px;">Imprimir Cargos</button>
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
=            EDITAR CARGO            =
===================================-->

  <div id="modalEditarCargo" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h3 class="indigo-text center">Denominación del Cargo</h3>
    
      <form  id="formulario_cargo" name="formulario_cargo" method="post" >

        <input type="hidden" id="idCargo" name="idCargo">

        <div class="">
            <label for="editarTipopercargo">Tipo de personal:</label>
            <select class="browser-default" id="editarTipopercargo" name="editarTipopercargo">
               <option value="selec" disabled selected>Seleccione</option>
                  <?php

                    $item = null;
                    $valor = null;

                    $tipoper = GestorTipoper::verTipoperController($item, $valor);

                    foreach ($tipoper as $key => $value) {

                      echo '<option value="'.$value["id_tipoper"].'">'.$value["nombre_tipoper"].'</option>';

                    }

                  ?>
            </select>
        </div>
        <div class="">
          <!-- Nombre -->
          <label for="editarCargo">Nombre:</label>
          <input class="input-field" type="text" name="editarCargo" id="editarCargo" maxlength="30" required>
        </div>
     
        <!-- botones -->
        <div class="center">
          <button class="btn tooltipped waves-effect waves-light indigo" type="submit" name="action"
            data-position="bottom" data-delay="50" data-tooltip="Editar Cargo">Guardar cambios
          </button>
        </div>

        <?php
          $cargo = new GestorCargo();
          $cargo -> guardarCargoController();
          $cargo -> editarCargoController();
        ?>   
      </form>

    </div>


    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>

  </div>
<!--====  End of EDITAR CARGO  ====-->
</main>
