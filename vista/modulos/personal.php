<main class="mdl-layout__content mdl-color--grey-100">
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Personal</h3><br>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <form class="formulario" name="formulario_registro" id="formulario_registro" method="post" onsubmit="return validarRegistroPersonal()">
        <div class="row">
          <div class="row col s4">

            <div class="input-field">
              <input   id="empleado_cedula" type="number" min="0" max="40000000" placeholder="Cédula:" pattern="-?[0-9]*(\.[0-9]+)?" name="empleado_cedula" maxlength="8" title="Ingrese una cédula válida" required>
              <label class="label-icon" for="empleado_cedula"><span></span></label>
              <div id="validarcedulaPersonal"><span></span></div>
            </div>

          </div>

          <!-- Nombre -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un nombre" type="text" id="empleado_nombre" name="empleado_nombre" onkeypress="return soloLetras(event)" maxlength="30" value="<?php if(isset($_POST['empleado_nombre'])){echo $_POST['empleado_nombre'];}?>" >
              <label class="label" for="empleado_nombre">Nombre:</label>
              <div id="empleado_nombres"><span></span></div>
            </div>
          </div>
          <!-- Apellido -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un apellido" type="text" id="empleado_apellido" name="empleado_apellido" onkeypress="return soloLetras(event)" maxlength="30" value="<?php if(isset($_POST['empleado_apellido'])){echo $_POST['empleado_apellido'];}?>" >
              <label class="label" for="empleado_apellido">Apellido:</label>
              <div id="empleado_apellidos"><span></span></div>
            </div>
          </div>
        </div>
        <!-- Tipo personal y Cargo -->
        <div class="row">
              <div class="col s4">
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
              
          <div class="col s4">
            <label for="empleado_cargo">Denominación del cargo:</label>
            <select class="browser-default" id="empleado_cargo" name="empleado_cargo">
              <option value="" disabled selected>Seleccione</option>
                <?php

                  $item = null;
                  $valor = null;

                  $cargo = GestorCargo::verCargoController($item, $valor);

                   foreach ($cargo as $key => $value) {

                     echo '<option value="'.$value["id_cargo"].'">'.$value["nombre_cargo"].'</option>';

                   }

                ?>
            </select>
          </div>

          <!-- Lugar de trabajo -->
          <div class="col s4">
            <label for="empleado_ubicacion">Lugar de trabajo:</label>
            <select id="empleado_ubicacion" name="empleado_ubicacion">
              <option value="selec" disabled selected>Seleccione</option>
                    <?php

                      $item = null;
                      $valor = null;

                      $lugar = GestorLugar::verLugarController($item, $valor);

                       foreach ($lugar as $key => $value) {

                         echo '<option value="'.$value["id_lugardetrabajo"].'">'.$value["nombre_lugar"].'</option>';

                       }

                    ?>
            </select>
          </div><br>
        </div>

        <div class="row">
            <div class="col s6">
              <label for="tipocondicion">Tipo:</label>
              <select id="tipocondicion" name="tipocondicion">
                <option value="selec" disabled selected>Seleccione</option>
                    <?php

                      $item = null;
                      $valor = null;

                      $tipocon = GestorTipoCondicion::verTipoCondicionController($item, $valor);

                       foreach ($tipocon as $key => $value) {

                         echo '<option value="'.$value["id_tipocondicion"].'">'.$value["nombre_tipocon"].'</option>';

                       }

                    ?>
              </select>
            </div>

          <!-- condicion  -->
          <div class="col s6">
            <label for="condicion">Condición:</label>
            <select id="condicion" name="condicion">
              <option value="selec" disabled selected>Seleccione</option>
                    <?php

                      $item = null;
                      $valor = null;

                      $condicion = GestorCondicion::verCondicionController($item, $valor);

                       foreach ($condicion as $key => $value) {

                         echo '<option value="'.$value["id_condicion"].'">'.$value["nombre_condicion"].'</option>';

                       }

                    ?>
            </select>
          </div><br>
        </div>
        <!-- fecha de nacimiento -->
        <div class="row">
          <div class="col s6">
            <label for="empleado_fechanacim">Fecha de nacimiento:</label>
            <input type="date" class="datepicker" name="empleado_fechanacim" id="empleado_fechanacim">
          </div>

          <!-- fecha ingreso -->

          <div class="col s6">
            <label for="empleado_fechaingreso">Fecha ingreso:</label>
            <input type="date" class="datepicker" name="empleado_fechaingreso" id="empleado_fechaingreso">
          </div><br>
        </div>
        <!-- radio sexo -->
        <div class="row">
          <div class="col s6">
            <label for="edad">Edad:</label>
            <input type="text" class="" name="edad" id="edad" onfocus="this.blur()">
            <div id="EdadPersonal"><span></span></div>
          </div>
          <div class="row col s6">
            <div class="input-group radio">
              <p>Sexo:</p>
             
                <input type="radio" name="sexo" id="Masculino" value="MASCULINO">
                <label for="Masculino">Masculino</label>
                <input type="radio"  name="sexo" id="Femenino" value="FEMENINO">
                <label for="Femenino">Femenino</label>
           
            </div>
            <br>
          </div>
          <br>
      </div>
      <!-- Boton -->
      <div class="center col s12">
        <button class="btn tooltipped waves-effect waves-light indigo" type="submit" name="enviar" data-position="bottom" data-delay="50" data-tooltip="Guardar personal">Guardar
        </button>
      </div>
  </form>



<?php
$personal = new PersonalController();
$personal -> registroPersonalController();
$personal -> editarPersonalController();
?>

<!-- ////////////////////////////////// -->
</div>

  <div class="modal-footer">

    <a  class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
  </div>
</div>


<div class="mdl-grid demo-content">
  <div class="demo-charts mdl-color--white mdl-shadow--2dp  mdl-grid">
    <div class="page-content">
      <section class="section-center">
        <div class="mdl-cell mdl-cell--12-col">
          <div class="row" >

            <style>

            th{
            font-size: 13px;
            text-align: center;

            }
            </style>

            <div class="box-header with-border">
  
              <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Agregar personal</a>
            </div>

          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablaPersonal" width="100%">
              <thead>
              <tr>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Fecha de nacimiento</th>
              <th>Fecha de ingreso</th>
              <th>Sexo</th>
              <th>Tipo de personal</th>
              <th>Cargo</th>
              <th>Lugar</th>
              <th>Condición</th>
              <th>Acciones</th>

              </tr>
              </thead>
            </table>

            <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">

          </div>
            <div class="right">
              <a href="tcpdf/pdf/Personal.php" target="blank">
                <button class="btn waves-effect" style="margin:20px;">Imprimir Personal</button>
              </a>
            </div>

          </div>
          <?php

          $verPersonal = new PersonalController();
          $verPersonal -> borrarPersonalController();
          ?>

        </div>
      </section>
    </div>
  </div>
</div>



<!--=====================================
=            EDITAR PERSONAL            =
======================================-->

<div id="modalEditarPersonal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Editar Personal</h3><br>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <form class="formulario" name="formulario_registro" id="formulario_registro" method="post" >
        <div class="row">
          <div class="row col s4">

            <div class="input-field">
              <input id="editarCedula" type="search"  placeholder="Cédula:" pattern="-?[0-9]*(\.[0-9]+)?" onkeypress="return soloNumero(event)" name="editarCedula" maxlength="8" title="Ingrese una cédula válida" required>
              <label class="label-icon" for="empleado_cedula"><span></span><i class="material-icons">search</i></label>

              <input type="hidden" id="editarpersonal" name="editarpersonal">


              <div id="cedulaPersonal"><span></span></div>
            </div>

          </div>

          <!-- Nombre -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un nombre" type="text" id="editarNombre" name="editarNombre" onkeypress="return soloLetras(event)" maxlength="30">
              <label class="label" for="empleado_nombre">Nombre:</label>
              <div id="empleado_nombres"><span></span></div>
            </div>
          </div>
          <!-- Apellido -->
          <div class="row col s4">

            <div class="input-field">
              <input title="Ingrese un apellido" type="text" id="editarApellido" name="editarApellido" onkeypress="return soloLetras(event)" maxlength="30" >
              <label class="label" for="empleado_apellido">Apellido:</label>
              <div id="empleado_apellidos"><span></span></div>
            </div>
          </div>
        </div>
        <!-- Tipo personal y Cargo -->
        <div class="row">
              <div class="col s4">
                <label for="editarTipoper">Tipo de personal:</label>
                <select class="browser-default" id="editarTipoper" name="editarTipoper">
                  <option value="" disabled selected>Seleccione</option>
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
          <div class="col s4">
            <label for="editarCargo">Denominación del cargo:</label>
            <select class="browser-default" id="editarCargo" name="editarCargo">
              <option value="" disabled selected>Seleccione</option>
                <?php

                  $item = null;
                  $valor = null;

                  $cargo = GestorCargo::verCargoController($item, $valor);

                   foreach ($cargo as $key => $value) {

                     echo '<option value="'.$value["id_cargo"].'">'.$value["nombre_cargo"].'</option>';

                   }

                ?>
            </select>
          </div>

          <!-- Lugar de trabajo -->
          <div class="col s4">
            <label for="editarUbicacion">Lugar de trabajo:</label>
            <select class="browser-default" id="editarUbicacion" name="editarUbicacion">
              <option value="selec" disabled selected>Seleccione</option>
                    <?php

                      $item = null;
                      $valor = null;

                      $lugar = GestorLugar::verLugarController($item, $valor);

                       foreach ($lugar as $key => $value) {

                         echo '<option value="'.$value["id_lugardetrabajo"].'">'.$value["nombre_lugar"].'</option>';

                       }

                    ?>
            </select>
          </div><br>
        </div>

        <div class="row">
            <div class="col s6">
              <label for="editarTipocon">Tipo:</label>
              <select class="browser-default" id="editarTipocon" name="editarTipocon">
                <option value="selec" disabled selected>Seleccione</option>
                    <?php

                      $item = null;
                      $valor = null;

                      $tipocon = GestorTipoCondicion::verTipoCondicionController($item, $valor);

                       foreach ($tipocon as $key => $value) {

                         echo '<option value="'.$value["id_tipocondicion"].'">'.$value["nombre_tipocon"].'</option>';

                       }

                    ?>
              </select>
            </div>

          <!-- condicion  -->
          <div class="col s6">
            <label for="editarCondicion">Condición:</label>
            <select class="browser-default" id="editarCondicion" name="editarCondicion">
              <option value="selec" disabled selected>Seleccione</option>
                    <?php

                      $item = null;
                      $valor = null;

                      $condicion = GestorCondicion::verCondicionController($item, $valor);

                       foreach ($condicion as $key => $value) {

                         echo '<option value="'.$value["id_condicion"].'">'.$value["nombre_condicion"].'</option>';

                       }

                    ?>
            </select>
          </div><br>
        </div>
        <!-- fecha de nacimiento -->
        <div class="row">
          <div class="col s6">
            <label for="editarNacimiento">Fecha de nacimiento:</label>
            <input type="date" class="" name="editarNacimiento" id="editarNacimiento">
          </div>

          <!-- fecha ingreso -->

          <div class="col s6">
            <label for="editarFechaIngreso">Fecha ingreso:</label>
            <input type="date" class="" name="editarFechaIngreso" id="editarFechaIngreso">
          </div><br>
        </div>
        <!-- radio sexo -->
        <div class="row">
        
          <div class="row col s12">
            <div id="divsexo" class="">
              <p>Sexo:</p>
                <input type="radio" name="editarSexo" id="editarMasculino" value="MASCULINO">
                <label for="editarMasculino">Masculino</label>
                <input type="radio"  name="editarSexo" id="editarFemenino" value="FEMENINO">
                <label for="editarFemenino">Femenino</label>
            </div>
            <br>
          </div>
          <br>
      </div>
      <!-- Boton -->
      <div class="center col s12">
        <button class="btn tooltipped waves-effect waves-light indigo" type="submit" name="enviar" data-position="bottom" data-delay="50" data-tooltip="Guardar cambios del personal">Guardar cambios
        </button>
      </div>

      

  </form>

<!-- ////////////////////////////////// -->
</div>

  <div class="modal-footer">
    <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
  </div>
</div>
<!--====  FIN DE EDITAR PERSONAL  ====-->



</main>

<script>
  $(document).ready(function(){
$('#modal1').modal('open');
}); 

$('#empleado_fechanacim').pickadate({
  format: "d mmmm, yyyy",
  formatSubmit: "yyyy/mm/dd",
  closeOnSelect: true,
  closeOnClear: true,
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 20, // Creates a dropdown of 15 years to control year
  hiddenName: true,
  max: true
}),
$('#empleado_fechaingreso').pickadate({
  format: "d mmmm, yyyy",
  formatSubmit: "yyyy/mm/dd",
  closeOnSelect: true,
  closeOnClear: true,
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 20, // Creates a dropdown of 15 years to control year
  hiddenName: true,
  max: true
});


var edad_$input = $('#empleado_fechanacim').pickadate(),
edad_picker = edad_$input.pickadate('picker')

var ingreso_$input = $('#empleado_fechaingreso').pickadate(),
ingreso_picker = ingreso_$input.pickadate('picker')


// Check if there’s a “from” or “to” date to start with.
if ( edad_picker.get('value') ) {
ingreso_picker.set('min', edad_picker.get('select'))
}
if ( ingreso_picker.get('value') ) {
edad_picker.set('max', ingreso_picker.get('select'))
}

// When something is selected, update the “from” and “to” limits.
edad_picker.on('set', function(event) {
if ( event.select ) {
ingreso_picker.set('min', edad_picker.get('select')) 

var fecha = edad_picker.get('select','yyyy/mm/dd')
console.log(fecha);

// Si la fecha es correcta, calculamos la edad
var values=fecha.split("/");
var dia = values[2];
var mes = values[1];
var ano = values[0];

// cogemos los valores actuales
var fecha_hoy = new Date();
var ahora_ano = fecha_hoy.getYear();
var ahora_mes = fecha_hoy.getMonth();
var ahora_dia = fecha_hoy.getDate();

// realizamos el calculo
var edad = (ahora_ano + 1900) - ano;
if ( ahora_mes < (mes - 1))
{
edad--;
}
if (((mes - 1) == ahora_mes) && (ahora_dia < dia))
{
edad--;
}
if (edad > 1900)
{
edad -= 1900;
}

// console.log(edad);
$('#edad').val(edad);




if (edad >= 16) {
$("div[id='EdadPersonal'] span").html('');
console.log('hola',edad)
edadPersonal = false;
}else{
console.log('edad',edad);
$("div[id='EdadPersonal'] span").html('<p class="red-text">Este trabajador es menor de edad</p>');
edadPersonal = true;

}   
}
else if ( 'clear' in event ) {
ingreso_picker.set('min', false)
}
})
ingreso_picker.on('set', function(event) {
if ( event.select ) {
edad_picker.set('max', ingreso_picker.get('select'))
}
else if ( 'clear' in event ) {
edad_picker.set('max', false)
}
})
</script>