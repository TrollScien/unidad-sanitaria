<?php 

require_once "conexion.php";

class PersonalModel{

	#REGISTRO DE PERSONAL
	#-------------------------------------
	static public function registroPersonalModel($tabla,$PersonalModel){

		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cedula_personal, nombre, apellido, fecha_nacimiento,
    	  	  	fecha_ingreso, sexo, cargo, lugar_trabajo, tipocondicion, condicionlab) VALUES 
				(:cedula, :nombre, :apellido, :fechanacim, :fechaingre, :sexo, :cargo, :lugar,
				:tipocondicion, :condicion)");		

		$stmt->bindParam(":cedula", $PersonalModel["cedula"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $PersonalModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $PersonalModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":fechanacim", $PersonalModel["fechanacim"]);
		$stmt->bindParam(":fechaingre", $PersonalModel["fechaingre"]);
		$stmt->bindParam(":sexo", $PersonalModel["sexo"]);
		$stmt->bindParam(":cargo", $PersonalModel["cargo"]);
		$stmt->bindParam(":lugar", $PersonalModel["lugar"]);
		$stmt->bindParam(":tipocondicion", $PersonalModel["tipocondicion"]);
		$stmt->bindParam(":condicion", $PersonalModel["condicion"]);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

		

	#MOSTRARL PERSONAL
	#-------------------------------------

	public function mostrarPersonalModel($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY cedula_personal DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

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


	#ACTUALIZAR PERSONAL
	#---------------------------------------------------
	public function editarPersonalModel($tabla, $datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  cedula_personal = :cedula, nombre = :nombre, apellido = :apellido, fecha_nacimiento = :fechanacim, fecha_ingreso = :fechaingre, sexo = :sexo, cargo = :cargo, lugar_trabajo = :lugar, tipocondicion = :tipocondicion, condicionlab = :condicion WHERE cedula_personal = :personal");	

		$stmt -> bindParam(":cedula", $datosModel["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechanacim", $datosModel["fechanacim"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaingre", $datosModel["fechaingre"], PDO::PARAM_STR);
		$stmt -> bindParam(":sexo", $datosModel["sexo"], PDO::PARAM_STR);
		$stmt -> bindParam(":cargo", $datosModel["cargo"], PDO::PARAM_INT);
		$stmt -> bindParam(":lugar", $datosModel["lugar"], PDO::PARAM_INT);
		$stmt -> bindParam(":tipocondicion", $datosModel["tipocondicion"], PDO::PARAM_INT);
		$stmt -> bindParam(":condicion", $datosModel["condicion"], PDO::PARAM_INT);
		$stmt -> bindParam(":personal", $datosModel["perso"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	#BORRAR PERSONAL
	#-------------------------------------

	public function borrarPersonalModel($tabla, $datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cedula_personal = :cedula");

		$stmt->bindParam(":cedula", $datosModel, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
		
	}

	#VALIDAR CEDULA EXISTENTE
		#-------------------------------------
		public function validarCedulaPersonalModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT cedula_personal FROM $tabla WHERE cedula_personal = :cedula");
			$stmt->bindParam(":cedula", $datosModel, PDO::PARAM_INT);	
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
			$stmt = null;

		}

		#SELECT DEPENDIENTE
		#-------------------------------------
		public function DependienteModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT id_cargo,nombre_cargo from $tabla WHERE tipo_per= :Tipopersonal");
			
			$stmt->bindParam(":Tipopersonal", $datosModel, PDO::PARAM_INT);	
			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();
			$stmt = null;

		}

		

}

