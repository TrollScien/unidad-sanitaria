/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger waves-effect waves-light btnEditarReposo" idReposo data-toggle="modal" data-target="modalEditarReposo"><i class="material-icons">create</i></button></div>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger waves-effect waves-light btnEditarReposo" idReposo data-toggle="modal" data-target="modalEditarReposo"><i class="material-icons">create</i></button><button class="btn red btnEliminarReposo" idReposo><i class="material-icons">delete</i></button></div>'
}


var estado = '<button class="btn btnActivarReposo" idReposo="" >Activo</button>';

if (window.matchMedia("(max-width:767px)").matches){
    var table2 = $('.tablaReposo').DataTable({

        "ajax":"ajax/tabla-reposo.ajax.php",

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

    var table2 = $('.tablaReposo').DataTable({


        "ajax":"ajax/tabla-reposo.ajax.php",
        "createdRow": function ( row, data, index ) {

            if ( data[8] == "Desactivado" ) {

                $('.btnActivarReposo ', row).addClass('red');
                $('.btnActivarReposo ',row).text('Desactivado');

                $('.btnEditarReposo',row).addClass('disabled');
                $('.btnEliminarReposo',row).remove();

            }else if(data[8] == "Desactivar"){

              $('.btnActivarReposo ', row).addClass('orange');
              $('.btnActivarReposo ',row).text('Finalizado');

            }else{

              $('.btnActivarReposo ', row).addClass('green');
              $('.btnEliminarReposo',row).remove();


            }
          },


        "columnDefs": [

           {
              "targets": -3,
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

$('.tablaReposo tbody').on( 'click', 'button', function () {

    if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table2.row( $(this).parents('tr') ).data();
        console.log("data", data);

    }else{

        var data = table2.row( $(this).parents('tbody tr ul li') ).data();
        
    }
    
    $(this).attr("idReposo", data[10]); 


} );


/*===========================================
=            CAPTURAR PATOLOGÍAS            =
===========================================*/

$("#patologiareposo").change(function () {
    var str = [];
    var valor;
    $( "#patologiareposo option:selected" ).each(function() {
    valor = $("#patologiareposo").val();   
      str.push( $( this ).text());
    });
    if (str != "") {

    var listaPatologias = [];

    for(var i = 0; i < str.length; i++){

    listaPatologias.push({ "id" : valor[i], 
                "nombre_patologia" : str[i]})

  }
  // console.log("listaPatologias", listaPatologias);
  $("#listaPatologias").val(JSON.stringify(listaPatologias)); 
    }
  })
  .change();

/*=====  End of CAPTURAR PATOLOGÍAS  ======*/

/*=============================================
EDITAR REPOSO
=============================================*/

$(".tablaReposo tbody").on("click", "button.btnEditarReposo", function(){

    var idReposo = $(this).attr("idReposo");
    console.log("idReposo", idReposo);
    
    var datos = new FormData();
    datos.append("idReposo", idReposo);

     $.ajax({

      url:"ajax/reposo.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	var cedulaPersonal = new FormData();
          cedulaPersonal.append("cedulaPersonal",respuesta["cedula_perso"]);

           $.ajax({

              url:"ajax/personal.ajax.php",
              method: "POST",
              data: cedulaPersonal,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarNombrereposo").val(respuesta["nombre"]).focus();

                  $("#editarApellidoreposo").val(respuesta["apellido"]).focus();


              }

          })

          

      		$("#editarCodigo").val(respuesta["codigoReposo"]).focus();

		      $("#editarReposo").val(respuesta["id_reposo"]);


           	$("#editarMedicoreposo").val(respuesta["medico_reposo"]);
           	$("#editarMedicoreposo").removeClass('browser-default');

           	// $("#editarPatologiareposo").val(respuesta["patologias"]).attr("selected",true);
           	var json = JSON.parse(respuesta["patologias"]);
           	for (var i = 0; i < json.length; i++) {

				      $("#editarPatologiareposo option[value="+ json[i]["id"] +"]").attr("selected",true);

    		    }
            /*=============================================
              =          Editar patologías           =
            =============================================*/
            
            $("#editarPatologiareposo").change(function () {
              var str2 = [];
              var valor2;
              $( "#editarPatologiareposo option:selected" ).each(function() {
              valor2 = $("#editarPatologiareposo").val();   
                str2.push( $( this ).text());
              });
              if (str2 != "") {

              var editarListaPatologias = [];

              for(var i = 0; i < str2.length; i++){

              editarListaPatologias.push({ "id" : valor2[i], 
                          "nombre_patologia" : str2[i]})

            }
            console.log("editarListaPatologias", editarListaPatologias);
            $("#editarListaPatologias").val(JSON.stringify(editarListaPatologias)); 
              }
            })
            .change();

            /*=====  End of Section comment block  ======*/


           	$("#editarFecha_inicioreposo").val(respuesta["fecha_inicio"]);
           	$("#editarFecha_inicioreposo").addClass('datepicker');

           	$("#editarFecha_finreposo").val(respuesta["fecha_fin"]);
           	$("#editarFecha_finreposo").addClass('datepicker');

           	$("#editarDiasreposo").val(respuesta["dias_reposo"]).focus();

           	$("#editarObservaciones").val(respuesta["observaciones"]).focus();

           	$("#editarCedulareposo").val(respuesta["cedula_perso"]).focus();

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

$(".tablaReposo tbody").on("click", "button.btnEliminarReposo", function(){

    var idReposo = $(this).attr("idReposo");
    console.log("idReposo", idReposo);
    
    swal({

        title: '¿Está seguro de querer desactivar el reposo? No podrá deshacer esta acción',
        text: "¡Si no lo está, puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, desactivar reposo!'
        }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=reposo&idReposo="+idReposo;

        }


    })

})


/*=============================================
VALIDAR CEDULA EXISTENTE AJAX
=============================================*/

var cedulaRepososExistente = false;  

$("#cedulareposo").change(function(){

    var cedulareposoper = $("#cedulareposo").val();

    var datos = new FormData();
    datos.append("validarCedulaReposos", cedulareposoper);
    
    $.ajax({
        url:"ajax/reposo.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          res = JSON.parse(respuesta)
        	console.log(res);
            if(res != 1){

                $("div[id='validarcedulaReposos'] span").html('');
                $("#nombrereposo").val(res.nombre).focus();
                $("#apellidoreposo").val(res.apellido).focus();

                cedulaRepososExistente = false;
            }

            else{

                $("div[id='validarcedulaReposos'] span").html('<p class="red-text">Cédula no existente en la base de datos</p>');

                cedulaRepososExistente = true;

            }

        }   

    });

});




/*=====  FIN VALIDAR CEDULA EXISTENTE AJAX  ======*/

$("#btnRegistrarReposo").click(function(){

	$("#registrarReposo").toggle(400);

});

$("#btnImprimirReposo").click(function(){

    $("#pdf").toggle(400);

});



function validarRegistroReposos(){

    var cedulaReposoperso = document.querySelector("#cedulareposo").value; 

    var nombre = document.querySelector("#nombrereposo").value;

    var apellido = document.querySelector("#apellidoreposo").value;

    var observaciones = document.querySelector("#observaciones").value;



    /* VALIDAR CEDULA */

    if(cedulaReposoperso != ""){

        var caracteres = cedulaReposoperso.length;
        var expresion = /^[0-9]*$/;

        if(caracteres > 8){

            document.querySelector("div[id='validarcedulaReposos']").innerHTML += "<br>Escriba por favor menos de 8 caracteres.";

            return false;
        }

        if(!expresion.test(cedulaReposoperso)){

            document.querySelector("div[id='validarcedulaReposos']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

       if(cedulaRepososExistente){

            document.querySelector("div[id='validarcedulaReposos'] span").innerHTML = "<p class='red-text'>Cédula no existente en la base de datos</p>";

            return false;
        }
       

    }

    /* VALIDAR empleado_nombre */

    if(nombre != ""){

        var caracteres = nombre.length;
        var expresion = /^[a-zA-Z0-9\s]*$/;

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
        var expresion = /^[a-zA-Z0-9\s]*$/;

         if(caracteres > 20){

            document.querySelector("div[id='apellidosReposo']").innerHTML += "<br>Por favor escriba un apellido con menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(apellido)){

            document.querySelector("div[id='apellidosReposo']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }


    }

     if(observaciones != ""){

        var caracteres = observaciones.length;
        var expresion = /^[a-zA-Z0-9\s]*$/;

         if(caracteres > 200){

            document.querySelector("div[id='observacionesReposo']").innerHTML += "<br>Por favor escriba un observaciones con menos de 200 caracteres.";

            return false;
        }

        if(!expresion.test(observaciones)){

            document.querySelector("div[id='observacionesReposo']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }


    }


    
return true;

}