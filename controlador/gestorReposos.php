<?php 

class RepososController{

		#REGISTRO DE Reposos
	#------------------------------------
	public function registroRepososController(){
		if(isset($_POST["cedulareposo"]) ){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["observaciones"]) &&
			   preg_match('/^[0-9]+$/', $_POST["cedulareposo"]) && !empty($_POST["cedulareposo"]) && !empty($_POST["medicoreposo"]) && !empty($_POST["listaPatologias"]) && !empty($_POST["fecha_inicioreposo"]) && !empty($_POST["fecha_finreposo"]) && !empty($_POST["diasreposo"])){

			   	$tabla = "reposo";

			   	$listapatolog = $_POST["listaPatologias"];

				$aleatorio = mt_rand(1, 999);

				$codigoreposo = "RP".$aleatorio;

	   			$datos = array("cedula"=>$_POST["cedulareposo"], 
				 		  	   "medico"=>$_POST["medicoreposo"],
		 			  		   "patologias"=>$listapatolog,
		 			  		   "fechaini"=>$_POST["fecha_inicioreposo"],
				 	  		   "fechafin"=>$_POST["fecha_finreposo"],
				 	  		   "dias"=>$_POST['diasreposo'],
				 	  		   "observaciones"=>$_POST["observaciones"],
				 	  		   "codigoreposo"=>$codigoreposo);

			   	$respuesta = RepososModel::registroRepososModel($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El reposo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "reposo";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos del reposo no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "reposo";

							}
						})

			  	</script>';



			}

		}
		
	}


	# MOSTRAR REPOSO
	#------------------------------------
	public function mostrarRepososController($item, $valor, $orden){

		$tabla = "reposo";

		$respuesta = RepososModel::mostrarRepososModel($tabla, $item, $valor, $orden);

		return $respuesta;

	}


	# Editar REPOSO
	#------------------------------------


	public function editarRepososController(){
	
		if(isset($_POST["editarReposo"])){

				if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarObservaciones"]) &&
				   preg_match('/^[0-9]+$/', $_POST["editarCedulareposo"]) && !empty($_POST["editarCedulareposo"])
				   && !empty($_POST["editarMedicoreposo"]) && !empty($_POST["editarListaPatologias"]) && !empty($_POST["editarFecha_inicioreposo"]) && !empty($_POST["editarFecha_finreposo"]) && !empty($_POST["editarDiasreposo"])){

				   	$tabla = "reposo";

				   	$editarlistapatolog = $_POST["editarListaPatologias"];

		   			$datos = array("cedula"=>$_POST["editarCedulareposo"], 
					 		  	   "medico"=>$_POST["editarMedicoreposo"],
			 			  		   "patologias"=>$editarlistapatolog,
			 			  		   "fechaini"=>$_POST["editarFecha_inicioreposo"],
					 	  		   "fechafin"=>$_POST["editarFecha_finreposo"],
					 	  		   "dias"=>$_POST['editarDiasreposo'],
					 	  		   "observaciones"=>$_POST["editarObservaciones"],
					 	  		   "editarReposo"=>$_POST["editarReposo"]);

				   	$respuesta = RepososModel::editarRepososModel($tabla, $datos);

				   	if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El reposo ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							  }).then((result) => {
										if (result.value) {

										window.location = "reposo";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡Los datos del reposo no pueden ir vacíos o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							  }).then((result) => {
								if (result.value) {

								window.location = "reposo";

								}
							})

				  	</script>';



				}

			}

		}

	# BORRAR reposo
	#------------------------------------
	public function borrarRepososController(){

		if(isset($_GET["idReposo"])){

			$tabla ="reposo";

			$datos = $_GET["idReposo"];
			$estado = 1;

			$datosControlador =  array('id' => $datos, 
									   'estado' => $estado);

			$respuesta = RepososModel::borrarRepososModel($tabla, $datosControlador);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El reposo ha sido desactivado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "reposo";

								}
							})

				</script>';

			}		

		}
		
	}


	# PDF'S
	#------------------------------------
	public function impresionRepososController($item, $valor, $orden){

		$tabla = "reposo";

		$respuesta = RepososModel::mostrarRepososModel($tabla,$item, $valor, $orden);
	
		return $respuesta;



	}

	public function impresionRepososEmitidosController($item,$orden){

		$tabla = "reposo";

		$desde = $_POST['desdepdf'];

		$hasta = $_POST['hastapdf'];

		$respuesta = RepososModel::imprimirRepososEmitidosModel($tabla, $item, $desde, $hasta, $orden);
	
		return $respuesta;



	}

	public function impresionRepososPersonalController($item, $item2, $orden){

		$tabla = "reposo";

		$desde = $_POST['desdepdf'];

		$hasta = $_POST['hastapdf'];

		$respuesta = RepososModel::imprimirRepososPersonalModel($tabla, $item, $item2, $desde, $hasta,$orden);
	
		return $respuesta;



	}

	public function impresionDiastotalPersonalController($item, $item2){

		$tabla = "reposo";

		$desde = $_POST['desdepdf'];

		$hasta = $_POST['hastapdf'];

		$valor = $_POST['cedupdf'];

		$respuesta = RepososModel::impresionDiastotalPersonalModel($tabla, $item, $valor, $item2, $desde, $hasta);
	
		return $respuesta;



	}

	#VALIDAR CEDULA EXISTENTE
		#-------------------------------------

		public function validarCedulaRepososController($validarCedulaReposos){

			$datosController = $validarCedulaReposos;

			$respuesta = RepososModel::validarCedulaRepososModel($datosController, "personal");

			if(count((array)$respuesta["cedula_personal"]) > 0){
				
				echo json_encode($respuesta);

			}

			else{

				echo 1;
			}

		}


}