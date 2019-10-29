<?php

require_once "conexion.php";

class GestorVacacionesModel{

	#GUARDAR VACACIONES
	#------------------------------------------------------------
	public function guardarVacacionesModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cedula_personal,a_antiguedad,tipovacaciones,fecha_ini,fecha_fin,fecha_reintegro,periodo,quinquenio,dias_disfrutar,pendientes_disfrutar,codigoVacaciones) VALUES (:cedula, :antiguedad,:tipovacaciones, :fechaini, :fechafin, :fechareintegro, :periodo, :quinquenio, :dias_disfrutar,:pendientes_disfrutar,:codigo)");

		$stmt -> bindParam(":cedula", $datosModel["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam(":antiguedad", $datosModel["antiguedad"], PDO::PARAM_INT);
		$stmt -> bindParam(":tipovacaciones", $datosModel["tipovacaciones"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaini", $datosModel["fechaini"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechafin", $datosModel["fechafin"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechareintegro", $datosModel["fechareintegro"], PDO::PARAM_STR);
		$stmt -> bindParam(":periodo", $datosModel["periodo"], PDO::PARAM_STR);
		$stmt -> bindParam(":quinquenio", $datosModel["quinquenio"], PDO::PARAM_INT);
		$stmt -> bindParam(":dias_disfrutar", $datosModel["dias_disfrutar"], PDO::PARAM_INT);
		$stmt -> bindParam(":pendientes_disfrutar", $datosModel["pendientes_disfrutar"], PDO::PARAM_INT);
		$stmt -> bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		
		$stmt = null;

	}

	#VISUALIZAR VACACIONES
	#------------------------------------------------------
	public function verVacacionesModel($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_vacaciones DESC");

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

	#ACTUALIZAR VACACIONES
	#---------------------------------------------------
	public function editarVacacionesModel( $tabla, $datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cedula_personal = :cedula, a_antiguedad = :antiguedad, tipovacaciones = :tipovacaciones, fecha_ini = :fechaini, fecha_fin = :fechafin, fecha_reintegro = :editarfechareintegro, periodo = :periodo, quinquenio = :quinquenio, dias_disfrutar = :dias_disfrutar, pendientes_disfrutar = :pendientes_disfrutar  WHERE id_vacaciones = :id");	

		$stmt -> bindParam(":cedula", $datosModel["editarcedula_vaca"], PDO::PARAM_INT);
		$stmt -> bindParam(":antiguedad", $datosModel["editarannos_antiguedad"], PDO::PARAM_INT);
		$stmt -> bindParam(":tipovacaciones", $datosModel["tipovacaciones"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaini", $datosModel["editarfechainicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechafin", $datosModel["editarfechafin"], PDO::PARAM_STR);
		$stmt -> bindParam(":editarfechareintegro", $datosModel["editarfechareintegro"], PDO::PARAM_STR);
		$stmt -> bindParam(":periodo", $datosModel["editarperiodo"], PDO::PARAM_STR);
		$stmt -> bindParam(":quinquenio", $datosModel["editarquinquenio"], PDO::PARAM_INT);
		$stmt -> bindParam(":dias_disfrutar", $datosModel["editardias_disfrutar"], PDO::PARAM_INT);
		$stmt -> bindParam(":pendientes_disfrutar", $datosModel["editarpendientes_disfrutar"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datosModel["editarVacaciones"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#BORRAR VACACIONES
	#-----------------------------------------------------
	public function borrarVacacionesModel($tabla,$datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = :estado WHERE id_vacaciones = :id");

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
	public function validarCedulaVacacionesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT cedula_personal, nombre, apellido, fecha_ingreso,GROUP_CONCAT(dia_feriado) as dia_feriado FROM $tabla, dias_feriados WHERE cedula_personal = :cedula");
		$stmt->bindParam(":cedula", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
		$stmt = null;

	}

	#VALIDAR DIAS FERIADOS
	#-------------------------------------
	public function diasferiadosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT dia_feriado FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
		$stmt = null;

	}

	# PDF'S
	#-------------------------------------

	public function imprimirVacacionesEmitidasModel($tabla, $item, $desde, $hasta, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item BETWEEN '".$desde." 00:00:00' AND '".$hasta." 23:59:59' ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}

	public function imprimirVacacionesPersonalModel($tabla, $item, $item2, $desde, $hasta,$orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item >= '".$desde." 00:00:00' AND $item2 <= '".$hasta." 23:59:59' ORDER BY $orden DESC");
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


}