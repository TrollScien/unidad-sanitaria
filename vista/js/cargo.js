/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

if($(".perfilUsuario").val() != "Administrador"){
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarCargo" idCargo data-toggle="modal" data-target="modalEditarCargo"><i class="material-icons">create</i></button>'

}else{
    var botonesTabla = '<div class="btn-group"><button class="btn modal-trigger btn-small btnEditarCargo" idCargo data-toggle="modal" data-target="modalEditarCargo"><i class="material-icons">create</i></button><button class="btn btn-small red btnEliminarCargo" idCargo><i class="material-icons">delete</i></button></div>'
}

if (window.matchMedia("(max-width:767px)").matches){
    var table3 = $('.tablaCargo').DataTable({

        "ajax":"ajax/tabla-cargo.ajax.php",
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

    var table3 = $('.tablaCargo').DataTable({

        "ajax":"ajax/tabla-cargo.ajax.php",
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

$('.tablaCargo tbody').on( 'click', 'button', function () {

    // if (window.matchMedia("(min-width:992px)").matches){
    
        var data = table3.row( $(this).parents('tr') ).data();
        console.log("data", data);

    // }else{

        // var data = table3.row( $(this).parents('tbody tr ul li') ).data();
        
    // }
    
    $(this).attr("idCargo", data[3]); 


} );


/*=============================================
EDITAR Personal
=============================================*/

$(".tablaCargo tbody").on("click", "button.btnEditarCargo", function(){

    var idCargo = $(this).attr("idCargo");

	var datos = new FormData();
    datos.append("idCargo", idCargo);

    $.ajax({

      url:"ajax/cargo.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      

	      var idTipoper = new FormData();
          idTipoper.append("idTipoper",respuesta["id_cargo"]);

           $.ajax({

              url:"ajax/tipopersonal.ajax.php",
              method: "POST",
              data: idTipoper,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta2){
              	console.log("respuesta2", respuesta2);
                  
                  $("#editarTipopercargo").val(respuesta2["id_tipoper"]);

                  $("#editarTipopercargo").removeClass('browser-default');

                  $("select").material_select();

              }

          })

      	   $("#idCargo").val(respuesta["id_cargo"]);

	       $("#editarCargo").val(respuesta["nombre_cargo"]);
	  }

  	})

})

/*=============================================
ELIMINAR CARGO
=============================================*/

$(".tablaCargo tbody").on("click", "button.btnEliminarCargo", function(){

    var idCargo = $(this).attr("idCargo");
	
	swal({
        title: '¿Está seguro de querer borrar el cargo?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cargo!'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=cargo&idCargo="+idCargo;
        }

  })

})
