<?php
require_once "../controlador/gestorCargo.php";
require_once "../modelo/gestorCargo.php";

require_once "../controlador/gestorTipopersonal.php";
require_once "../modelo/gestorTipopersonal.php";

class AjaxTipoper{

	/*=============================================
	EDITAR TIPO de PERSONAL
	=============================================*/	

	public $idTipoper;

	public function ajaxEditarTipoper(){


		$item = "id_cargo";
		$valor = $this->idTipoper;

		$cargo = GestorCargo::verCargoController($item, $valor);

		$itemTipoper = "id_tipoper";
		$valorTipoper = $cargo["tipo_per"];

		$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valorTipoper);


		echo json_encode($tipoper);

	}

}

/*=============================================
EDITAR TIPO de PERSONAL
=============================================*/
if(isset($_POST["idTipoper"])){

	$editarTipoper = new AjaxTipoper();
	$editarTipoper -> idTipoper = $_POST["idTipoper"];
	$editarTipoper -> ajaxEditarTipoper();

}

