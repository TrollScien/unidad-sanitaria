<?php

require_once "../controlador/gestorLugar.php";
require_once "../modelo/gestorLugar.php";


class TablaLugar{

  /*=============================================
  MOSTRAR LA TABLA DE Lugar
  =============================================*/ 

  public function mostrarTabla(){

  $item = null;
  $valor = null;

  $lugar = GestorLugar::verLugarController($item, $valor);

  if(count($lugar)>0){

  	echo '{
			"data": [';

			for($i = 0; $i < count($lugar)-1; $i++){

			 	echo '[
		     		  "'.($i+1).'",
				      "'.$lugar[$i]["nombre_lugar"].'",
				      "'.$lugar[$i]["id_lugardetrabajo"].'"
			    ],';

			}

		   echo'[
			      "'.count($lugar).'",
			      "'.$lugar[count($lugar)-1]["nombre_lugar"].'",
			      "'.$lugar[count($lugar)-1]["id_lugardetrabajo"].'"
			    ]
			]
		}';
	}else{
		echo '{ "data": [] }';
	}

  }


}

/*=============================================
ACTIVAR TABLA DE lugar
=============================================*/ 
$activar = new TablaLugar();
$activar -> mostrarTabla();
