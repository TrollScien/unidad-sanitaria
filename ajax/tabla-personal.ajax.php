<?php

require_once "../controlador/GestorPersonal.php";
require_once "../modelo/GestorPersonal.php";

require_once "../controlador/gestorCargo.php";
require_once "../modelo/gestorCargo.php";

require_once "../controlador/gestorCondicion.php";
require_once "../modelo/gestorCondicion.php";

require_once "../controlador/gestorLugar.php";
require_once "../modelo/gestorLugar.php";

require_once "../controlador/gestorTipocondicion.php";
require_once "../modelo/gestorTipocondicion.php";

require_once "../controlador/gestorTipopersonal.php";
require_once "../modelo/gestorTipopersonal.php";

class TablaPersonal{

  /*=============================================
  MOSTRAR LA TABLA DE PERSONAL
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "cedula_personal";

  	$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

	if(count($personal)>0){

		echo '{
				"data": [';

				for($i = 0; $i < count($personal)-1; $i++){

					$nombrecompleto = $personal[$i]["nombre"].' '.$personal[$i]["apellido"];

					$item = "id_cargo";
					$valor = $personal[$i]["cargo"];

					$cargo = GestorCargo::verCargoController($item, $valor);

					$itemTipoper = "id_tipoper";
					$valorTipoper = $cargo["tipo_per"];

					$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valorTipoper);

					$itemlugar = "id_lugardetrabajo";
					$valorlugar = $personal[$i]["lugar_trabajo"];

					$lugar = GestorLugar::verLugarController($itemlugar, $valorlugar);

					$itemTipocon = "id_tipocondicion";
					$valorTipocon = $personal[$i]["tipocondicion"];

					$tipocon = GestorTipoCondicion::verTipoCondicionController($itemTipocon, $valorTipocon);

					$itemcondicion = "id_condicion";
					$valorcondicion = $personal[$i]["condicionlab"];

					$condicion = GestorCondicion::verCondicionController($itemcondicion, $valorcondicion);

					$condiciontrabajador = $tipocon["nombre_tipocon"] .' '. $condicion["nombre_condicion"];

					$fechanacim = new DateTime($personal[$i]["fecha_nacimiento"]);
					$fechanacim=$fechanacim->format("d/m/Y");

					$fechaingre= new DateTime($personal[$i]["fecha_ingreso"]);
					$fechaingre=$fechaingre->format("d/m/Y");

					if ($fechanacim == "30/11/-0001") {
						$fechanacim = 'Ingresar una fecha';
					}

					if ($fechaingre == "30/11/-0001") {
						$fechaingre = 'Ingresar una fecha';
					}


					echo '[
						"'.$personal[$i]["cedula_personal"].'",
						"'.$nombrecompleto.'",
						"'.$fechanacim.'",
						"'.$fechaingre.'",
						"'.$personal[$i]["sexo"].'",
						"'.$tipoper["nombre_tipoper"].'",
						"'.$cargo["nombre_cargo"].'",
						"'.$lugar["nombre_lugar"].'",
						"'.$condiciontrabajador.'",
						"'.$personal[$i]["cedula_personal"].'"
					],';

				}

					$nombrecompleto = $personal[count($personal)-1]["nombre"].' '.$personal[count($personal)-1]["apellido"];

					$item = "id_cargo";
					$valor = $personal[count($personal)-1]["cargo"];

					$cargo = GestorCargo::verCargoController($item, $valor);

					$itemTipoper = "id_tipoper";
					$valorTipoper = $cargo["tipo_per"];

					$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valorTipoper);

					$itemlugar = "id_lugardetrabajo";
					$valorlugar = $personal[count($personal)-1]["lugar_trabajo"];

					$lugar = GestorLugar::verLugarController($itemlugar, $valorlugar);

					$itemTipocon = "id_tipocondicion";
					$valorTipocon = $personal[count($personal)-1]["tipocondicion"];

					$tipocon = GestorTipoCondicion::verTipoCondicionController($itemTipocon, $valorTipocon);

					$itemcondicion = "id_condicion";
					$valorcondicion = $personal[count($personal)-1]["condicionlab"];

					$condicion = GestorCondicion::verCondicionController($itemcondicion, $valorcondicion);

					$condiciontrabajador = $tipocon["nombre_tipocon"] .' '. $condicion["nombre_condicion"];

					$fechanacim = new DateTime($personal[count($personal)-1]["fecha_nacimiento"]);
					$fechanacim=$fechanacim->format("d/m/Y");

					$fechaingre= new DateTime($personal[count($personal)-1]["fecha_ingreso"]);
					$fechaingre=$fechaingre->format("d/m/Y");

			echo'[
					"'.$personal[count($personal)-1]["cedula_personal"].'",
					"'.$nombrecompleto.'",
					"'.$fechanacim.'",
					"'.$fechaingre.'",
					"'.$personal[count($personal)-1]["sexo"].'",
					"'.$tipoper["nombre_tipoper"].'",
					"'.$cargo["nombre_cargo"].'",
					"'.$lugar["nombre_lugar"].'",
					"'.$condiciontrabajador.'",
					"'.$personal[count($personal)-1]["cedula_personal"].'"
					]
				]
			}';

	}else{
		echo '{ "data": [] }';
	}
  }


}

/*=============================================
ACTIVAR TABLA DE PERSONAL
=============================================*/ 
$activar = new TablaPersonal();
$activar -> mostrarTabla();
