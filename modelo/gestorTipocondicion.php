<?php

require_once "conexion.php";

class GestorTipoCondicionModel{

	#GUARDAR TIPO DE CONDICION
	#------------------------------------------------------------
	public function guardarTipoCondicionModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_tipocon) VALUES (:nombre_tipocon)");

		$stmt -> bindParam(":nombre_tipocon", $datosModel["nombre_tipocon"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#VISUALIZAR TIPO DE CONDICIONES
	#------------------------------------------------------
	public function verTipoCondicionModel($tabla, $item, $valor){

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

	#ACTUALIZAR TIPO DE CONDICION
	#---------------------------------------------------
	public function editarTipoCondicionModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_tipocon = :TipoCondicion WHERE id_tipocondicion = :id");	

		$stmt -> bindParam(":TipoCondicion", $datosModel["editarTipocon"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["idTipocon"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#BORRAR TIPO DE CONDICION
	#-----------------------------------------------------
	public function borrarTipoCondicionModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tipocondicion = :id");

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