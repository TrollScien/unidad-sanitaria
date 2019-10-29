<?php

require_once "../controlador/GestorPersonal.php";
require_once "../modelo/GestorPersonal.php";

class AjaxPersonal{

	/*=============================================
	EDITAR PERSONAL
	=============================================*/	

	public $cedulaPersonal;

	public $validarCedulaPersonal;

	public $Dependiente;

	public function ajaxEditarPersonal(){

		$item = "cedula_personal";
		$valor = $this->cedulaPersonal;

      	$orden = null;

		$respuesta = PersonalController::mostrarPersonalController($item, $valor,$orden);

		echo json_encode($respuesta);

	}



	public function validarCedulaAjax(){

		$datos = $this->validarCedulaPersonal;

		$respuesta = PersonalController::validarCedulaPersonalController($datos); 

		echo $respuesta;

	}


	public function DependienteAjax(){

		$datos = $this->Dependiente;

		$respuesta = PersonalController::DependienteController($datos); 

		echo $respuesta;

	
	}
	


}

/*=============================================
EDITAR PERSONAL
=============================================*/
if(isset($_POST["cedulaPersonal"])){

	$editar = new AjaxPersonal();
	$editar -> cedulaPersonal = $_POST["cedulaPersonal"];
	$editar -> ajaxEditarPersonal();

}


if(isset( $_POST["validarCeduPersonal"])){
	
	$a = new AjaxPersonal();
	$a -> validarCeduPersonal = $_POST["validarCeduPersonal"];
	$a -> validarCedulaAjax();

}

if(isset( $_POST["Tipopersonal"])){
	
	$a = new AjaxPersonal();
	$a -> Dependiente = $_POST["Tipopersonal"];
	$a -> DependienteAjax();

}