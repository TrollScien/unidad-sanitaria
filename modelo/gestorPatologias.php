<?php

require_once "conexion.php";

class GestorPatologiaModel{

	#GUARDAR PATOLOGIA
	#------------------------------------------------------------
	public function guardarPatologiaModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_patologia) VALUES (:nombre_patologia)");

		$stmt -> bindParam(":nombre_patologia", $datosModel["nombre_patologia"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#VISUALIZAR PATOLOGIAS
	#------------------------------------------------------
	public function verPatologiaModel($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	#ACTUALIZAR PATOLOGIA
	#---------------------------------------------------
	public function editarPatologiaModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_patologia = :Patologia WHERE id_patologia = :id");	

		$stmt -> bindParam(":Patologia", $datosModel["editarPatologia"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idPatologia"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#BORRAR PATOLOGIA
	#-----------------------------------------------------
	public function borrarPatologiaModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_patologia = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}


}