<?php

class GestorTipoper{

	#GUARDAR TIPO DE PERSONAL
	#------------------------------------------------------------
	public function guardarTipoperController(){

		if(isset($_POST["nombre_tipoper"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_tipoper"])){

			   	$tabla = "tipo_personal";

			   	$datos = array("nombre_tipoper"=>$_POST["nombre_tipoper"]);

			   	$respuesta = GestorTipoperModel::guardarTipoperModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de personal ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "tipopersonal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del tipo de personal no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "tipopersonal";

							}
						})

			  	</script>';



			}

		}	

	}

	#VISUALIZAR LOS TIPO DE PERSONAL
	#------------------------------------------------------------

	public function verTipoperController($item, $valor){

		$tabla = "tipo_personal";

		$respuesta = GestorTipoperModel::verTipoperModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR TIPO DE PERSONAL
	#------------------------------------------------------------

	public function editarTipoperController(){

		if(isset($_POST["editarTipoper"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipoper"])){

			   	$tabla = "tipo_personal";

			   	$datos = array("editarTipoper"=>$_POST["editarTipoper"],
			   				   "idTipoper"=>$_POST["idTipoper"]);

			   	$respuesta = GestorTipoperModel::editarTipoperModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de personal ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "tipopersonal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del tipo de personal no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "tipopersonal";

							}
						})

			  	</script>';



			}

		}	

	}

	#BORRAR TIPO DE PERSONAL
	#------------------------------------------------------------

	public function borrarTipoperController(){

		if(isset($_GET["idTipoper"])){

			$tabla = "tipo_personal";

			$datos = $_GET["idTipoper"];

			$respuesta = GestorTipoperModel::borrarTipoperModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El tipo de personal ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "tipopersonal";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionTipoperController($item,$valor){

		$tabla = "tipo_personal";

		$respuesta = GestorTipoperModel::verTipoperModel($tabla,$item,$valor);
	
		return $respuesta;



	}


}