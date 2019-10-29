<?php 

require_once "conexion.php";

class RepososModel{

	#REGISTRO DE REPOSOS
	#-------------------------------------
	public function registroRepososModel($tabla,$ReposoModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cedula_perso, medico_reposo, patologias,fecha_inicio, fecha_fin, dias_reposo, observaciones,codigoReposo) VALUES 
				(:cedula,:medico,:patologias,:fechaini,:fechafin,:dias,:observaciones,:codigoreposo)");

		$stmt->bindParam(":cedula", $ReposoModel["cedula"], PDO::PARAM_INT);
		$stmt->bindParam(":medico", $ReposoModel["medico"], PDO::PARAM_INT);
		$stmt->bindParam(":patologias", $ReposoModel["patologias"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaini", $ReposoModel["fechaini"], PDO::PARAM_STR);
		$stmt->bindParam(":fechafin", $ReposoModel["fechafin"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $ReposoModel["dias"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $ReposoModel["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":codigoreposo", $ReposoModel["codigoreposo"], PDO::PARAM_STR);

		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	#MOSTRARL REPOSOS
	#-------------------------------------

	public function mostrarRepososModel($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_reposo DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}

	#ACTUALIZAR REPOSOS
	#---------------------------------------------------
	public function editarRepososModel( $tabla, $ReposoModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  cedula_perso = :cedula, medico_reposo = :medico, patologias = :patologias,fecha_inicio = :fechaini, fecha_fin = :fechafin, dias_reposo = :dias,observaciones = :observacion WHERE id_reposo = :reposo");	

		$stmt->bindParam(":cedula", $ReposoModel["cedula"], PDO::PARAM_INT);
		$stmt->bindParam(":medico", $ReposoModel["medico"], PDO::PARAM_INT);
		$stmt->bindParam(":patologias", $ReposoModel["patologias"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaini", $ReposoModel["fechaini"], PDO::PARAM_STR);
		$stmt->bindParam(":fechafin", $ReposoModel["fechafin"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $ReposoModel["dias"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $ReposoModel["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":reposo", $ReposoModel["editarReposo"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR REPOSO
	=============================================*/

	static public function mdlActualizarReposo($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	#BORRAR REPOSOS
	#-------------------------------------

	public function borrarRepososModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = :estado WHERE id_reposo = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}
		$stmt->close();
		$stmt = null;


	}

	#VALIDAR CEDULA EXISTENTE
		#-------------------------------------
		public function validarCedulaRepososModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT cedula_personal, nombre, apellido FROM $tabla WHERE cedula_personal = :cedula");
			$stmt->bindParam(":cedula", $datosModel, PDO::PARAM_INT);	
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
			$stmt = null;

		}



	#PDF'S
	#-------------------------------------

	public function imprimirRepososEmitidosModel($tabla, $item, $desde, $hasta, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item BETWEEN '".$desde." 00:00:00' AND '".$hasta." 23:59:59' ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

		


	}

	public function imprimirRepososPersonalModel($tabla, $item, $item2, $desde, $hasta,$orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item >= '".$desde." 00:00:00' AND $item2 <= '".$hasta." 23:59:59' ORDER BY $orden DESC");
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	public function impresionDiastotalPersonalModel($tabla, $item, $valor, $item2, $desde, $hasta){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT cedula_perso, SUM(dias_reposo) as total_suma FROM $tabla WHERE $item = $valor AND $item2 BETWEEN '".$desde." 00:00:00' AND '".$hasta." 23:59:59'");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}

}