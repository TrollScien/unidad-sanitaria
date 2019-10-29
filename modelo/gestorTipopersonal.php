<?php

require_once "conexion.php";

class GestorTipoperModel{

	#GUARDAR TIPO DE PERSONAL
	#------------------------------------------------------------
	public function guardarTipoperModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_tipoper) VALUES (:nombre_tipoper)");

		$stmt -> bindParam(":nombre_tipoper", $datosModel["nombre_tipoper"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#VISUALIZAR TIPO DE PERSONAL
	#------------------------------------------------------
	public function verTipoperModel($tabla, $item, $valor){

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

	#ACTUALIZAR TIPO DE PERSONAL
	#---------------------------------------------------
	public function editarTipoperModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_tipoper = :Tipoper WHERE id_tipoper = :id");	

		$stmt -> bindParam(":Tipoper", $datosModel["editarTipoper"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idTipoper"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#BORRAR TIPO DE PERSONAL
	#-----------------------------------------------------
	public function borrarTipoperModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tipoper = :id");

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