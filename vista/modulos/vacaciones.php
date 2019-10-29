<main class="mdl-layout__content mdl-color--grey-100">

   <div id="modalAgregarVacaciones" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Vacaciones</h3><br>

      <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <form class="formulario" name="formulario_registro" method="post"  onsubmit="return validarRegistroVacaciones()">
        <div class="row">
          <div class="row col s4">
            <div class="input-field">
              <input id="cedula_vaca" name="cedula_vaca" type="number" min="0" max="40000000" pattern="-?[0-9]*(\.[0-9]+)?" maxlength="8" required placeholder="Cédula:" >
              <label class="label-icon" for="cedula_vaca"></label>
              <div id="cedulaVaca"><span></span></div>
            </div>
          </div>

          <!-- Nombre -->
          <div class="row col s4">
            <div class="input-field">
              <label for="nombre_vaca">Nombre:</label>
              <input type="text" name="nombre_vaca" id="nombre_vaca" onkeypress="return soloLetras(event)">
            </div>
          </div>

          <!-- Apellido -->
          <div class="row col s4">
            <div class="input-field">
              <label for="apellido_vaca">Apellido:</label>
              <input type="text" name="apellido_vaca" id="apellido_vaca"  onkeypress="return soloLetras(event)">
            </div>
          </div>
        </div>



        <!-- Cargo -->
        <div class="row">
          <div class="col s4">
            <label for="fingre">Fecha de ingreso:</label>
            <input type="text" class="" name="fingre" id="fingre" onfocus="this.blur()">
          </div>
          <div class="col s4">
            <label for="años_antiguedad">Años de Antiguedad:</label>
            <input type="text" class="" name="años_antiguedad" id="años_antiguedad" onfocus="this.blur()">
            <div id="antiguedad"><span></span></div>
          </div>
          <div class="col s4">
            <label for="tipovac[]">Tipo de Vacaciones:</label>
            <select multiple name="tipovac[]" id="tipovac">
              <option value="selec" disabled>Seleccione</option>
                <?php

                  $item = null;
                  $valor = null;

                  $tipovac = GestorTipovacaciones::verTipovacacionesController($item, $valor);

                  foreach ($tipovac as $key => $value) {

                  echo '<option value="'.$value["id_tipova"].'">'.$value["nombre_tipovac"].'</option>';

                  }

                ?>
            </select>

            <input type="hidden" id="ListaTipovac" name="ListaTipovac">

          </div>
        </div>

        <div class="row">
          <!-- fecha inicio -->
          <div class="row col s4">
            <div class="input">
              <label for="fechainicio">Fecha de inicio del disfrute:</label>
              <input type="date" class="datepicker-vaca" name="fechainicio" id="fechainicio">
            </div>
          </div>
          <!-- fecha fin -->
          <div class="row col s4">
            <div class="input">
              <label for="fechafin">Fecha de culminación del disfrute:</label>
              <input type="date" class="datepicker-vaca" name="fechafin" id="fechafin">
            </div>
          </div>
          <div class="row col s4">
            <div class="input">
             <label for="fechareintegro">Fecha de reintegro:</label>
             <input type="date" class="datepicker-vaca" name="fechareintegro" id="fechareintegro">
            </div>
          </div>
        </div>
        <div class="row">
          <p class="">Vacaciones a Disfrutar:</p>
          <div class="input-field col s6">
            <label for="periodo">Periodo:</label>
            <input type="text" name="periodo" id="periodo">       
          </div>
          <div class="input-field col s6">
           <label for="quinquenio">Quinquenio:</label>
           <input type="number" min="0" max="50" name="quinquenio" id="quinquenio">
          </div>
        </div>

        <!-- Tabla -->

        <div class="row">
          <div class="input-field col s6">
            <label for="dias_disfrutar">Número de Días a Disfrutar:</label>
            <input type="number" min="0" max="365" name="dias_disfrutar" id="dias_disfrutar">
          </div>

          <div class="input-field col s6">
            <label for="pendientes_disfrutar">Número Días Pendientes por Disfrutar:</label>
            <input type="number" min="0" max="365" name="pendientes_disfrutar" id="pendientes_disfrutar">
          </div>
        </div>

        <!-- Boton -->
        <div class="center">
          <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar</button>
        </div>
        <?php
        $vacaciones = new GestorVacaciones();
        $vacaciones->guardarVacacionesController();
        $vacaciones->editarVacacionesController();
        ?>
      </form>

    </div>

    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
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
                font-size: 12px;
                text-align: center;

                }
              </style>
              <div class="box-header with-border">
    
                <a class="waves-effect waves-light btn modal-trigger" href="#modalAgregarVacaciones">Agregar vacaciones</a>
              </div>
              <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablaVacaciones" width="100%">
                
                <thead>
                  <style>
                    td{text-align: center}
                  </style>
                  <tr>

                  <th>Código</th>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Años de antiguedad</th>
                  <th>Fecha de inicio</th>
                  <th>Fecha de finalización</th>
                  <th>Fecha de reintegro</th>
                  <th>Tipo de vacaciones</th>
                  <th>Periodo</th>
                  <th>Quinquenio</th>
                  <th>Días a disfrutar</th>
                  <th>Días pendientes por disfrutar</th>
                  <th>Estado</th>
                  <th>Acciones</th>

                  </tr>
                </thead>
                  
              </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" class="perfilUsuario">
              </div>

              <?php

              $vervacaciones = new GestorVacaciones();
              $vervacaciones -> borrarVacacionesController();

              ?>

              <div class="right">
                <button class="btn waves-effect" id="btnImprimirVacaciones" style="margin:20px;">Imprimir</button>
              </div>

              <div id="pdfvacaciones" style="display: none">           
                <form  name="pdfvacaciones" method="post">
                  <div class="col s4">
                    <label for="desdepdf">Desde:</label>
                    <input type="date" class="datepicker-vaca" name="desdepdf" id="desdepdf">
                  </div>


                  <div class="col s4">
                    <label for="hastapdf">Hasta:</label>
                    <input type="date" class="datepicker-vaca" name="hastapdf" id="hastapdf">
                  </div>
                  <div class="col s12">
                    <button class="btn waves-effect" type="submit" onclick = "this.form.action='tcpdf/pdf/VacacionesEmitidas.php'" formtarget="_blank" style="margin:10px;">Imprimir vacaciones emitidos</button>

                    <button class="btn waves-effect" onclick = "this.form.action='tcpdf/pdf/VacacionesPersonal.php'" formtarget="_blank" style="margin:10px;" >Imprimir personal de vacaciones</button>

                    <button class="btn waves-effect" onclick = "this.form.action='tcpdf/pdf/Vacaciones.php'" formtarget="_blank" style="margin:10px;" >Imprimir todos los vacaciones</button>
                  </div>
                </form>
              </div>


            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!--=======================================
  =            EDITAR VACACIONES            =
  ========================================-->
  <div id="modalEditarVacaciones" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3 class="indigo-text center">Editar Vacaciones</h3><br>

      <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <form class="formulario" name="formulario_registro" method="post"  onsubmit="return validarRegistroVacaciones()">
        <div class="row">
          <div class="row col s4">
            <div class="input-field">
              <input id="editarcedula_vaca" name="editarcedula_vaca" type="number" min="0" max="40000000" pattern="-?[0-9]*(\.[0-9]+)?" maxlength="8" required placeholder="Cédula:" >
              <label class="label-icon" for="editarcedula_vaca"></label>
              <div id="cedulaVaca"><span></span></div>

              <input type="hidden" id="editarVacaciones" name="editarVacaciones">
            </div>
          </div>

          <!-- Nombre -->
          <div class="row col s4">
            <div class="input-field">
              <label for="editarnombre_vaca">Nombre:</label>
              <input type="text" name="editarnombre_vaca" id="editarnombre_vaca" onkeypress="return soloLetras(event)">
            </div>
          </div>

          <!-- Apellido -->
          <div class="row col s4">
            <div class="input-field">
              <label for="editarapellido_vaca">Apellido:</label>
              <input type="text" name="editarapellido_vaca" id="editarapellido_vaca"  onkeypress="return soloLetras(event)">
            </div>
          </div>
        </div>



        <!-- Cargo -->
        <div class="row">
          <div class="col s4">
            <label for="editarfingre">Fecha de ingreso:</label>
            <input type="text" class="" name="editarfingre" id="editarfingre" onfocus="this.blur()">
          </div>
          <div class="col s4">
            <label for="editarannos_antiguedad">Años de Antiguedad:</label>
            <input type="text" class="" name="editarannos_antiguedad" id="editarannos_antiguedad" onfocus="this.blur()">
            <div id="antiguedad"><span></span></div>
          </div>
          <div class="col s4">
            <label for="editarTipovaca[]">Tipo de Vacaciones:</label>
            <select multiple name="editarTipovaca[]" id="editarTipovaca">
              <option value="selec" disabled>Seleccione</option>
                <?php

                  $item = null;
                  $valor = null;

                  $tipovac = GestorTipovacaciones::verTipovacacionesController($item, $valor);

                  foreach ($tipovac as $key => $value) {

                  echo '<option value="'.$value["id_tipova"].'">'.$value["nombre_tipovac"].'</option>';

                  }

                ?>
            </select>
            <input type="hidden" id="editarListaTipovac" name="editarListaTipovac">
          </div>
        </div>

        <div class="row">
          <!-- fecha inicio -->
          <div class="row col s4">
            <div class="input">
              <label for="editarfechainicio">Fecha de inicio del disfrute:</label>
              <input type="date" class="" name="editarfechainicio" id="editarfechainicio">
            </div>
          </div>
          <!-- fecha fin -->
          <div class="row col s4">
            <div class="input">
              <label for="editarfechafin">Fecha de culminación del disfrute:</label>
              <input type="date" class="" name="editarfechafin" id="editarfechafin">
            </div>
          </div>
          <div class="row col s4">
            <div class="input">
             <label for="editarfechareintegro">Fecha de reintegro:</label>
             <input type="date" class="" name="editarfechareintegro" id="editarfechareintegro">
            </div>
          </div>
        </div>
        <div class="row">
          <p class="">Vacaciones a Disfrutar:</p>
          <div class="input-field col s6">
            <label for="editarperiodo">Periodo:</label>
            <input type="text" name="editarperiodo" id="editarperiodo">       
          </div>
          <div class="input-field col s6">
           <label for="editarquinquenio">Quinquenio:</label>
           <input type="number" min="0" max="50" name="editarquinquenio" id="editarquinquenio">
          </div>
        </div>

        <!-- Tabla -->

        <div class="row">
          <div class="input-field col s6">
            <label for="editardias_disfrutar">Número de Días a Disfrutar:</label>
            <input type="number" min="0" max="365" name="editardias_disfrutar" id="editardias_disfrutar">
          </div>

          <div class="input-field col s6">
            <label for="editarpendientes_disfrutar">Número Días Pendientes por Disfrutar:</label>
            <input type="number" min="0" max="365" name="editarpendientes_disfrutar" id="editarpendientes_disfrutar">
          </div>
        </div>

        <!-- Boton -->
        <div class="center">
          <button class="btn waves-effect waves-light indigo" type="submit" name="registrar">Guardar cambios</button>
        </div>
      
      </form>

    </div>

    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat ">Salir</a>
    </div>
  </div>

  <!--====  End of EDITAR VACACIONES  ====-->
  
</main>

<?php  
$df = new GestorVacaciones();
$df -> diasferiadosController();

?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<script>
$(document).ready(function(){
$('#modalAgregarVacaciones').modal('open');

}); 


var from_$input = $('#fechainicio').pickadate(),
from_picker = from_$input.pickadate('picker')

var to_$input = $('#fechafin').pickadate(),
to_picker = to_$input.pickadate('picker')

var reintegro_$input = $('#fechareintegro').pickadate(),
reintegro = reintegro_$input.pickadate('picker')

 to_picker.on('set', function(event) {
  if ( event.select ) {
    reintegro.set('min', to_picker.get('select'))    
  }
  else if ( 'clear' in event ) {
    reintegro.set('min', false)
  }
})

// // Función para calcular los días transcurridos entre dos fechas
restaFechas = function(from_picker,to_picker)
{

var aFecha1 = from_picker.get('select','dd/mm/yyyy').split('/'); 
var aFecha2 = to_picker.get('select','dd/mm/yyyy').split('/'); 
var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
var dif = fFecha2 - fFecha1;

var dias = Math.round(dif / (1000 * 60 * 60 * 24)); 


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

/* Función que suma o resta días a una fecha, si el parámetro
   días es negativo restará los días*/
   function sumarDias(fecha, dias){
    var i = 0;
    var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
    var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
    var aFecha = sFecha.split(sep);
    var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
    fecha= new Date(fecha);
    while (i<dias) {
    fecha.setTime(fecha.getTime()+24*60*60*1000); // añadimos 1 día
    s = from_picker.get('disable')
      if (fecha.getDay() != 6 && fecha.getDay() != 0){
        i++;  
          for (j=2;j<s.length;j++){
            if (fecha.getTime() == s[j].getTime()){
              i--;
            }
          }
      }
      
    }

  return fecha;
}



var antiguedad = $("#años_antiguedad").val()

if(antiguedad == 1){

    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,15);

    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );

    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );

    $("#dias_disfrutar").val(15).focus();
}
 else if (antiguedad == 2) {

    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,16);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(16).focus();

}
 else if (antiguedad == 3) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,17);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(17).focus();

}
 else if (antiguedad == 4) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,18);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(18).focus();

}
 else if (antiguedad == 5) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,19);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(19).focus();

}
 else if (antiguedad == 6) {

    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,20);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );

    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(20).focus();

}
 else if (antiguedad == 7) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,21);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );

    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );

    $("#dias_disfrutar").val(21).focus();

}
 else if (antiguedad == 8) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,22);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(22).focus();

}
 else if (antiguedad == 9) {

    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,23);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(23).focus();

}
 else if (antiguedad == 10) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,24);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(24).focus();

}
 else if (antiguedad == 11) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,25);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(25).focus();

}
 else if (antiguedad == 12) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,26);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(26).focus();

}
 else if (antiguedad == 13) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,27);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(27).focus();

}
 else if (antiguedad == 14) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,28);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(28).focus();

}
 else if (antiguedad == 15) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,29);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(29).focus();

}
 else if (antiguedad >= 16) {
    d = from_picker.get('select','dd/mm/yyyy');

    var fecha = sumarDias(d,30);
    to_picker.set( 'select', fecha, { format: 'dd/mm/yyyy' } );
    x = to_picker.get('select','dd/mm/yyyy');

    var fechareintegro = sumarDias(x,1);

    reintegro.set( 'select', fechareintegro, { format: 'dd/mm/yyyy' } );
    $("#dias_disfrutar").val(30).focus();

}

////////////////////////////////////////////////////////////////////////////////////////
}
else if ( 'clear' in event ) {
to_picker.set('min', false)
}
})
to_picker.on('set', function(event) {
if ( event.select ) {
from_picker.set('max', to_picker.get('select'))
// $("#dias_disfrutar").val(restaFechas(from_picker,to_picker)).focus();
}
else if ( 'clear' in event ) {
from_picker.set('max', false)
}
})

</script>