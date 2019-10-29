<?php

require_once "../controlador/gestorMedico.php";
require_once "../modelo/gestorMedico.php";


class TablaMedico{

  /*=============================================
  MOSTRAR LA TABLA DE Medico
  =============================================*/ 

  public function mostrarTabla(){

  $item = null;
  $valor = null;

  $medico = GestorMedico::verMedicoController($item, $valor);

  if(count($medico)>0){

		echo '{
				"data": [';

				for($i = 0; $i < count($medico)-1; $i++){

				if ($medico[$i]["doc"] == 1) {

					$nombre = 'DR. ' . $medico[$i]["nombre_medico"] .' '. $medico[$i]["apellido_medico"];

				}else{

					$nombre = 'DRA. ' . $medico[$i]["nombre_medico"] .' '. $medico[$i]["apellido_medico"];
				}

					echo '[
						"'.($i+1).'",
						"'.$nombre.'",
						"'.$medico[$i]["id_medico"].'"
					],';

				}
				if ($medico[count($medico)-1]["doc"] == 1) {

					$nombre = 'DR.' . ' ' . $medico[count($medico)-1]["nombre_medico"] .' '. $medico[count($medico)-1]["apellido_medico"];

				}else{

					$nombre = 'DRA.' . ' ' . $medico[count($medico)-1]["nombre_medico"] .' '. $medico[count($medico)-1]["apellido_medico"];
				}

			echo'[
					"'.count($medico).'",
					"'.$nombre.'",
					"'.$medico[count($medico)-1]["id_medico"].'"
					]
				]
			}';
	}else{
			echo '{ "data": [] }';
		}

  }


}

/*=============================================
ACTIVAR TABLA DE medico
=============================================*/ 
$activar = new TablaMedico();
$activar -> mostrarTabla();
