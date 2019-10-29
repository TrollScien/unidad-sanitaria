<?php

class GestorTipoCondicion{

	#GUARDAR TIPO DE CONDICION
	#------------------------------------------------------------
	public function guardarTipoCondicionController(){

		if(isset($_POST["nombre_tipocon"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_tipocon"])){

			   	$tabla = "tipo_condicion";

			   	$datos = array("nombre_tipocon"=>$_POST["nombre_tipocon"]);

			   	$respuesta = GestorTipoCondicionModel::guardarTipoCondicionModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de condición ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "tipocondicion";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del tipo de condición no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "tipocondicion";

							}
						})

			  	</script>';



			}

		}	

	}

	#VISUALIZAR LOS TIPO DE CONDICIONES
	#------------------------------------------------------------

	public function verTipoCondicionController($item, $valor){

		$tabla = "tipo_condicion";

		$respuesta = GestorTipoCondicionModel::verTipoCondicionModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR TIPO DE CONDICION
	#------------------------------------------------------------

	public function editarTipoCondicionController(){

		if(isset($_POST["editarTipocon"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipocon"])){

			   	$tabla = "tipo_condicion";

			   	$datos = array("editarTipocon"=>$_POST["editarTipocon"],
			   				   "idTipocon"=>$_POST["idTipocon"]);

			   	$respuesta = GestorTipoCondicionModel::editarTipoCondicionModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de condición ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "tipocondicion";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del tipo de condición no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "tipocondicion";

							}
						})

			  	</script>';



			}

		}	
	}

	#BORRAR TIPO DE CONDICION
	#------------------------------------------------------------

	public function borrarTipoCondicionController(){

		if(isset($_GET["idTipocon"])){

			$tabla = "tipo_condicion";

			$datos = $_GET["idTipocon"];

			$respuesta = GestorTipoCondicionModel::borrarTipoCondicionModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El tipo de condición ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "tipocondicion";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionTipocondicionController($item,$valor){

		$tabla = "tipo_condicion";

		$respuesta = GestorTipocondicionModel::verTipocondicionModel($tabla,$item,$valor);
	
		return $respuesta;



	}


}