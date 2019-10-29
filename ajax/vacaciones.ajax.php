<?php

require_once "../controlador/gestorVacaciones.php";
require_once "../modelo/gestorVacaciones.php";

require_once "../controlador/gestorTipovacaciones.php";
require_once "../modelo/gestorTipovacaciones.php";

class AjaxVacaciones{

  
  /*=============================================
  EDITAR Vacaciones
  =============================================*/ 

  public $idVacaciones;

  public function ajaxEditarVacaciones(){


      $item = "id_vacaciones";
      $valor = $this->idVacaciones;
      $orden = "id_vacaciones";

      $respuesta = GestorVacaciones::verVacacionesController($item, $valor, $orden);

      echo json_encode($respuesta);



  }
  /*=============================================
  VALIDAR CEDULA
  =============================================*/ 


  public $validarCedulaVacaciones;



  public function validarCedulaVacacionesAjax(){

    $datos = $this->validarCedulaVacaciones;

    $respuesta = GestorVacaciones::validarCedulaVacacionesController($datos); 

    echo $respuesta;

  }


}


/*=============================================
EDITAR Vacaciones
=============================================*/ 

if(isset($_POST["idVacaciones"])){

  $editarVacaciones = new AjaxVacaciones();
  $editarVacaciones -> idVacaciones = $_POST["idVacaciones"];
  $editarVacaciones -> ajaxEditarVacaciones();

}

if(isset( $_POST["validarCedulaVacaciones"])){
  
  $a = new AjaxVacaciones();
  $a -> validarCedulaVacaciones = $_POST["validarCedulaVacaciones"];
  $a -> validarCedulaVacacionesAjax();

}
