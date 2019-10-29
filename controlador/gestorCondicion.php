<?php

class GestorCondicion{

	#GUARDAR CONDICIÓN
	#------------------------------------------------------------
	public function guardarCondicionController(){

		if(isset($_POST["nombre_condicion"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_condicion"])){

			   	$tabla = "condicionlab";

			   	$datos = array("nombre_condicion"=>$_POST["nombre_condicion"]);

			   	$respuesta = GestorCondicionModel::guardarCondicionModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La condición ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "condicion";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos de la condición no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "condicion";

							}
						})

			  	</script>';



			}

		}

	}

	#VISUALIZAR LOS CONDICIONES
	#------------------------------------------------------------

	public function verCondicionController($item, $valor){

		$tabla = "condicionlab";

		$respuesta = GestorCondicionModel::verCondicionModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR CONDICIÓN
	#------------------------------------------------------------

	public function editarCondicionController(){

		if(isset($_POST["editarCondicion"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCondicion"])){

			   	$tabla = "condicionlab";

			   	$datos = array("editarCondicion"=>$_POST["editarCondicion"],
			   				   "idCondicion"=>$_POST["idCondicion"]);

			   	$respuesta = GestorCondicionModel::editarCondicionModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La condición ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "condicion";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos de la condición no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "condicion";

							}
						})

			  	</script>';



			}

		}

	}

	#BORRAR CONDICIÓN
	#------------------------------------------------------------

	public function borrarCondicionController(){

		if(isset($_GET["idCondicion"])){

			$tabla = "condicionlab";

			$datos = $_GET["idCondicion"];

			$respuesta = GestorCondicionModel::borrarCondicionModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La condición ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "condicion";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionCondicionController($item,$valor){

		$tabla = "condicionlab";

		$respuesta = GestorCondicionModel::verCondicionModel($tabla,$item,$valor);
	
		return $respuesta;



	}

}