<?php

require_once "conexion.php";

class GestorLugarModel{

	#GUARDAR LUGAR
	#------------------------------------------------------------
	public function guardarLugarModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_lugar) VALUES (:nombre_lugar)");

		$stmt -> bindParam(":nombre_lugar", $datosModel["nombre_lugar"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#VISUALIZAR LUGARES
	#------------------------------------------------------
	public function verLugarModel($tabla, $item, $valor){

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

	#ACTUALIZAR LUGAR
	#---------------------------------------------------
	public function editarLugarModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_lugar = :Lugar WHERE id_lugardetrabajo = :id");	

		$stmt -> bindParam(":Lugar", $datosModel["editarLugar"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idLugar"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BORRAR LUGAR
	#-----------------------------------------------------
	public function borrarLugarModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_lugardetrabajo = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


}