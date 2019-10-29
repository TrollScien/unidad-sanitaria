<?php

class GestorLugar{

	#GUARDAR LUGAR
	#------------------------------------------------------------
	public function guardarLugarController(){

		if(isset($_POST["nombre_lugar"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_lugar"])){

			   	$tabla = "lugar";

			   	$datos = array("nombre_lugar"=>$_POST["nombre_lugar"]);

			   	$respuesta = GestorLugarModel::guardarLugarModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El lugar de trabajo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "lugar";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos de El lugar de trabajo no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "lugar";

							}
						})

			  	</script>';



			}

		}

	}

	#VISUALIZAR LOS LUGARES
	#------------------------------------------------------------

	public function verLugarController($item, $valor){

		$tabla = "lugar";

		$respuesta = GestorLugarModel::verLugarModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR LUGAR
	#------------------------------------------------------------

	public function editarLugarController(){

		if(isset($_POST["editarLugar"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLugar"])){

			   	$tabla = "lugar";

			   	$datos = array("editarLugar"=>$_POST["editarLugar"],
			   				   "idLugar"=>$_POST["idLugar"]);

			   	$respuesta =  GestorLugarModel::editarLugarModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El lugar de trabajo ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "lugar";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del lugar de trabajo no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "lugar";

							}
						})

			  	</script>';



			}

		}

	}

	#BORRAR LUGAR
	#------------------------------------------------------------

	public function borrarLugarController(){

		if(isset($_GET["idLugar"])){

			$tabla = "lugar";

			$datos = $_GET["idLugar"];

			$respuesta = GestorLugarModel::borrarLugarModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El lugar de trabajo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "lugar";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionLugarController($item,$valor){

		$tabla = "lugar";

		$respuesta = GestorLugarModel::verLugarModel($tabla,$item,$valor);
	
		return $respuesta;



	}


}