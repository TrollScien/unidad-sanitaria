<?php

require_once "../controlador/gestorPatologias.php";
require_once "../modelo/gestorPatologias.php";

class AjaxPatologias{

	/*=============================================
	EDITAR PATOLOGIAS
	=============================================*/	

	public $idPatologia;

	public function ajaxEditarPatologia(){


		$item = "id_patologia";
		$valor = $this->idPatologia;

		$patologia = GestorPatologia::verPatologiaController($item, $valor);

		echo json_encode($patologia);

	}

}

/*=============================================
EDITAR PATOLOGIAS
=============================================*/
if(isset($_POST["idPatologia"])){

	$editarPatologia = new AjaxPatologias();
	$editarPatologia -> idPatologia = $_POST["idPatologia"];
	$editarPatologia -> ajaxEditarPatologia();

}

