<?php

class GestorPatologia{

	#GUARDAR PATOLOGÍA
	#------------------------------------------------------------
	public function guardarPatologiaController(){

		if(isset($_POST["nombre_patologia"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_patologia"])){

			   	$tabla = "patologia";

			   	$datos = array("nombre_patologia"=>$_POST["nombre_patologia"]);

			   	$respuesta = GestorPatologiaModel::guardarPatologiaModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La patología ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "patologias";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos de la patología no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "patologias";

							}
						})

			  	</script>';



			}

		}	
	}

	#VISUALIZAR LOS PATOLOGÍAS
	#------------------------------------------------------------

	public function verPatologiaController($item, $valor){

		$tabla = "patologia";

		$respuesta = GestorPatologiaModel::verPatologiaModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR PATOLOGÍA
	#------------------------------------------------------------

	public function editarPatologiaController(){

		if(isset($_POST["editarPatologia"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPatologia"])){

			   	$tabla = "patologia";

			   	$datos = array("editarPatologia"=>$_POST["editarPatologia"],
			   				   "idPatologia"=>$_POST["idPatologia"]);

			   	$respuesta = GestorPatologiaModel::editarPatologiaModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La patología ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "patologias";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos de la patología no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "patologias";

							}
						})

			  	</script>';



			}

		}	

	}

	#BORRAR PATOLOGÍA
	#------------------------------------------------------------

	public function borrarPatologiaController(){

		if(isset($_GET["idPatologia"])){

			$tabla = "patologia";

			$datos = $_GET["idPatologia"];

			$respuesta = GestorPatologiaModel::borrarPatologiaModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La patologia ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "patologias";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionPatologiaController($item,$valor){

		$tabla = "patologia";

		$respuesta = GestorPatologiaModel::verPatologiaModel($tabla,$item,$valor);
	
		return $respuesta;



	}


}