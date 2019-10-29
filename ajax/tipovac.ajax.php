<?php

require_once "../controlador/gestorTipovacaciones.php";
require_once "../modelo/gestorTipovacaciones.php";

class AjaxTipovac{

	/*=============================================
	EDITAR TIPO de vacaciones
	=============================================*/	

	public $idTipovac;

	public function ajaxEditarTipovac(){


		$itemTipovac = "id_tipova";
		$valor = $this->idTipovac;

		$tipovac = GestorTipovacaciones::verTipovacacionesController($itemTipovac, $valor);


		echo json_encode($tipovac);

	}

}

/*=============================================
EDITAR TIPO de vacaciones
=============================================*/
if(isset($_POST["idTipovac"])){

	$editarTipovac = new AjaxTipovac();
	$editarTipovac -> idTipovac = $_POST["idTipovac"];
	$editarTipovac -> ajaxEditarTipovac();

}

