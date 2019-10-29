/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarTipocon" idTipocon data-toggle="modal" data-target="modalEditarTipocon"><i class="material-icons">create</i></button>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarTipocon" idTipocon data-toggle="modal" data-target="modalEditarTipocon"><i class="material-icons">create</i></button><button class="btn btn-small red btnEliminarTipocon" idTipocon><i class="material-icons">delete</i></button></div>'
}

if (window.matchMedia("(max-width:767px)").matches){
    var table9 = $('.tablaTipocon').DataTable({

        "ajax":"ajax/tabla-tipocon.ajax.php",
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

    var table9 = $('.tablaTipocon').DataTable({

        "ajax":"ajax/tabla-tipocon.ajax.php",
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

$('.tablaTipocon tbody').on( 'click', 'button', function () {

    // if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table9.row( $(this).parents('tr') ).data();
        console.log("data", data);

    // }else{

        // var data = table9.row( $(this).parents('tbody tr ul li') ).data();
        
    // }
    
    $(this).attr("idTipocon", data[2]); 


} );


/*=============================================
EDITAR Personal
=============================================*/

$(".tablaTipocon tbody").on("click", "button.btnEditarTipocon", function(){

    var idTipocon = $(this).attr("idTipocon");

	var datos = new FormData();
    datos.append("idTipocon", idTipocon);

    $.ajax({

      url:"ajax/tipocon.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);
      
	 	   $("#idTipocon").val(respuesta["id_tipocondicion"]);

	       $("#editarTipocon").val(respuesta["nombre_tipocon"]);
	  }

  	})

})

/*=============================================
ELIMINAR CARGO
=============================================*/

$(".tablaTipocon tbody").on("click", "button.btnEliminarTipocon", function(){

    var idTipocon = $(this).attr("idTipocon");
	
	swal({
        title: '¿Está seguro de querer borrar este tipo de condición?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tipo de condición!'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=tipocondicion&idTipocon="+idTipocon;
        }

  })

})
