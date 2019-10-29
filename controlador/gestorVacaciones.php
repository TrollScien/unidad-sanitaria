<?php

class GestorVacaciones{

	#GUARDAR VACACIONES
	#------------------------------------------------------------
	public function guardarVacacionesController(){

		if(isset($_POST["cedula_vaca"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["periodo"]) &&
				   preg_match('/^[0-9]+$/', $_POST["cedula_vaca"]) && !empty($_POST["cedula_vaca"])
				   && !empty($_POST["años_antiguedad"]) && !empty($_POST["fechainicio"])
				   && !empty($_POST["fechafin"]) && !empty($_POST["ListaTipovac"])
				   && !empty($_POST["fechareintegro"]) && !empty($_POST["periodo"])
				   && !empty($_POST["quinquenio"]) && !empty($_POST["dias_disfrutar"]) 
				   && !empty($_POST["pendientes_disfrutar"])){

				   	$tabla = "vacaciones";

				   	$listatipova = $_POST["ListaTipovac"];

				   	$aleatorio = mt_rand(1, 999);

					$codigovacaciones = "VC".$aleatorio;

		   			$datos = array( "cedula"=>$_POST["cedula_vaca"],
							 		"antiguedad"=>$_POST["años_antiguedad"],
								 	"tipovacaciones"=>$listatipova,
						 			"fechaini"=>$_POST["fechainicio"],
							 		"fechafin"=>$_POST["fechafin"],
								 	"fechareintegro"=>$_POST["fechareintegro"],
							 		"periodo"=>$_POST["periodo"],
								 	"quinquenio"=>$_POST["quinquenio"],
								 	"dias_disfrutar"=>$_POST["dias_disfrutar"],
								 	"pendientes_disfrutar"=>$_POST["pendientes_disfrutar"],
					 	  		   	"codigo"=>$codigovacaciones);

				   	$respuesta = GestorVacacionesModel::guardarVacacionesModel($tabla, $datos);

				   	if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "Las vacaciones han sido guardadas correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							  }).then((result) => {
										if (result.value) {

										window.location = "vacaciones";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡Los datos de las vacaciones no pueden ir vacíos o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							  }).then((result) => {
								if (result.value) {

								window.location = "vacaciones";

								}
							})

				  	</script>';



				}

			}
	}

	#VISUALIZAR LOS VACACIONES
	#------------------------------------------------------------

	public function verVacacionesController($item, $valor, $orden){

		$tabla = "vacaciones";

		$respuesta = GestorVacacionesModel::verVacacionesModel($tabla, $item, $valor, $orden);

		return $respuesta;
	}


	#EDITAR VACACIONES
	#------------------------------------------------------------

	public function editarVacacionesController(){

		if(isset($_POST["editarVacaciones"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ -]+$/', $_POST["editarperiodo"]) &&
				   preg_match('/^[0-9]+$/', $_POST["editarcedula_vaca"]) && !empty($_POST["editarcedula_vaca"])
				   && !empty($_POST["editarannos_antiguedad"]) && !empty($_POST["editarListaTipovac"]) 
				   && !empty($_POST["editarfechainicio"]) && !empty($_POST["editarfechafin"]) 
				   && !empty($_POST["editarfechareintegro"]) && !empty($_POST["editarperiodo"])
				   && !empty($_POST["editarquinquenio"])   && !empty($_POST["editardias_disfrutar"])
				     && !empty($_POST["editarpendientes_disfrutar"])){

				   	$tabla = "vacaciones";

				   	$editarlistatipova = $_POST["editarListaTipovac"];

		   			$datos = array( "editarcedula_vaca"=>$_POST["editarcedula_vaca"],
							 		"editarannos_antiguedad"=>$_POST["editarannos_antiguedad"],
								 	"tipovacaciones"=>$editarlistatipova,
						 			"editarfechainicio"=>$_POST["editarfechainicio"],
							 		"editarfechafin"=>$_POST["editarfechafin"],
								 	"editarfechareintegro"=>$_POST["editarfechareintegro"],
							 		"editarperiodo"=>$_POST["editarperiodo"],
								 	"editarquinquenio"=>$_POST["editarquinquenio"],
								 	"editardias_disfrutar"=>$_POST["editardias_disfrutar"],
								 	"editarpendientes_disfrutar"=>$_POST["editarpendientes_disfrutar"],
					 	  		   	"editarVacaciones"=>$_POST["editarVacaciones"]);

				   	$respuesta = GestorVacacionesModel::editarVacacionesModel($tabla, $datos);

				   	if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "Las vacaciones han sido editadas correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							  }).then((result) => {
										if (result.value) {

										window.location = "vacaciones";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡Los datos de las vacaciones no pueden ir vacíos o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							  }).then((result) => {
								if (result.value) {

								window.location = "vacaciones";

								}
							})

				  	</script>';



				}

			}
		
	}

	#BORRAR VACACIONES
	#------------------------------------------------------------

	public function borrarVacacionesController(){

		if(isset($_GET["idVacaciones"])){

			$tabla ="vacaciones";

			$datos = $_GET["idVacaciones"];
			$estado = 1;

			$datosControlador =  array('id' => $datos, 
									   'estado' => $estado);

			$respuesta = GestorVacacionesModel::borrarVacacionesModel($tabla, $datosControlador);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Las vacaciones ha sido desactivadas correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "vacaciones";

								}
							})

				</script>';

			}		

		}

	}
	#VALIDAR CEDULA EXISTENTE
		#-------------------------------------

		public function validarCedulaVacacionesController($validarCedulaVacaciones){

			$datosController = $validarCedulaVacaciones;

			$respuesta = GestorVacacionesModel::validarCedulaVacacionesModel($datosController, "personal");

			if(count((array)$respuesta["cedula_personal"]) > 0){

				echo json_encode($respuesta);

			}

			else{

				echo 1;
			}

		}

		#VALIDAR Días feriados
		#-------------------------------------

		public function diasferiadosController(){

			$respuesta = GestorVacacionesModel::diasferiadosModel("dias_feriados");
			$h =json_encode($respuesta);

			 echo"<script>
			 j = ".$h."
			 array = []; 
			 array2 = [];
			 for (i=0;i<j.length;i++){
			 f = j[i][0].split('-')
			 anod = f[0]
			 mesd = f[1]-1
			 diad = f[2]
			 diafd= anod+','+mesd+','+diad
			 array2.push(diafd)
			 fdd = new Date(anod,mesd,diad)
			 array.push(fdd)
			}
			 for (i=0;i<array.length;i++){
			 }

			$('.datepicker-vaca').pickadate({
			
			      // An integer (positive/negative) sets it relative to today.
			      // min: -15,
			      // `true` sets it to today. `false` removes any limits.
			      format: 'd mmmm, yyyy',
			      formatSubmit: 'yyyy/mm/dd',
			      closeOnSelect: true,
			      closeOnClear: true,
			      selectMonths: true, // Creates a dropdown to control month
			      selectYears: 20, // Creates a dropdown of 15 years to control year
			      hiddenName: true,
			      onOpen : function(){ 
			       	var picker = this ;
			     	for (i=0;i<array.length;i++){
			      		picker.set('disable', [1,7,
							array[i]
						])
					
					}
			   	 }

			});

			      </script>";

		}

	#PDF'S
	#------------------------------------------------------------

	public function impresionVacacionesController($item, $valor, $orden){

		$tabla = "vacaciones";

		$respuesta = GestorVacacionesModel::verVacacionesModel($tabla,$item, $valor, $orden);
	
		return $respuesta;



	}


	public function impresionVacacionesEmitidasController($item,$orden){

		$tabla = "vacaciones";

		$desde = $_POST['desdepdf'];

		$hasta = $_POST['hastapdf'];

		$respuesta = GestorVacacionesModel::imprimirVacacionesEmitidasModel($tabla, $item, $desde, $hasta, $orden);
	
		return $respuesta;



	}

	public function impresionVacacionesPersonalController($item, $item2, $orden){

		$tabla = "vacaciones";

		$desde = $_POST['desdepdf'];

		$hasta = $_POST['hastapdf'];

		$respuesta = GestorVacacionesModel::imprimirVacacionesPersonalModel($tabla, $item, $item2, $desde, $hasta,$orden);
	
		return $respuesta;



	}

}