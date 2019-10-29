/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger waves-effect waves-light btnEditarVacaciones" idVacaciones data-toggle="modal" data-target="modalEditarVacaciones"><i class="material-icons">create</i></button></div>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger waves-effect waves-light btnEditarVacaciones" idVacaciones data-toggle="modal" data-target="modalEditarVacaciones"><i class="material-icons">create</i></button><button class="btn red btnEliminarVacaciones" idVacaciones><i class="material-icons">delete</i></button></div>'
}


var estado = '<button class="btn btnActivarVacaciones" idVacaciones="">Activo</button>';

if (window.matchMedia("(max-width:767px)").matches){
    var table3 = $('.tablaVacaciones').DataTable({

        "ajax":"ajax/tabla-vacaciones.ajax.php",

        "columnDefs": [

            {
                "targets": -1,
                 "data": null,
                 "defaultContent": botonesTabla

            }

        ],

        "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }


    })

}else{

    var table3 = $('.tablaVacaciones').DataTable({


        "ajax":"ajax/tabla-vacaciones.ajax.php",
        "createdRow": function ( row, data, index ) {

            if ( data[12] == "Desactivado" ) {

                $('.btnActivarVacaciones ', row).addClass('red');
                $('.btnActivarVacaciones ',row).text('Desactivado');

                $('.btnEditarVacaciones',row).addClass('disabled');
                $('.btnEliminarVacaciones',row).remove();

            }else if(data[12] == "Desactivar"){

              $('.btnActivarVacaciones ', row).addClass('orange');
              $('.btnActivarVacaciones ',row).text('Finalizado');

            }else{

              $('.btnActivarVacaciones ', row).addClass('green');
              $('.btnEliminarVacaciones',row).remove();


            }
          },


        "columnDefs": [

           {
              "targets": -2,
               "data": null,
               "defaultContent": estado

            },

            {
                "targets": -1,
                 "data": null,
                 "defaultContent": botonesTabla

            }

        ],

        "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }


    })
}


/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$('.tablaVacaciones tbody').on( 'click', 'button', function () {

    if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table3.row( $(this).parents('tr') ).data();
        console.log("data", data);

    }else{

        var data = table3.row( $(this).parents('tbody tr ul li') ).data();
        
    }
    
    $(this).attr("idVacaciones", data[13]); 


} );


/*===========================================
=            CAPTURAR TIPO DE VACACIONES            =
===========================================*/

$("#tipovac").change(function () {
    var str2 = [];
    var valor2;
    $( "#tipovac option:selected" ).each(function() {
    valor2 = $("#tipovac").val();   
      str2.push( $( this ).text());
    });
    if (str2 != "") {

    var listaTipovac = [];

    for(var i = 0; i < str2.length; i++){

    listaTipovac.push({ "id" : valor2[i], 
                "nombre_tipovac" : str2[i]})

  }
  console.log("listaTipovac", listaTipovac);
  $("#ListaTipovac").val(JSON.stringify(listaTipovac)); 
    }
  })
  .change();

/*=====  End of CAPTURAR TIPO DE VACACIONES  ======*/

/*=============================================
EDITAR REPOSO
=============================================*/

$(".tablaVacaciones tbody").on("click", "button.btnEditarVacaciones", function(){

    var idVacaciones = $(this).attr("idVacaciones");
    console.log("idVacaciones", idVacaciones);
    
    var datos = new FormData();
    datos.append("idVacaciones", idVacaciones);

     $.ajax({

      url:"ajax/vacaciones.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        var cedulaPersonal = new FormData();
          cedulaPersonal.append("cedulaPersonal",respuesta["cedula_personal"]);

           $.ajax({

              url:"ajax/personal.ajax.php",
              method: "POST",
              data: cedulaPersonal,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarnombre_vaca").val(respuesta["nombre"]).focus();

                  $("#editarapellido_vaca").val(respuesta["apellido"]).focus();

                  $("#editarfingre").val(respuesta["fecha_ingreso"]).focus();


              }

          })

          

            $("#editarVacaciones").val(respuesta["id_vacaciones"]);


            var json = JSON.parse(respuesta["tipovacaciones"]);
            for (var i = 0; i < json.length; i++) {

                      $("#editarTipovaca option[value="+ json[i]["id"] +"]").attr("selected",true);

                }
            /*=============================================
              =          Editar TIPO DE VACACIONES           =
            =============================================*/
            
            $("#editarTipovaca").change(function () {
              var str2 = [];
              var valor2;
              $( "#editarTipovaca option:selected" ).each(function() {
              valor2 = $("#editarTipovaca").val();   
                str2.push( $( this ).text());
              });
              if (str2 != "") {

              var editarListaTipovac = [];

              for(var i = 0; i < str2.length; i++){

              editarListaTipovac.push({ "id" : valor2[i], 
                          "nombre_tipovac" : str2[i]})

            }
            console.log("editarListaTipovac", editarListaTipovac);
            $("#editarListaTipovac").val(JSON.stringify(editarListaTipovac)); 
              }
            })
            .change();

            /*=====  End of Section comment block  ======*/


            $("#editarfechainicio").val(respuesta["fecha_ini"]);
            $("#editarfechainicio").addClass('datepicker');

            $("#editarfechafin").val(respuesta["fecha_fin"]);
            $("#editarfechafin").addClass('datepicker');

            $("#editarfechareintegro").val(respuesta["fecha_reintegro"]);
            $("#editarfechareintegro").addClass('datepicker');

            $("#editarannos_antiguedad").val(respuesta["a_antiguedad"]).focus();

            $("#editarperiodo").val(respuesta["periodo"]).focus();

            $("#editarquinquenio").val(respuesta["quinquenio"]).focus();

            $("#editardias_disfrutar").val(respuesta["dias_disfrutar"]).focus();

            $("#editarpendientes_disfrutar").val(respuesta["pendientes_disfrutar"]).focus();

            $("#editarcedula_vaca").val(respuesta["cedula_personal"]).focus();

            $("select").material_select();

            $(".datepicker").pickadate({
                  format: "yyyy/mm/dd",
                  formatSubmit: "yyyy/mm/dd",
                  closeOnSelect: true,
                  closeOnClear: true,
                  selectMonths: true, // Creates a dropdown to control month
                  selectYears: 50, // Creates a dropdown of 15 years to control year
                  hiddenName: true
            });



      }

  })

})

/*=============================================
ELIMINAR REPOSO
=============================================*/

$(".tablaVacaciones tbody").on("click", "button.btnEliminarVacaciones", function(){

    var idVacaciones = $(this).attr("idVacaciones");
    console.log("idVacaciones", idVacaciones);
    
    swal({

        title: '¿Está seguro de querer desactivar las vacaciones? No podrá deshacer esta acción',
        text: "¡Si no lo está, puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, desactivar vacaciones!'
        }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=vacaciones&idVacaciones="+idVacaciones;

        }


    })

})


/*=============================================
VALIDAR CEDULA EXISTENTE AJAX
=============================================*/

var cedulaVacacionesExistente = false;  
var vacacionesAntiguedad = false;
$("#cedula_vaca").change(function(){

    var cedulavaca = $("#cedula_vaca").val();

    var datos = new FormData();
    datos.append("validarCedulaVacaciones", cedulavaca);
     $.ajax({
        url:"ajax/vacaciones.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            res = JSON.parse(respuesta)
            if(res != 1){

                $("div[id='cedulaVaca'] span").html('');
                $("#nombre_vaca").val(res.nombre).focus();
                $("#apellido_vaca").val(res.apellido).focus();

                var texto = res.fecha_ingreso;
                var salida = formato(texto);
                function formato(texto){
                  return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
                }
                $("#fingre").val(salida).focus();



                if ($("#fingre").val() == '00/00/0000') {
                    
                }
              var  g = res.dia_feriado
              f = g.split(",")
              array3 = [];
              for (var i = f.length - 1; i >= 0; i--) {
              j = f[i].split("-")
              anno = j[0]
              mes = j[1] - 1
              dia = j[2]
              diafd= '['+anno+','+mes+','+dia+']'

              h = new Date(anno,mes,dia)
              
              }


        var fecha = res.fecha_ingreso

        // Si la fecha es correcta, calculamos la edad
        var values=fecha.split("-");
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
        var FeIngreVal = $("#fingre").val()
        if (FeIngreVal == '00/00/0000') {
            edad = 0;
            $('#años_antiguedad').val(edad);
        }else{
            $('#años_antiguedad').val(edad);
        }



        if (edad != 0) {
            $("div[id='antiguedad'] span").html('');

            vacacionesAntiguedad = false;
        }else{
            $("div[id='antiguedad'] span").html('<p class="red-text">Este trabajador no tiene vacaciones disponibles</p>');

            vacacionesAntiguedad = true;

        }
        
        cedulaVacacionesExistente = false;

        }
            else{

                $("div[id='cedulaVaca'] span").html('<p class="red-text">Cédula no existente en la base de datos</p>');

                cedulaVacacionesExistente = true;

            }

        }   

    });

   
});





/*=====  FIN VALIDAR CEDULA EXISTENTE AJAX  ======*/
$("#btnRegistrarVacaciones").click(function(){

	$("#registrarVacaciones").toggle(400);

})

$("#btnImprimirVacaciones").click(function(){

    $("#pdfvacaciones").toggle(400);

})


function validarRegistroVacaciones(){

    var cedulaVacaciones = document.querySelector("#cedula_vaca").value; 

    var nombre = document.querySelector("#nombre_vaca").value;

    var apellido = document.querySelector("#apellido_vaca").value;

    var antiguedadVacaciones = document.querySelector("#años_antiguedad").value;



    /* VALIDAR CEDULA */

    if(cedulaVacaciones != ""){

        var caracteres = cedulaVacaciones.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 8){

            document.querySelector("div[id='cedulaVaca']").innerHTML += "<br>Escriba por favor menos de 8 caracteres.";

            return false;
        }

        if(!expresion.test(cedulaVacaciones)){

            document.querySelector("div[id='cedulaVaca']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

        if(cedulaVacacionesExistente){

            document.querySelector("div[id='cedulaVaca'] span").innerHTML = "<p class='red-text'>Cédula no existente en la base de datos</p>";

            return false;
        }

        

    }

    /* VALIDAR empleado_nombre */

    if(nombre != ""){

        var caracteres = nombre.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 20){

            document.querySelector("div[id='nombresReposo']").innerHTML += "<br>Por favor escriba un nombre con menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(nombre)){

            document.querySelector("div[id='nombresReposo']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR APELLIDO*/

    if(apellido != ""){

        var caracteres = apellido.length;
        var expresion = /^[a-zA-Z0-9]*$/;

         if(caracteres > 20){

            document.querySelector("div[id='apellidosReposo']").innerHTML += "<br>Por favor escriba un apellido con menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(apellido)){

            document.querySelector("div[id='apellidosReposo']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }


    }

     if(antiguedadVacaciones != ""){

        var caracteres = antiguedadVacaciones.length;
        var expresion = /^[a-zA-Z0-9]*$/;

         if(caracteres > 20){

            document.querySelector("div[id='antiguedad']").innerHTML += "<br>Por favor escriba una fecha antiguedad con menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(antiguedadVacaciones)){

            document.querySelector("div[id='antiguedad']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

         if(vacacionesAntiguedad){

            document.querySelector("div[id='antiguedad'] span").innerHTML = '<p class="red-text">Este trabajador no tiene vacaciones disponibles</p>';

            return false;
        }


    }


    
return true;

}



