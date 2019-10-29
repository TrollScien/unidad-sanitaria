<?php

require_once "conexion.php";

class GestorTipovacacionesModel{

	#GUARDAR TIPO DE VACACIONES
	#------------------------------------------------------------
	public function guardarTipovacacionesModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_tipovac) VALUES (:nombre_tipovac)");

		$stmt -> bindParam(":nombre_tipovac", $datosModel["nombre_tipovac"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#VISUALIZAR TIPO DE VACACIONES
	#------------------------------------------------------
	public function verTipovacacionesModel($tabla, $item, $valor){

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

	#ACTUALIZAR TIPO DE VACACIONES
	#---------------------------------------------------
	public function editarTipovacacionesModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_tipovac = :Tipovacaciones WHERE id_tipova = :id");	

		$stmt -> bindParam(":Tipovacaciones", $datosModel["editarTipovac"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idTipovac"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#BORRAR TIPO DE VACACIONES
	#-----------------------------------------------------
	public function borrarTipovacacionesModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tipova = :id");

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