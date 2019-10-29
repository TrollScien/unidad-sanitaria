/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarMedico" idMedico data-toggle="modal" data-target="modalEditarMedico"><i class="material-icons">create</i></button>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarMedico" idMedico data-toggle="modal" data-target="modalEditarMedico"><i class="material-icons">create</i></button><button class="btn btn-small red btnEliminarMedico" idMedico><i class="material-icons">delete</i></button></div>'
}

if (window.matchMedia("(max-width:767px)").matches){
    var table6 = $('.tablaMedico').DataTable({

        "ajax":"ajax/tabla-medico.ajax.php",
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

    var table6 = $('.tablaMedico').DataTable({

        "ajax":"ajax/tabla-medico.ajax.php",
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
}


/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$('.tablaMedico tbody').on( 'click', 'button', function () {

    // if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table6.row( $(this).parents('tr') ).data();
        console.log("data", data);

    // }else{

        // var data = table6.row( $(this).parents('tbody tr ul li') ).data();
        
    // }
    
    $(this).attr("idMedico", data[2]); 


} );


/*=============================================
EDITAR Personal
=============================================*/

$(".tablaMedico tbody").on("click", "button.btnEditarMedico", function(){

    var idMedico = $(this).attr("idMedico");

	var datos = new FormData();
    datos.append("idMedico", idMedico);

    $.ajax({

      url:"ajax/medico.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
	 	   $("#idMedico").val(respuesta["id_medico"]);

	 	   $("#editarDoc").val(respuesta["doc"]);

     	   $("#editarDoc").removeClass('browser-default');

           $("select").material_select();

	       $("#EditarNombre").val(respuesta["nombre_medico"]);
	       $("#EditarApellido").val(respuesta["apellido_medico"]);
	  }

  	})

})

/*=============================================
ELIMINAR CARGO
=============================================*/

$(".tablaMedico tbody").on("click", "button.btnEliminarMedico", function(){

    var idMedico = $(this).attr("idMedico");
	
	swal({
        title: '¿Está seguro de querer borrar a este médico?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar médico!'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=medico&idMedico="+idMedico;
        }

  })

})
