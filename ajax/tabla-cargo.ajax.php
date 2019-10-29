<?php

require_once "../controlador/gestorCargo.php";
require_once "../modelo/gestorCargo.php";

require_once "../controlador/gestorTipopersonal.php";
require_once "../modelo/gestorTipopersonal.php";

class TablaCargo{

  /*=============================================
  MOSTRAR LA TABLA DE CARGO
  =============================================*/ 

  public function mostrarTabla(){

  $item = null;
  $valor = null;

  $cargo = GestorCargo::verCargoController($item, $valor);
	if(count($cargo)>0){
		echo '{
				"data": [';

				for($i = 0; $i < count($cargo)-1; $i++){

					$itemTipoper = "id_tipoper";
					$valorTipoper = $cargo[$i]["tipo_per"];

					$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valorTipoper);

					echo '[
						"'.($i+1).'",
						"'.$tipoper["nombre_tipoper"].'",
						"'.$cargo[$i]["nombre_cargo"].'",
						"'.$cargo[$i]["id_cargo"].'"
					],';

				}
					$itemTipoper = "id_tipoper";
					$valorTipoper = $cargo[count($cargo)-1]["tipo_per"];

					$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valorTipoper);

			echo'[
					"'.count($cargo).'",
					"'.$tipoper["nombre_tipoper"].'",
					"'.$cargo[count($cargo)-1]["nombre_cargo"].'",
					"'.$cargo[count($cargo)-1]["id_cargo"].'"
					]
				]
			}';
	}else{
			echo '{ "data": [] }';
		}

  }


}

/*=============================================
ACTIVAR TABLA DE CARGO
=============================================*/ 
$activar = new TablaCargo();
$activar -> mostrarTabla();
