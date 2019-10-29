<?php

class GestorMedico{

	#GUARDAR MEDICO
	#------------------------------------------------------------
	public function guardarMedicoController(){

		if(isset($_POST["nombre_medico"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_medico"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellido_medico"]) && preg_match('/^[0-9]+$/', $_POST["doc"])){

			   	$tabla = "medico";

			   	$datos = array("doc"=>$_POST["doc"],
					   		   "nombre_medico"=>$_POST["nombre_medico"],
					   		   "apellido_medico"=>$_POST["apellido_medico"]);

			   	$respuesta = GestorMedicoModel::guardarMedicoModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El médico ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "medico";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del médico no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "medico";

							}
						})

			  	</script>';



			}

		}	

	}

	#VISUALIZAR LOS MEDICOS
	#------------------------------------------------------------

	static public function verMedicoController($item, $valor){

		$tabla = "medico";

		$respuesta = GestorMedicoModel::verMedicoModel($tabla, $item, $valor);

		return $respuesta;

	}

	#EDITAR MEDICO
	#------------------------------------------------------------

	public function editarMedicoController(){

		if(isset($_POST["EditarNombre"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNombre"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarApellido"]) && preg_match('/^[0-9]+$/', $_POST["editarDoc"])){

			   	$tabla = "medico";

			   	$datos = array("editarDoc"=>$_POST["editarDoc"],
					   		   "EditarNombre"=>$_POST["EditarNombre"],
					   		   "EditarApellido"=>$_POST["EditarApellido"],
			   				   "idMedico"=>$_POST["idMedico"]);

			   	$respuesta =  GestorMedicoModel::editarMedicoModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El médico ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "medico";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del médico no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "medico";

							}
						})

			  	</script>';



			}

		}

		

	}

	#BORRAR MEDICO
	#------------------------------------------------------------

	public function borrarMedicoController(){

		if(isset($_GET["idMedico"])){

			$tabla = "medico";

			$datos = $_GET["idMedico"];

			$respuesta = GestorMedicoModel::borrarMedicoModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El medico ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "medico";

								}
							})

				</script>';

			}		

		}

		

	}

	public function impresionMedicoController($item,$valor){

		$tabla = "medico";

		$respuesta = GestorMedicoModel::verMedicoModel($tabla,$item,$valor);
	
		return $respuesta;



	}


}