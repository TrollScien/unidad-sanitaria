/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarLugar" idLugar data-toggle="modal" data-target="modalEditarLugar"><i class="material-icons">create</i></button>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarLugar" idLugar data-toggle="modal" data-target="modalEditarLugar"><i class="material-icons">create</i></button><button class="btn btn-small red btnEliminarLugar" idLugar><i class="material-icons">delete</i></button></div>'
}

if (window.matchMedia("(max-width:767px)").matches){
    var table5 = $('.tablaLugar').DataTable({

        "ajax":"ajax/tabla-lugar.ajax.php",
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

    var table5 = $('.tablaLugar').DataTable({

        "ajax":"ajax/tabla-lugar.ajax.php",
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

$('.tablaLugar tbody').on( 'click', 'button', function () {

    // if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table5.row( $(this).parents('tr') ).data();
        console.log("data", data);

    // }else{

        // var data = table5.row( $(this).parents('tbody tr ul li') ).data();
        
    // }
    
    $(this).attr("idLugar", data[2]); 


} );


/*=============================================
EDITAR Personal
=============================================*/

$(".tablaLugar tbody").on("click", "button.btnEditarLugar", function(){

    var idLugar = $(this).attr("idLugar");

	var datos = new FormData();
    datos.append("idLugar", idLugar);

    $.ajax({

      url:"ajax/lugar.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
	 	   $("#idLugar").val(respuesta["id_lugardetrabajo"]);

	       $("#editarLugar").val(respuesta["nombre_lugar"]);
	  }

  	})

})

/*=============================================
ELIMINAR CARGO
=============================================*/

$(".tablaLugar tbody").on("click", "button.btnEliminarLugar", function(){

    var idLugar = $(this).attr("idLugar");
	
	swal({
        title: '¿Está seguro de querer borrar el lugar de trabajo?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar lugar de trabajo!'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=lugar&idLugar="+idLugar;
        }

  })

})
