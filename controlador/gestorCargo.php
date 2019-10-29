<?php

class GestorCargo{

	#GUARDAR CARGO
	#------------------------------------------------------------
	public function guardarCargoController(){

		if(isset($_POST["tipoper"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrecar"]) &&
			   preg_match('/^[0-9]+$/', $_POST["tipoper"])){

			   	$tabla = "cargo";

			   	$datos = array("tipoper"=>$_POST["tipoper"], 
							   "nombrecar"=>$_POST["nombrecar"]);

			   	$respuesta = GestorCargoModel::guardarCargoModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cargo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "cargo";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del cargo no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "cargo";

							}
						})

			  	</script>';



			}

		}

	}

	#VISUALIZAR LOS CARGOS
	#------------------------------------------------------------

	public function verCargoController($item, $valor){

		$tabla = "cargo";

		$respuesta = GestorCargoModel::verCargoModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR CARGO
	#------------------------------------------------------------

	public function editarCargoController(){

		if(isset($_POST["editarTipopercargo"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCargo"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarTipopercargo"])){

			   	$tabla = "cargo";

			   	$datos = array("editarTipopercargo"=>$_POST["editarTipopercargo"], 
							   "editarCargo"=>$_POST["editarCargo"],
								"id"=>$_POST["idCargo"]);

			   	$respuesta = GestorCargoModel::editarCargoModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cargo ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "cargo";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del cargo no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "cargo";

							}
						})

			  	</script>';



			}

		}

	}

	#BORRAR CARGO
	#------------------------------------------------------------

	public function borrarCargoController(){

		if(isset($_GET["idCargo"])){

			$tabla = "cargo";

			$datos = $_GET["idCargo"];

			$respuesta = GestorCargoModel::borrarCargoModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cargo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "cargo";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionCargoController($item,$valor){

		$tabla = "cargo";

		$respuesta = GestorCargoModel::verCargoModel($tabla,$item,$valor);
	
		return $respuesta;



	}


}