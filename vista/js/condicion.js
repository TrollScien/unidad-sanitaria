/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarCondicion" idCondicion data-toggle="modal" data-target="modalEditarCondicion"><i class="material-icons">create</i></button>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarCondicion" idCondicion data-toggle="modal" data-target="modalEditarCondicion"><i class="material-icons">create</i></button><button class="btn btn-small red btnEliminarCondicion" idCondicion><i class="material-icons">delete</i></button></div>'
}

if (window.matchMedia("(max-width:767px)").matches){
    var table4 = $('.tablaCondicion').DataTable({

        "ajax":"ajax/tabla-condicion.ajax.php",
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

    var table4 = $('.tablaCondicion').DataTable({

        "ajax":"ajax/tabla-condicion.ajax.php",
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

$('.tablaCondicion tbody').on( 'click', 'button', function () {

    // if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table4.row( $(this).parents('tr') ).data();
        console.log("data", data);

    // }else{

        // var data = table4.row( $(this).parents('tbody tr ul li') ).data();
        
    // }
    
    $(this).attr("idCondicion", data[2]); 


} );


/*=============================================
EDITAR Personal
=============================================*/

$(".tablaCondicion tbody").on("click", "button.btnEditarCondicion", function(){

    var idCondicion = $(this).attr("idCondicion");

	var datos = new FormData();
    datos.append("idCondicion", idCondicion);

    $.ajax({

      url:"ajax/condicion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
	 	   $("#idCondicion").val(respuesta["id_condicion"]);

	       $("#editarCondicion").val(respuesta["nombre_condicion"]);
	  }

  	})

})

/*=============================================
ELIMINAR CARGO
=============================================*/

$(".tablaCondicion tbody").on("click", "button.btnEliminarCondicion", function(){

    var idCondicion = $(this).attr("idCondicion");
	
	swal({
        title: '¿Está seguro de querer borrar la condición?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar condición!'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=condicion&idCondicion="+idCondicion;
        }

  })

})
