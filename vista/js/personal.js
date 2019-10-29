

/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarPersonal" cedulaPersonal data-toggle="modal" data-target="modalEditarPersonal"><i class="material-icons">create</i></button>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarPersonal" cedulaPersonal data-toggle="modal" data-target="modalEditarPersonal"><i class="material-icons">create</i></button><button class="btn btn-small red btnEliminarPersonal" cedulaPersonal><i class="material-icons">delete</i></button></div>'
}

if (window.matchMedia("(max-width:767px)").matches){
    var table = $('.tablaPersonal').DataTable({

        "ajax":"ajax/tabla-personal.ajax.php",
        "createdRow": function (row, data, index) {

            if (data[2] == "Ingresar una fecha") {

                $('td ', row).eq(2).addClass('red-text');


            }

            if (data[3] == "Ingresar una fecha") {

                $('td ', row).eq(3).addClass('red-text');


            }
        },
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

        },


        "deferRender": true


    })

}else{

    var table = $('.tablaPersonal').DataTable({

        "ajax":"ajax/tabla-personal.ajax.php",
        "createdRow": function (row, data, index) {

            if (data[2] == "Ingresar una fecha") {

                $('td ', row).eq(2).addClass('red-text');


            }

            if (data[3] == "Ingresar una fecha") {

                $('td ', row).eq(3).addClass('red-text');


            }
        },
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

        },
        "deferRender": true


    })
}


/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$('.tablaPersonal tbody').on( 'click', 'button', function () {

    // if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table.row( $(this).parents('tr') ).data();
        console.log("data", data);

    // }else{

        // var data = table.row( $(this).parents('tbody tr ul li') ).data();
        
    // }
    
    $(this).attr("cedulaPersonal", data[0]); 


} );


/*=============================================
EDITAR Personal
=============================================*/

$(".tablaPersonal tbody").on("click", "button.btnEditarPersonal", function(){

    var cedulaPersonal = $(this).attr("cedulaPersonal");
    console.log("cedulaPersonal", cedulaPersonal);
    
    var datos = new FormData();
    datos.append("cedulaPersonal", cedulaPersonal);

     $.ajax({

      url:"ajax/personal.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          
          var idTipoper = new FormData();
          idTipoper.append("idTipoper",respuesta["cargo"]);

           $.ajax({

              url:"ajax/tipopersonal.ajax.php",
              method: "POST",
              data: idTipoper,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta2){
                  
                  $("#editarTipoper").val(respuesta2["id_tipoper"]);

                  $("#editarTipoper").removeClass('browser-default');

                  $("select").material_select();

              }

          })

           $("#editarpersonal").val(respuesta["cedula_personal"]);


           $("#editarCedula").val(respuesta["cedula_personal"]);

           $("#editarNombre").val(respuesta["nombre"]);

           $("#editarApellido").val(respuesta["apellido"]);

           if (respuesta["sexo"] == "MASCULINO") {

           $("#editarMasculino").val(respuesta["sexo"]).prop('checked',true);

           }else{

            $("#editarFemenino").val(respuesta["sexo"]).prop('checked',true);

           }

           $("#divsexo").addClass('input-group radio');


           $("#editarCargo").val(respuesta["cargo"]);
           $("#editarCargo").removeClass('browser-default');

           $("#editarUbicacion").val(respuesta["lugar_trabajo"]);
           $("#editarUbicacion").removeClass('browser-default');

           $("#editarTipocon").val(respuesta["tipocondicion"]);
           $("#editarTipocon").removeClass('browser-default');

           $("#editarCondicion").val(respuesta["condicionlab"]);
           $("#editarCondicion").removeClass('browser-default');

           $("#editarNacimiento").val(respuesta["fecha_nacimiento"]);
           $("#editarNacimiento").addClass('datepicker');

           $("#editarFechaIngreso").val(respuesta["fecha_ingreso"]);
           $("#editarFechaIngreso").addClass('datepicker');

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
ELIMINAR Personal
=============================================*/

$(".tablaPersonal tbody").on("click", "button.btnEliminarPersonal", function(){

    var cedulaPersonal = $(this).attr("cedulaPersonal");
    console.log("cedulaPersonal", cedulaPersonal);
    
    swal({

        title: '¿Está seguro de querer borrar el trabajador?',
        text: "¡Si no lo está, puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar trabajador!'
        }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=personal&cedulaPersonal="+cedulaPersonal;

        }


    })

})


/*=============================================
VALIDAR CEDULA EXISTENTE AJAX
=============================================*/

var cedulaPersonalExistente = false;  
var edadPersonal = false

$("#empleado_cedula").change(function(){

    var cedula = $("#empleado_cedula").val();
    console.log("cedula", cedula);

    var datos = new FormData();
    datos.append("validarCeduPersonal", cedula);
    
    $.ajax({
        url:"ajax/personal.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log("respuesta", respuesta);

           
            if(respuesta == 0){

                $("div[id='validarcedulaPersonal'] span").html('<p class="red-text">Cédula ya existente en la base de datos</p>');

                cedulaPersonalExistente = true;
            }

            else{

                $("div[id='validarcedulaPersonal'] span").html('');

                cedulaPersonalExistente = false;

            }

        }   

    });

});


/*=====  FIN VALIDAR CEDULA EXISTENTE AJAX  ======*/


/*=============================================
 SELECT DEPENDIENTE
=============================================*/

$("#tipoper").change(function(){

    var tipoper = $("#tipoper").val();

    var datos = new FormData();
    datos.append("Tipopersonal", tipoper);
    
    $.ajax({
        url:"ajax/personal.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){


            if (respuesta == '') {
                $("#empleado_cargo").html('<option value="" disabled selected>Seleccione</option>');
                $("#empleado_cargo").removeClass('browser-default');
                $("select").material_select();

            }else{
                $("#empleado_cargo").html(respuesta);
                $("#empleado_cargo").removeClass('browser-default');
                $("select").material_select();
            }

           
            }
    });

});

$("#editarTipoper").change(function () {

    var tipoper = $("#editarTipoper").val();

    var datos = new FormData();
    datos.append("Tipopersonal", tipoper);

    $.ajax({
        url: "ajax/personal.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {


            if (respuesta == '') {
                $("#editarCargo").html('<option value="" disabled selected>Seleccione</option>');
                $("#editarCargo").removeClass('browser-default');
                $("select").material_select();

            } else {
                $("#editarCargo").html(respuesta);
                $("#editarCargo").removeClass('browser-default');
                $("select").material_select();
            }


        }
    });

});


/*=====  FIN  SELECT DEPENDIENTE  ======*/

/*=============================================
        AGREGAR PERSONAL
=============================================*/

$("#btnRegistrarPersonal").click(function(){

    $("#registrarPersonal").toggle(400);

})


/*=====  FIN DE AGREGAR PERSONAL  ======*/

function validarRegistroPersonal(){

    var cedula = document.querySelector("#empleado_cedula").value; 

    var nombre = document.querySelector("#empleado_nombre").value;

    var apellido = document.querySelector("#empleado_apellido").value;

    var edadPersona = document.querySelector("#edad").value;



    /* VALIDAR CEDULA */

    if(cedula != ""){

        var caracteres = cedula.length;
        var expresion = /^[a-zA-Z0-9]*$/;

         if(caracteres < 6){

            document.querySelector("div[id='validarcedulaPersonal']").innerHTML += "<br>Por favor escriba más de 6 caracteres.";

            return false;
        }


        if(caracteres > 8){

            document.querySelector("div[id='validarcedulaPersonal']").innerHTML += "<br>Por favor escriba menos de 8 caracteres.";

            return false;
        }

        if(!expresion.test(cedula)){

            document.querySelector("div[id='validarcedulaPersonal']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

        if(cedulaPersonalExistente){

            document.querySelector("div[id='validarcedulaPersonal'] span").innerHTML = "<p class='red-text'>Esta cedula ya existe en la base de datos</p>";

            return false;
        }

    }

    /* VALIDAR empleado_nombre */

    if(nombre != ""){

        var caracteres = nombre.length;
        var expresion = /^[a-zA-Z0-9 ]*$/;

        if(caracteres > 20){

            document.querySelector("div[id='empleado_nombres']").innerHTML += "<br>Por favor escriba un nombre con menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(nombre)){

            document.querySelector("div[id='empleado_nombres']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR APELLIDO*/

    if(apellido != ""){

        var caracteres = apellido.length;
        var expresion = /^[a-zA-Z0-9 ]*$/;

         if(caracteres > 20){

            document.querySelector("div[id='empleado_apellidos']").innerHTML += "<br>Por favor escriba un apellido con menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(apellido)){

            document.querySelector("div[id='empleado_apellidos']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }


    }

    if(edadPersona != ""){

        var caracteres = edadPersona.length;
        var expresion = /^[a-zA-Z0-9]*$/;

         if(caracteres > 20){

            document.querySelector("div[id='EdadPersonal']").innerHTML += "<br>Por favor escriba una fecha antiguedad con menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(edadPersona)){

            document.querySelector("div[id='EdadPersonal']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

         if(edadPersonal){

            document.querySelector("div[id='EdadPersonal'] span").innerHTML = '<p class="red-text">Este trabajador es menor de edad</p>';

            return false;
        }

    }
    
return true;

}