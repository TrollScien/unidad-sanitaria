<?php

require_once "conexion.php";

class GestorCondicionModel{

	#GUARDAR CONDICION
	#------------------------------------------------------------
	public function guardarCondicionModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_condicion) VALUES (:nombre_condicion)");

		$stmt -> bindParam(":nombre_condicion", $datosModel["nombre_condicion"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#VISUALIZAR CONDICIONES
	#------------------------------------------------------
	public function verCondicionModel($tabla, $item, $valor){

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

	#ACTUALIZAR CONDICION
	#---------------------------------------------------
	public function editarCondicionModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_condicion = :Condicion WHERE id_condicion = :id");	

		$stmt -> bindParam(":Condicion", $datosModel["editarCondicion"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idCondicion"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BORRAR CONDICION
	#-----------------------------------------------------
	public function borrarCondicionModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_condicion = :id");

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