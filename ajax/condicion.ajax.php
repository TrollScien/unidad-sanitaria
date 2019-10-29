<?php

require_once "../controlador/gestorCondicion.php";
require_once "../modelo/gestorCondicion.php";

class AjaxCondicion{

	/*=============================================
	EDITAR CONDICIÓN
	=============================================*/	

	public $idCondicion;

	public function ajaxEditarCondicion(){


		$item = "id_condicion";
		$valor = $this->idCondicion;

		$condicion = GestorCondicion::verCondicionController($item, $valor);

		echo json_encode($condicion);

	}

}

/*=============================================
EDITAR CONDICIÓN
=============================================*/
if(isset($_POST["idCondicion"])){

	$editarCondicion = new AjaxCondicion();
	$editarCondicion -> idCondicion = $_POST["idCondicion"];
	$editarCondicion -> ajaxEditarCondicion();

}

