<?php

require_once "conexion.php";

class GestorFeriadoModel{

	#GUARDAR DIAS FERIADOS
	#------------------------------------------------------------
	public function guardarFeriadoModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (dia_feriado) VALUES (:feriado)");

		$stmt -> bindParam(":feriado", $datosModel["feriado"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

		$stmt = null;

	}

	#VISUALIZAR DIAS FERIADOS
	#------------------------------------------------------
	public function verFeriadoModel($tabla, $item, $valor){

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

	#ACTUALIZAR DIAS FERIADOS
	#---------------------------------------------------
	public function editarFeriadoModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dia_feriado = :feriado WHERE id_diaf = :id");	

		$stmt -> bindParam(":feriado", $datosModel["editarferiado"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

		$stmt = null;

	}

	#BORRAR DIAS FERIADOS
	#-----------------------------------------------------
	public function borrarFeriadoModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_diaf = :id");

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