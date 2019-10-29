<?php

class GestorFeriado{

	#GUARDAR FERIADOS
	#------------------------------------------------------------
	public function guardarFeriadoController(){

		if(isset($_POST["feriado"])){

			if(preg_match('/^(19|20)[0-9]{2}\/(0[1-9]|1[012])\/(0[1-9]|[12][0-9]|3[01])$/', $_POST["feriado"])){

			   	$tabla = "dias_feriados";

			   	$datos = array("feriado"=>$_POST["feriado"]);

			   	$respuesta = GestorFeriadoModel::guardarFeriadoModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El día feriado ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "diasferiados";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del día feriado no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "diasferiados";

							}
						})

			  	</script>';



			}

		}	

	}

	#VISUALIZAR LOS FERIADOS
	#------------------------------------------------------------

	public function verFeriadoController($item, $valor){

		$tabla = "dias_feriados";

		$respuesta = GestorFeriadoModel::verFeriadoModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR FERIADOS
	#------------------------------------------------------------

	public function editarFeriadoController(){

		if(isset($_POST["editarFeriado"])){

			if(preg_match('/^(19|20)[0-9]{2}\/(0[1-9]|1[012])\/(0[1-9]|[12][0-9]|3[01])$/', $_POST["editarFeriado"])){

			   	$tabla = "dias_feriados";

			   	$datos = array("editarFeriado"=>$_POST["editarFeriado"],
			   				   "idDiaf"=>$_POST["idDiaf"]);

			   	$respuesta = GestorFeriadoModel::editarFeriadoModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El día feriado ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "diasferiados";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del día feriado no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "diasferiados";

							}
						})

			  	</script>';



			}

		}

	}

	#BORRAR FERIADOS
	#------------------------------------------------------------

	public function borrarFeriadoController(){

		if(isset($_GET["idDiaf"])){

			$tabla = "dias_feriados";

			$datos = $_GET["idDiaf"];

			$respuesta = GestorFeriadoModel::borrarFeriadoModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El día feriado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "diasferiados";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionFeriadoController($item,$valor){

		$tabla = "dias_feriados";

		$respuesta = GestorFeriadoModel::verFeriadoModel($tabla,$item,$valor);
	
		return $respuesta;



	}

}