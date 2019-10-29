<?php

require_once "../controlador/gestorCondicion.php";
require_once "../modelo/gestorCondicion.php";


class TablaCondicion{

  /*=============================================
  MOSTRAR LA TABLA DE Condicion
  =============================================*/ 

  public function mostrarTabla(){

  $item = null;
  $valor = null;

  $condicion = GestorCondicion::verCondicionController($item, $valor);
  
	if(count($condicion)>0){

		echo '{
				"data": [';

				for($i = 0; $i < count($condicion)-1; $i++){

					echo '[
						"'.($i+1).'",
						"'.$condicion[$i]["nombre_condicion"].'",
						"'.$condicion[$i]["id_condicion"].'"
					],';

				}

			echo'[
					"'.count($condicion).'",
					"'.$condicion[count($condicion)-1]["nombre_condicion"].'",
					"'.$condicion[count($condicion)-1]["id_condicion"].'"
					]
				]
			}';
	}else{
		echo '{ "data": [] }';
	}

  }


}

/*=============================================
ACTIVAR TABLA DE condicion
=============================================*/ 
$activar = new TablaCondicion();
$activar -> mostrarTabla();
