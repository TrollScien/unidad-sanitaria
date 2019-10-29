<?php

require_once "../controlador/gestorTipopersonal.php";
require_once "../modelo/gestorTipopersonal.php";

class AjaxTipoper{

	/*=============================================
	EDITAR TIPO de PERSONAL
	=============================================*/	

	public $idTipoper;

	public function ajaxEditarTipoper(){


		$itemTipoper = "id_tipoper";
		$valor = $this->idTipoper;

		$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valor);


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

