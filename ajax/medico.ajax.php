<?php

require_once "../controlador/gestorMedico.php";
require_once "../modelo/gestorMedico.php";

class AjaxMedico{

	/*=============================================
	EDITAR MEDICO
	=============================================*/	

	public $idMedico;

	public function ajaxEditarMedico(){


		$item = "id_medico";
		$valor = $this->idMedico;

		$medico = GestorMedico::verMedicoController($item, $valor);

		echo json_encode($medico);

	}

}

/*=============================================
EDITAR MEDICO
=============================================*/
if(isset($_POST["idMedico"])){

	$editarMedico = new AjaxMedico();
	$editarMedico -> idMedico = $_POST["idMedico"];
	$editarMedico -> ajaxEditarMedico();

}

