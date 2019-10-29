<?php

require_once "../controlador/gestorCargo.php";
require_once "../modelo/gestorCargo.php";

class AjaxCargo{

	/*=============================================
	EDITAR CARGO
	=============================================*/	

	public $idCargo;

	public function ajaxEditarCargo(){


		$item = "id_cargo";
		$valor = $this->idCargo;

		$cargo = GestorCargo::verCargoController($item, $valor);

		echo json_encode($cargo);

	}

}

/*=============================================
EDITAR CARGO
=============================================*/
if(isset($_POST["idCargo"])){

	$editarCargo = new AjaxCargo();
	$editarCargo -> idCargo = $_POST["idCargo"];
	$editarCargo -> ajaxEditarCargo();

}

