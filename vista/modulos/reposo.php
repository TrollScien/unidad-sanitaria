<main class="mdl-layout__content mdl-color--grey-100">
  <div id="modalReposo" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Reposos</h3><br>
      <form class="formulario" name="formulario_reposos" method="POST" onsubmit="return validarRegistroReposos()">
        <div class="row">
          <div class="row col s4">

            <div class="input-field">
              <input id="cedulareposo" type="number" min="0" max="40000000" placeholder="Cédula:" pattern="-?[0-9]*(\.[0-9]+)?" name="cedulareposo" maxlength="8" title="Ingrese una cédula válida" required>
              <label class="label-icon" for="cedulareposo"></label>
              <div id="validarcedulaReposos"><span></span></div>
            </div>

          </div>

          <!-- Nombre -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un nombre" type="text" id="nombrereposo" name="nombrereposo" onkeypress="return soloLetras(event)" maxlength="30" >
              <label class="label" for="nombrereposo">Nombre:</label>
              <div id="nombresReposo"></div>
            </div>
          </div>
          <!-- Apellido -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un apellido" type="text" id="apellidoreposo" name="apellidoreposo" onkeypress="return soloLetras(event)" maxlength="30" >
              <label class="label" for="apellidoreposo">Apellido:</label>
              <div id="apellidosReposo"></div>
            </div>
          </div>
        </div>



        <!-- Cargo -->
        <div class="row">
          <div class="col s6">
            <label for="medicoreposo">Médico:</label>
            <select id="medicoreposo" name="medicoreposo">
              <option value="selec" disabled selected>Seleccione</option>
                <?php

                      $item = null;
                      $valor = null;

                      $medico = GestorMedico::verMedicoController($itemMedico, $valorMedico);

                       foreach ($medico as $key => $value) {

                        $nombremedico = $value["nombre_medico"].' '.$value["apellido_medico"];

                         echo '<option value="'.$value["id_medico"].'">'.$nombremedico.'</option>';

                       }

                ?>
            </select>
          </div>
          <!-- patologias -->
          <div class="col s6">
            <label for="patologiareposo[]">Patologia:</label>
            <select multiple="" id="patologiareposo" name="patologiareposo[]">
              <option disabled >Seleccione</option>
                <?php

                      $item = null;
                      $valor = null;

                      $patologias = GestorPatologia::verPatologiaController($item, $valor);

                       foreach ($patologias as $key => $value) {

                         echo '<option value="'.$value["id_patologia"].'">'.$value["nombre_patologia"].'</option>';


                       }

                ?>
            </select>
            <input type="hidden" id="listaPatologias" name="listaPatologias">
          </div>

        </div>

        <!-- fecha de nacimiento -->
        <div class="row">
          <div class="col s6">
            <label for="fecha_inicioreposo">Fecha de Inicio:</label>
            <input type="date" class="datepicker" name="fecha_inicioreposo" id="fecha_inicioreposo">
          </div>

          <!-- fecha ingreso -->

          <div class="col s6">
            <label for="fecha_finreposo">Fecha de finalización:</label>
            <input type="date" class="datepicker" name="fecha_finreposo" id="fecha_finreposo">
          </div><br>
        </div>

        <div class="row col s12">
          <div class="input-field">
            <label for="diasreposo">Días de reposo</label>
            <input type="text" id="diasreposo" name="diasreposo"  onfocus="this.blur()">
          </div>
        </div>

        <div class="row col s12">
          <div class="input-field">
            <label for="observaciones">Observaciones:</label>
            <textarea  class="materialize-textarea" rows="6" id="observaciones" name="observaciones"  data-length="200"><?php if(isset($_POST['observaciones'])){echo $_POST['observaciones'];}?></textarea>
            <div id="observacionesReposo"></div>
          </div>
        </div>


        <!-- Boton -->
        <div class="center">
          <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar
          <!-- <i class="material-icons right">send</i> -->
          </button>
        </div>
      </form>

        <?php
        $Reposos = new RepososController();
        $Reposos->registroRepososController();
        $Reposos->editarRepososController();
        ?>
    </div>

    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>

  <!--===================================
  =            TABLA REPOSOS            =
  ====================================-->
  <div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
      <div class="page-content">
        <section class="section-center">
          <div class="mdl-cell mdl-cell--12-col">
            <div class="row" >
              <style>
                
                th{
                  font-size: 12px;
                  text-align: center;
                }
              </style>

              <div class="box-header with-border">
    
                <a class="waves-effect waves-light btn modal-trigger" href="#modalReposo">Agregar reposo</a>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaReposo" width="100%">

                  <style>
                    td{text-align: center}
                  </style>


                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Cédula</th>
                      <th>Nombre</th>
                      <th>Médico</th>
                      <th>Patologías</th>
                      <th>Fecha de inicio</th>
                      <th>Fecha de finalización</th>
                      <th>Días de reposo</th>
                      <th>Estado</th>
                      <th>Observaciones</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                   
                </table>

                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

                
              </div>

              <?php

              $verReposo = new RepososController();
              $verReposo -> borrarRepososController();

              ?>
              <div class="right">
                <!-- <a href="tcpdf/pdf/Reposo.php" target="blank"> -->
                <!-- <div class="row"> -->
                <button class="btn waves-effect" id="btnImprimirReposo" style="margin:20px;">Imprimir</button>
                <!-- </a> -->
                <!-- </div> -->
              </div>
              <div id="pdf" style="display: none">           
                <form  name="pdf" method="post">
                  <div class="col s4">
                    <label for="desdepdf">Desde:</label>
                    <input type="date" class="datepicker" name="desdepdf" id="desdepdf">
                  </div>


                  <div class="col s4">
                    <label for="hastapdf">Hasta:</label>
                    <input type="date" class="datepicker" name="hastapdf" id="hastapdf">
                  </div>
                  <div class="col s8">
                    <div class="input-field">
                      <input id="cedupdf" type="number" min="0" max="40000000" placeholder="Cédula:" pattern="-?[0-9]*(\.[0-9]+)?" name="cedupdf" maxlength="8" title="Ingrese una cédula válida" required>
                      <label class="label-icon" for="cedupdf"></label>
                    </div>
                  </div>
                  <div class="col s12">
                    <button class="btn waves-effect" type="submit" onclick = "this.form.action='tcpdf/pdf/RepososEmitidos.php'" formtarget="_blank" style="margin:10px;">Imprimir reposos emitidos</button>

                    <button class="btn waves-effect" onclick = "this.form.action='tcpdf/pdf/ReposoPersonal.php'" formtarget="_blank" style="margin:10px;" >Imprimir personal de Reposo</button>

                    <button class="btn waves-effect" onclick = "this.form.action='tcpdf/pdf/Reposo.php'" formtarget="_blank" style="margin:10px;" >Imprimir todos los Reposos</button>

                    <button class="btn waves-effect" onclick = "this.form.action='tcpdf/pdf/DiastotalReposos.php'" formtarget="_blank" style="margin:10px;" >Imprimir total de días de Reposos</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </section>
      </div>
    </div>
  </div>

<!--====  FIN DE TABLA REPOSOS  ====-->

<!--===================================
=            EDITAR REPOSO            =
====================================-->
  <div id="modalEditarReposo" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Editar reposo</h3><br>
      <form class="formulario" name="formulario_reposos" method="POST" onsubmit="return validarRegistroReposos()">
        <div class="row">
          <div class="row col s4">

            <div class="input-field">
              <input class=""  id="editarCedulareposo" type="search"  placeholder="Cédula:" pattern="-?[0-9]*(\.[0-9]+)?"  name="editarCedulareposo" maxlength="8" title="Ingrese una cédula válida"  required>
              <label class="label-icon" for="editarCedulareposo"><i class="material-icons">search</i></label>
              <div id="validarcedulaReposos"><span></span></div>

              <input type="hidden" id="editarReposo" name="editarReposo">
            </div>

          </div>

          <!-- Nombre -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un nombre" type="text" id="editarNombrereposo" name="editarNombrereposo" onkeypress="return soloLetras(event)" maxlength="30" onfocus="this.blur()">
              <label class="label" for="editarNombrereposo">Nombre:</label>
              <div id="nombresReposo"></div>
            </div>
          </div>
          <!-- Apellido -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un apellido" type="text" id="editarApellidoreposo" name="editarApellidoreposo" onkeypress="return soloLetras(event)" maxlength="30" onfocus="this.blur()">
              <label class="label" for="editarApellidoreposo">Apellido:</label>
              <div id="apellidosReposo"></div>
            </div>
          </div>
        </div>



        <!-- Cargo -->
        <div class="row">
          <div class="col s6">
            <label for="editarMedicoreposo">Médico:</label>
            <select id="editarMedicoreposo" name="editarMedicoreposo">
              <option value="selec" disabled selected>Seleccione</option>
               <?php

                      $item = null;
                      $valor = null;

                      $medico = GestorMedico::verMedicoController($itemMedico, $valorMedico);

                       foreach ($medico as $key => $value) {

                        $nombremedico = $value["nombre_medico"].' '.$value["apellido_medico"];

                         echo '<option value="'.$value["id_medico"].'">'.$nombremedico.'</option>';

                       }

                ?>
            </select>
          </div>
          <!-- patologias -->
          <div class="col s6">
            <label for="editarPatologiareposo[]">Patologia:</label>
            <select multiple="" id="editarPatologiareposo" name="editarPatologiareposo[]">
              <option value="selec" disabled >Seleccione</option>
               <?php

                      $item = null;
                      $valor = null;

                      $patologias = GestorPatologia::verPatologiaController($item, $valor);

                       foreach ($patologias as $key => $value) {

                         echo '<option value="'.$value["id_patologia"].'">'.$value["nombre_patologia"].'</option>';


                       }

                ?>
            </select>

            <input type="hidden" id="editarListaPatologias" name="editarListaPatologias">

          </div>

        </div>

        <!-- fecha de nacimiento -->
        <div class="row">
          <div class="col s6">
            <label for="editarFecha_inicioreposo">Fecha de Inicio:</label>
            <input type="date" class="datepicker" name="editarFecha_inicioreposo" id="editarFecha_inicioreposo">
          </div>

          <!-- fecha ingreso -->

          <div class="col s6">
            <label for="editarFecha_finreposo">Fecha de finalización:</label>
            <input type="date" class="datepicker" name="editarFecha_finreposo" id="editarFecha_finreposo">
          </div><br>
        </div>

        <div class="row col s12">
          <div class="input-field col s6">
            <label for="editarDiasreposo">Días de reposo</label>
            <input type="text" id="editarDiasreposo" name="editarDiasreposo"  onfocus="this.blur()">
          </div>
          <div class="input-field col s6">
            <label for="editarCodigo">Código del reposo</label>
            <input type="text" id="editarCodigo" name="editarCodigo"  onfocus="this.blur()">
          </div>

        </div>

        <div class="row col s12">
          <div class="input-field">
            <label for="editarObservaciones">Observaciones:</label>
            <textarea  class="materialize-textarea" rows="6" id="editarObservaciones" name="editarObservaciones"  data-length="200"></textarea>
            <div id="observacionesReposo"></div>
          </div>
        </div>


        <!-- Boton -->
        <div class="center">
          <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar cambios
          <!-- <i class="material-icons right">send</i> -->
          </button>
        </div>
      </form>

    </div>

    <div class="modal-footer">
      <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>



<!--====  FIN DE EDITAR REPOSO  ====-->



</main>



<script>
$(document).ready(function(){
 $('#modalReposo').modal('open');
}); 
          
$(".datepicker").pickadate({
    format: "d mmmm, yyyy",
    formatSubmit: "yyyy/mm/dd",
    closeOnSelect: true,
    closeOnClear: true,
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 50, // Creates a dropdown of 15 years to control year
    hiddenName: true
});
/*=============================================
=            calcular días        =
=============================================*/
  
var from_$input = $('#fecha_inicioreposo').pickadate(),
    from_picker = from_$input.pickadate('picker')

var to_$input = $('#fecha_finreposo').pickadate(),
    to_picker = to_$input.pickadate('picker')

// Función para calcular los días transcurridos entre dos fechas
restaFechas = function(from_picker,to_picker)
 {
 var aFecha1 = from_picker.get('select','dd/mm/yyyy').split('/'); 
 var aFecha2 = to_picker.get('select','dd/mm/yyyy').split('/'); 
 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
 return dias;
 }

// Check if there’s a “from” or “to” date to start with.
if ( from_picker.get('value') ) {
  to_picker.set('min', from_picker.get('select'))
}
if ( to_picker.get('value') ) {
  from_picker.set('max', to_picker.get('select'))
}

// When something is selected, update the “from” and “to” limits.
from_picker.on('set', function(event) {
  if ( event.select ) {
    to_picker.set('min', from_picker.get('select')) 

  }
  else if ( 'clear' in event ) {
    to_picker.set('min', false)
  }
})
to_picker.on('set', function(event) {
  if ( event.select ) {
    from_picker.set('max', to_picker.get('select'))

$("#diasreposo").val(restaFechas(from_picker,to_picker)).focus();
  }
  else if ( 'clear' in event ) {
    from_picker.set('max', false)
  }
})

/*=====  End of Section comment block  ======*/

/*=============================================
=            editar días        =
=============================================*/

var from_$input2 = $('#editarFecha_inicioreposo').pickadate(),
    from_picker2 = from_$input2.pickadate('picker')

var to_$input2 = $('#editarFecha_finreposo').pickadate(),
    to_picker2 = to_$input2.pickadate('picker')

// Función para calcular los días transcurridos entre dos fechas
restaFechas = function(from_picker2,to_picker2)
 {
 var aFecha1 = from_picker2.get('select','dd/mm/yyyy').split('/'); 
 var aFecha2 = to_picker2.get('select','dd/mm/yyyy').split('/'); 
 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
 return dias;
 }

// Check if there’s a “from” or “to” date to start with.
if ( from_picker2.get('value') ) {
  to_picker2.set('min', from_picker2.get('select'))
}
if ( to_picker2.get('value') ) {
  from_picker2.set('max', to_picker2.get('select'))
}

// When something is selected, update the “from” and “to” limits.
from_picker2.on('set', function(event) {
  if ( event.select ) {
    to_picker2.set('min', from_picker2.get('select')) 

  }
  else if ( 'clear' in event ) {
    to_picker2.set('min', false)
  }
})
to_picker2.on('set', function(event) {
  if ( event.select ) {
    from_picker2.set('max', to_picker2.get('select'))

$("#editarDiasreposo").val(restaFechas(from_picker2,to_picker2)).focus();
  }
  else if ( 'clear' in event ) {
    from_picker2.set('max', false)
  }
})

/*=====  End of Section comment block  ======*/


</script>