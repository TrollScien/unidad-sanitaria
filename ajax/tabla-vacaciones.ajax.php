<?php

require_once "../controlador/GestorPersonal.php";
require_once "../modelo/GestorPersonal.php";

require_once "../controlador/gestorVacaciones.php";
require_once "../modelo/gestorVacaciones.php";

require_once "../controlador/gestorTipovacaciones.php";
require_once "../modelo/gestorTipovacaciones.php";

class TablaVacaciones{

  /*=============================================
  MOSTRAR LA TABLA DE VACACIONES
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "id_vacaciones";

  	$vacaciones = GestorVacaciones::verVacacionesController($item, $valor, $orden);

	if(count($vacaciones)>0){

		date_default_timezone_set('America/Caracas');

		$hoy = Date("Y-m-d");

		echo '{
				"data": [';

				for($i = 0; $i < count($vacaciones)-1; $i++){

					$item = "cedula_personal";
					$valor = $vacaciones[$i]["cedula_personal"];
					$orden = null;

					$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

					$nombrecompleto = $personal["nombre"].' '.$personal["apellido"];

					$fechaIni = new DateTime($vacaciones[$i]["fecha_ini"]);
					$fechaIni=$fechaIni->format("d/m/Y");

					$fechaFin= new DateTime($vacaciones[$i]["fecha_fin"]);
					$fechaFin=$fechaFin->format("d/m/Y");

					$fechareintegro= new DateTime($vacaciones[$i]["fecha_reintegro"]);
					$fechareintegro=$fechareintegro->format("d/m/Y");


					$tipovacaciones = json_decode($vacaciones[$i]["tipovacaciones"], true);

					$arrayTvac = array();

					foreach ($tipovacaciones as $key => $value) {

						array_push($arrayTvac, $value["nombre_tipovac"]);
					}
					$tipovac = implode(",", $arrayTvac);

					if ($vacaciones[$i]["estatus"] == 1 ) {
						
						$boton = 'Desactivado';

					}elseif ($vacaciones[$i]["fecha_fin"] <= $hoy ) {

						$boton = "Desactivar";

					}else{

						$boton = 'Activo';

					}


					echo '[
						"'.$vacaciones[$i]["codigoVacaciones"].'",
						"'.$vacaciones[$i]["cedula_personal"].'",
						"'.$nombrecompleto.'",
						"'.$vacaciones[$i]["a_antiguedad"].'",
						"'.$fechaIni.'",
						"'.$fechaFin.'",
						"'.$fechareintegro.'",
						"'.$tipovac.'", 
						"'.$vacaciones[$i]["periodo"].'",
						"'.$vacaciones[$i]["quinquenio"].'",
						"'.$vacaciones[$i]["dias_disfrutar"].'",
						"'.$vacaciones[$i]["pendientes_disfrutar"].'",
						"'.$boton.'",
						"'.$vacaciones[$i]["id_vacaciones"].'"
					],';
					

				}


					$item = "cedula_personal";
					$valor = $vacaciones[count($vacaciones)-1]["cedula_personal"];
					$orden = null;

					$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

					$nombrecompleto = $personal["nombre"].' '.$personal["apellido"];

					$fechaIni = new DateTime($vacaciones[count($vacaciones)-1]["fecha_ini"]);
					$fechaIni=$fechaIni->format("d/m/Y");

					$fechaFin= new DateTime($vacaciones[count($vacaciones)-1]["fecha_fin"]);
					$fechaFin=$fechaFin->format("d/m/Y");

					$fechareintegro= new DateTime($vacaciones[count($vacaciones)-1]["fecha_reintegro"]);
					$fechareintegro=$fechareintegro->format("d/m/Y");


					$tipovacaciones = json_decode($vacaciones[count($vacaciones)-1]["tipovacaciones"], true);

					$arrayTvac = array();

					foreach ($tipovacaciones as $key => $value) {

						array_push($arrayTvac, $value["nombre_tipovac"]);
					}
					$tipovac = implode(",", $arrayTvac);

					if ($vacaciones[count($vacaciones)-1]["estatus"] == 1 ) {
						
						$boton = 'Desactivado';

					}elseif ($vacaciones[count($vacaciones)-1]["fecha_fin"] <= $hoy ) {

						$boton = "Desactivar";

					}else{

						$boton = 'Activo';

					}

				

			echo'[
					
					"'.$vacaciones[count($vacaciones)-1]["codigoVacaciones"].'",
					"'.$vacaciones[count($vacaciones)-1]["cedula_personal"].'",
					"'.$nombrecompleto.'",
					"'.$vacaciones[count($vacaciones)-1]["a_antiguedad"].'",
					"'.$fechaIni.'",
					"'.$fechaFin.'",
					"'.$fechareintegro.'",
					"'.$tipovac.'", 
					"'.$vacaciones[count($vacaciones)-1]["periodo"].'",
					"'.$vacaciones[count($vacaciones)-1]["quinquenio"].'",
					"'.$vacaciones[count($vacaciones)-1]["dias_disfrutar"].'",
					"'.$vacaciones[count($vacaciones)-1]["pendientes_disfrutar"].'",
					"'.$boton.'",
					"'.$vacaciones[count($vacaciones)-1]["id_vacaciones"].'"
					]
				]
			}';

	}else{
		echo '{ "data": [] }';
	}
  }


}

/*=============================================
ACTIVAR TABLA DE vacaciones
=============================================*/ 
$activar = new TablaVacaciones();
$activar -> mostrarTabla();
