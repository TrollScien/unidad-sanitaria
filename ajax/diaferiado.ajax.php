<?php

require_once "../controlador/gestorFeriados.php";
require_once "../modelo/gestorFeriados.php";

class AjaxDiaf{

	/*=============================================
	EDITAR DIAS FERIADOS
	=============================================*/	

	public $idDiaf;

	public function ajaxEditarDiaf(){


		$item = "id_diaf";
		$valor = $this->idDiaf;

		$diaf = GestorFeriadoModel::verFeriadoModel($item, $valor);


		echo json_encode($diaf);

	}

}

/*=============================================
EDITAR DIAS FERIADOS
=============================================*/
if(isset($_POST["idDiaf"])){

	$editarDiaf = new AjaxDiaf();
	$editarDiaf -> idDiaf = $_POST["idDiaf"];
	$editarDiaf -> ajaxEditarDiaf();

}

