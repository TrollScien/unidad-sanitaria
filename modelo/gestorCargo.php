<?php

require_once "conexion.php";

class GestorCargoModel{

	#GUARDAR CARGO
	#------------------------------------------------------------
	public function guardarCargoModel($tabla, $datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo_per,nombre_cargo) VALUES (:tipoper,:nombrecar)");

		$stmt -> bindParam(":tipoper", $datosModel["tipoper"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombrecar", $datosModel["nombrecar"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#VISUALIZAR CARGO
	#------------------------------------------------------
	public function verCargoModel($tabla, $item, $valor){

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

	#ACTUALIZAR CARGO
	#---------------------------------------------------
	public function editarCargoModel($tabla, $datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo_per = :tipoper, nombre_cargo = :cargo WHERE id_cargo = :id");	

		$stmt -> bindParam(":tipoper", $datosModel["editarTipopercargo"], PDO::PARAM_INT);
		$stmt -> bindParam(":cargo", $datosModel["editarCargo"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BORRAR CARGO
	#-----------------------------------------------------
	public function borrarCargoModel($tabla, $datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cargo = :id");

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