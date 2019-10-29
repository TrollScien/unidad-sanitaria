
/*=============================================
VALIDAR CEDULA EXISTENTE AJAX
=============================================*/

$("#empleado_cedula").change(function(){

	var cedula = $("#empleado_cedula").val();

	var datos = new FormData();
	datos.append("validarCedula", cedula);
	
	$.ajax({
		url:"vista/modulos/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == 0){

				$("div[id='cedula'] span").html('<p class="red-text">Esta cédula ya existe en la base de datos</p>');

				cedulaExistente = true;
			}

			else{

				$("div[id='cedula'] span").html("");

				cedulaExistente = false;

			}
		
		}

	});

});

/*=====  FIN VALIDAR CEDULA EXISTENTE AJAX  ======*/

/*=============================================
			SWEETALERT PERSONAL
=============================================*/
// document.querySelector('#formularioPerfil').addEventListener('submit', function(e) {
//             var form = this;
//             e.preventDefault();
//             swal({
//                 title: "¿Desea registrar a este trabajador?",
//                 type: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: '#303F9F',
//                 cancelButtonColor: '#DD6B55',
//                 confirmButtonText: '¡Sí, registralo!',
//                 cancelButtonText: "¡No, cancelalo!",
//                 closeOnConfirm: false,
//                 closeOnCancel: false
//             },
//             function(isConfirm) {
//                 if (isConfirm) {
//                     swal({
//                         title: '¡Registro exitoso!',
//                         text: '¡El trabajador ha sido registrado exitosamente!',
//                         type: 'success',
//                         confirmButtonColor: '#303F9F'
//                     }, function() {
//                         form.submit();
//                     });
                    
//                 } else {
//                     swal({title:"Cancelado", 
//                         text:"Este trabajador no ha sido registrado",type: "error",confirmButtonColor:'#303F9F'});
//                 }
//             });
//         });


/*=====  FIN DE SWEETALERT PERSONAL  ======*/

/*=============================================
		AGREGAR	PERSONAL
=============================================*/

$("#btnRegistrarPerfil").click(function(){

	$("#registarPerfil").toggle(400);

})


/*=====  FIN DE AGREGAR PERSONAL  ======*/

function validarRegistrssoPersonal(){

    var cedula = document.querySelector("#empleado_cedula").value; 

    var nombre = document.querySelector("#empleado_nombre").value;

    var apellido = document.querySelector("#empleado_nombre").value;



    /* VALIDAR CEDULA */

    if(cedula != ""){

        var caracteres = cedula.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 8){

            document.querySelector("label[for='empleado_cedula']").innerHTML += "<br>Escriba por favor menos de 8 caracteres.";

            return false;
        }

        if(!expresion.test(cedula)){

            document.querySelector("label[for='empleado_cedula']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

        if(usuarioExistente){

            document.querySelector("label[for='empleado_cedula'] span").innerHTML = "<p>Esta cedula ya existe en la base de datos</p>";

            return false;
        }

    }

    /* VALIDAR empleado_nombre */

    if(nombre != ""){

        var caracteres = nombre.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 20){

            document.querySelector("label[for='empleado_nombre']").innerHTML += "<br>Escriba por favor menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(nombre)){

            document.querySelector("label[for='empleado_nombre']").innerHTML += "<br>No escriba caracteres especiales.";

            return false;

        }

    }

    /* VALIDAR APELLIDO*/

    if(apellido != ""){

        var caracteres = apellido.length;
        var expresion = /^[a-zA-Z0-9]*$/;

         if(caracteres > 20){

            document.querySelector("label[for='empleado_apellido']").innerHTML += "<br>Escriba por favor menos de 20 caracteres.";

            return false;
        }

        if(!expresion.test(apellido)){

            document.querySelector("label[for='empleado_apellido']").innerHTML += "<br>Escriba correctamente el apellido.";

            return false;

        }


    }


    
return true;

}