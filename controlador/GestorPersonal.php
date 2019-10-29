<?php 

class PersonalController{

		#REGISTRO DE PERSONAL
	#------------------------------------
	public function registroPersonalController(){

		if(isset($_POST["empleado_cedula"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["empleado_nombre"]) &&
			   preg_match('/^[0-9]+$/', $_POST["empleado_cedula"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["empleado_apellido"]) && 
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["sexo"])  && !empty($_POST["empleado_cedula"])
				&& !empty($_POST["empleado_nombre"])  && !empty($_POST["empleado_apellido"])  && !empty($_POST["empleado_fechanacim"])
				 && !empty($_POST["empleado_fechaingreso"])  && !empty($_POST["sexo"])  && !empty($_POST["empleado_cargo"])  && !empty($_POST["empleado_ubicacion"]) && !empty($_POST["tipocondicion"]) && !empty($_POST["condicion"])){

			   	$tabla = "personal";

			   	$datos = array("cedula"=>$_POST["empleado_cedula"], 
							   "nombre"=>$_POST["empleado_nombre"],
							   "apellido"=>$_POST["empleado_apellido"],
							   "fechanacim"=>$_POST["empleado_fechanacim"],
							   "fechaingre"=>$_POST["empleado_fechaingreso"],
							   "sexo"=>$_POST["sexo"],
							   "cargo"=>$_POST["empleado_cargo"],
							   "lugar"=>$_POST["empleado_ubicacion"],
							   "tipocondicion"=>$_POST["tipocondicion"],
							   "condicion"=>$_POST["condicion"]);

			   	$respuesta = PersonalModel::registroPersonalModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El trabajador ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del trabajador no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "personal";

							}
						})

			  	</script>';



			}

		}
		
	}

	# MOSTRAR PERSONAL
	#------------------------------------
	static public function mostrarPersonalController($item, $valor, $orden){

		$tabla = "personal";

		$respuesta = PersonalModel::mostrarPersonalModel($tabla, $item, $valor, $orden);

		return $respuesta;

	}


	# Editar PERSONAL
	#------------------------------------


	public function editarPersonalController(){

		if(isset($_POST["editarCedula"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarCedula"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellido"]) && 
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSexo"]) && !empty($_POST["editarCedula"])
				&& !empty($_POST["editarNombre"])  && !empty($_POST["editarApellido"])  && !empty($_POST["editarNacimiento"])
				 && !empty($_POST["editarFechaIngreso"])  && !empty($_POST["editarSexo"])  && !empty($_POST["editarCargo"])  && !empty($_POST["editarUbicacion"]) && !empty($_POST["editarTipocon"]) && !empty($_POST["editarCondicion"])){

			   	$tabla = "personal";

			   	$datos = array("cedula"=>$_POST['editarCedula'],
							  "nombre"=>$_POST["editarNombre"],
						 	  "apellido"=>$_POST["editarApellido"],
						 	  "fechanacim"=>$_POST["editarNacimiento"],
						 	  "fechaingre"=>$_POST["editarFechaIngreso"],
						 	  "sexo"=>$_POST["editarSexo"],
						 	  "cargo"=>$_POST["editarCargo"],
						 	  "lugar"=>$_POST["editarUbicacion"],
						 	  "tipocondicion"=>$_POST["editarTipocon"],
						 	  "condicion"=>$_POST["editarCondicion"],
						 	  "perso"=>$_POST["editarpersonal"]);

			   	$respuesta = PersonalModel::editarPersonalModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El trabajador ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del trabajador no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "personal";

							}
						})

			  	</script>';



				}

			}

		}


	# BORRAR PERSONAL
	#------------------------------------
	public function borrarPersonalController(){

		if(isset($_GET["cedulaPersonal"])){

			$tabla ="personal";
			$datos = $_GET["cedulaPersonal"];

			$respuesta = PersonalModel::borrarPersonalModel($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El trabajador ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "personal";

								}
							})

				</script>';

			}		

		}

	}

	public function impresionPersonalController($item, $valor, $orden){

		$tabla = "personal";

		$respuesta = PersonalModel::mostrarPersonalModel($tabla,$item, $valor, $orden);
	
		return $respuesta;



	}

	#VALIDAR CEDULA EXISTENTE
		#-------------------------------------

		public function validarCedulaPersonalController($validarCedulaPersonal){

			$datosController = $validarCedulaPersonal;

			$respuesta = PersonalModel::validarCedulaPersonalModel($datosController, "personal");

			if(count((array)$respuesta) > 0){

				echo 0;

			}

			else{

				echo 1;
			}

		}

		#SELECT DEPENDIENTE
		#-------------------------------------

		public function DependienteController($Dependiente){

			$datosController = $Dependiente;

			$respuesta = PersonalModel::DependienteModel($datosController, "cargo");

			foreach ($respuesta as $row => $item) {
		
			echo '<option value="'.$item['id_cargo'].'">'.$item['nombre_cargo'].'</option>';
			}


		}



}