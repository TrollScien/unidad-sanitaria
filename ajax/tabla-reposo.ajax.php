<?php

require_once "../controlador/GestorPersonal.php";
require_once "../modelo/GestorPersonal.php";

require_once "../controlador/gestorReposos.php";
require_once "../modelo/gestorReposos.php";

require_once "../controlador/gestorMedico.php";
require_once "../modelo/gestorMedico.php";

class TablaReposo{

  /*=============================================
  MOSTRAR LA TABLA DE REPOSO
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "id_reposo";

	$reposo = RepososController::mostrarRepososController($item, $valor, $orden);
	  
	if(count($reposo)>0){

		date_default_timezone_set('America/Caracas');

		$hoy = Date("Y-m-d");

		echo '{
				"data": [';

				for($i = 0; $i < count($reposo)-1; $i++){

					$item = "cedula_personal";
					$valor = $reposo[$i]["cedula_perso"];
					$orden = null;

					$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

					$itemMedico = "id_medico";
					$valorMedico = $reposo[$i]["medico_reposo"];

					$medico = GestorMedico::verMedicoController($itemMedico, $valorMedico);

					$nombrecompleto = $personal["nombre"].' '.$personal["apellido"];

					$nombremedico = $medico["nombre_medico"].' '.$medico["apellido_medico"];

					$fechaIni = new DateTime($reposo[$i]["fecha_inicio"]);
					$fechaIni=$fechaIni->format("d/m/Y");

					$fechaFin= new DateTime($reposo[$i]["fecha_fin"]);
					$fechaFin=$fechaFin->format("d/m/Y");



					$listaPatologiastabla = json_decode($reposo[$i]["patologias"], true);

					$arraypatologias = array();

					foreach ($listaPatologiastabla as $key => $value) {

						array_push($arraypatologias, $value["nombre_patologia"]);
					}
					$patolog = implode(",", $arraypatologias);

					if ($reposo[$i]["estatus"] == 1 ) {
						
						$boton = 'Desactivado';

					}elseif ($reposo[$i]["fecha_fin"] <= $hoy ) {

						$boton = "Desactivar";

					}else{

						$boton = 'Activo';

					}


					echo '[
						"'.$reposo[$i]["codigoReposo"].'",
						"'.$reposo[$i]["cedula_perso"].'",
						"'.$nombrecompleto.'",
						"'.$nombremedico.'",
						"'.$patolog.'", 
						"'.$fechaIni.'",
						"'.$fechaFin.'",
						"'.$reposo[$i]["dias_reposo"].'",
						"'.$boton.'",
						"'.$reposo[$i]["observaciones"].'",
						"'.$reposo[$i]["id_reposo"].'"
					],';
					

				}


					$item = "cedula_personal";
					$valor = $reposo[count($reposo)-1]["cedula_perso"];
					$orden = null;

					$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

					$nombrecompleto = $personal["nombre"].' '.$personal["apellido"];

					$itemMedico = "id_medico";
					$valorMedico = $reposo[count($reposo)-1]["medico_reposo"];

					$medico = GestorMedico::verMedicoController($itemMedico, $valorMedico);
					
					$nombremedico = $medico["nombre_medico"].' '.$medico["apellido_medico"];

					$fechaIni = new DateTime($reposo[count($reposo)-1]["fecha_inicio"]);
					$fechaIni=$fechaIni->format("d/m/Y");

					$fechaFin= new DateTime($reposo[count($reposo)-1]["fecha_fin"]);
					$fechaFin=$fechaFin->format("d/m/Y");

					$listaPatologiastabla = json_decode($reposo[count($reposo)-1]["patologias"], true);

					$arraypatologias = array();

					foreach ($listaPatologiastabla as $key => $value) {

						array_push($arraypatologias, $value["nombre_patologia"]);
					}
					$patolog = implode(",", $arraypatologias);

					if ($reposo[count($reposo)-1]["estatus"] == 1 ) {

						$boton = 'Desactivado';

					}elseif ($reposo[count($reposo)-1]["fecha_fin"] <= $hoy ) {

						$boton = "Desactivar";

					}else{

						$boton = 'Activo';

					}

				

			echo'[
					"'.$reposo[count($reposo)-1]["codigoReposo"].'",
					"'.$reposo[count($reposo)-1]["cedula_perso"].'",
					"'.$nombrecompleto.'",
					"'.$nombremedico.'", 
					"'.$patolog.'",
					"'.$fechaIni.'",
					"'.$fechaFin.'",
					"'.$reposo[count($reposo)-1]["dias_reposo"].'",
					"'.$boton.'",
					"'.$reposo[count($reposo)-1]["observaciones"].'",
					"'.$reposo[count($reposo)-1]["id_reposo"].'"
					]
				]
			}';
	}else{
			echo '{ "data": [] }';
		}

  }


}

/*=============================================
ACTIVAR TABLA DE reposo
=============================================*/ 
$activar = new TablaReposo();
$activar -> mostrarTabla();
