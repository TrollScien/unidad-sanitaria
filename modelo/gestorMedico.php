<?php

require_once "conexion.php";

class GestorMedicoModel{

	#GUARDAR MEDICO
	#------------------------------------------------------------
	public function guardarMedicoModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (doc,nombre_medico,apellido_medico) VALUES (:doc,:nombre_medico,:apellido_medico)");
		$stmt -> bindParam(":doc", $datosModel["doc"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombre_medico", $datosModel["nombre_medico"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_medico", $datosModel["apellido_medico"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#VISUALIZAR MEDICO
	#------------------------------------------------------
	public function verMedicoModel($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

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

	#ACTUALIZAR MEDICO
	#---------------------------------------------------
	public function editarMedicoModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET doc=:editardoc, nombre_medico = :editarnombre_medico, apellido_medico = :editarapellido_medico WHERE id_medico = :id");	

		$stmt -> bindParam(":editardoc", $datosModel["editarDoc"], PDO::PARAM_INT);
		$stmt -> bindParam(":editarnombre_medico", $datosModel["EditarNombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":editarapellido_medico", $datosModel["EditarApellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idMedico"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BORRAR MEDICO
	#-----------------------------------------------------
	public function borrarMedicoModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_medico = :id");

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