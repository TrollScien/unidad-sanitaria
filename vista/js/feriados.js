/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<button class="btn btn-small red diasabled btnEliminarDiaf" idDiaf><i class="material-icons">delete</i></button></div>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn btn-small red btnEliminarDiaf" idDiaf><i class="material-icons">delete</i></button></div>'
}

if (window.matchMedia("(max-width:767px)").matches){
    var table11 = $('.tablaDiaferiado').DataTable({

        "ajax":"ajax/tabla-diaferiado.ajax.php",
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

    var table11 = $('.tablaDiaferiado').DataTable({

        "ajax":"ajax/tabla-diaferiado.ajax.php",
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

$('.tablaDiaferiado tbody').on( 'click', 'button', function () {

    // if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table11.row( $(this).parents('tr') ).data();
        console.log("data", data);

    // }else{

        // var data = table11.row( $(this).parents('tbody tr ul li') ).data();
        
    // }
    
    $(this).attr("idDiaf", data[2]); 


} );



/*=============================================
ELIMINAR DIAFERIADO
=============================================*/

$(".tablaDiaferiado tbody").on("click", "button.btnEliminarDiaf", function(){

    var idDiaf = $(this).attr("idDiaf");
	
	swal({
        title: '¿Está seguro de querer borrar este día feriado?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar día feriado!'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=diasferiados&idDiaf="+idDiaf;
        }

  })

})
