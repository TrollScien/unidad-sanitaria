<?php

class GestorTipovacaciones{

	#GUARDAR TIPO DE VACACIONES
	#------------------------------------------------------------
	public function guardarTipovacacionesController(){

		if(isset($_POST["nombre_tipovac"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_tipovac"])){

			   	$tabla = "tipo_vacaciones";

			   	$datos = array("nombre_tipovac"=>$_POST["nombre_tipovac"]);

			   	$respuesta = GestorTipovacacionesModel::guardarTipovacacionesModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de vacaciones ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "tipovacaciones";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del tipo de vacaciones no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "tipovacaciones";

							}
						})

			  	</script>';



			}

		}	

	}

	#VISUALIZAR LOS TIPO DE VACACIONES
	#------------------------------------------------------------

	public function verTipovacacionesController($item, $valor){

		$tabla = "tipo_vacaciones";

		$respuesta = GestorTipovacacionesModel::verTipovacacionesModel($tabla, $item, $valor);

		return $respuesta;

		
	}

	#EDITAR TIPO DE VACACIONES
	#------------------------------------------------------------

	public function editarTipovacacionesController(){

		if(isset($_POST["editarTipovac"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipovac"])){

			   	$tabla = "tipo_vacaciones";

			   	$datos = array("editarTipovac"=>$_POST["editarTipovac"],
			   				   "idTipovac"=>$_POST["idTipovac"]);

			   	$respuesta = GestorTipovacacionesModel::editarTipovacacionesModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de vacaciones ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "tipovacaciones";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del tipo de vacaciones no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "tipovacaciones";

							}
						})

			  	</script>';



			}

		}	

	}

	#BORRAR TIPO DE VACACIONES
	#------------------------------------------------------------

	public function borrarTipovacacionesController(){

		if(isset($_GET["idTipovac"])){

			$tabla = "tipo_vacaciones";

			$datos = $_GET["idTipovac"];

			$respuesta = GestorTipovacacionesModel::borrarTipovacacionesModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El tipo de vacaciones ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "tipovacaciones";

								}
							})

				</script>';

			}		

		}


	}

	public function impresionTipovacacionesController($item,$valor){

		$tabla = "tipo_vacaciones";

		$respuesta = GestorTipovacacionesModel::verTipovacacionesModel($tabla,$item,$valor);
	
		return $respuesta;



	}


}