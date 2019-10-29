<?php

require_once "../controlador/gestorLugar.php";
require_once "../modelo/gestorLugar.php";

class AjaxLugar{

	/*=============================================
	EDITAR LUGAR
	=============================================*/	

	public $idLugar;

	public function ajaxEditarLugar(){


		$item = "id_lugardetrabajo";
		$valor = $this->idLugar;

		$Lugar = GestorLugar::verLugarController($item, $valor);

		echo json_encode($Lugar);

	}

}

/*=============================================
EDITAR LUGAR
=============================================*/
if(isset($_POST["idLugar"])){

	$editarLugar = new AjaxLugar();
	$editarLugar -> idLugar = $_POST["idLugar"];
	$editarLugar -> ajaxEditarLugar();

}

