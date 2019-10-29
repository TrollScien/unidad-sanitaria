<?php

require_once "../controlador/gestorTipocondicion.php";
require_once "../modelo/gestorTipocondicion.php";

class AjaxTipocon{

	/*=============================================
	EDITAR TIPO de condicion
	=============================================*/	

	public $idTipocon;

	public function ajaxEditarTipocon(){


		$itemTipocon = "id_tipocondicion";
		$valor = $this->idTipocon;

		$tipocon = GestorTipoCondicion::verTipoCondicionController($itemTipocon, $valor);


		echo json_encode($tipocon);

	}

}

/*=============================================
EDITAR TIPO de condicion
=============================================*/
if(isset($_POST["idTipocon"])){

	$editarTipocon = new AjaxTipocon();
	$editarTipocon -> idTipocon = $_POST["idTipocon"];
	$editarTipocon -> ajaxEditarTipocon();

}

