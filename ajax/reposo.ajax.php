<?php

require_once "../controlador/gestorReposos.php";
require_once "../modelo/gestorReposos.php";

require_once "../controlador/gestorPatologias.php";
require_once "../modelo/gestorPatologias.php";

class AjaxReposos{

  
  /*=============================================
  EDITAR Reposo
  =============================================*/ 

  public $idReposo;

  public function ajaxEditarReposo(){


      $item = "id_reposo";
      $valor = $this->idReposo;
      $orden = "id_reposo";

      $respuesta = RepososController::mostrarRepososController($item, $valor, $orden);

      echo json_encode($respuesta);



  }

  public $validarCedulaReposos;



  public function validarCedulaRepososAjax(){

    $datos = $this->validarCedulaReposos;

    $respuesta = RepososController::validarCedulaRepososController($datos); 

    echo $respuesta;

  }


}


/*=============================================
EDITAR Reposo
=============================================*/ 

if(isset($_POST["idReposo"])){

  $editarReposo = new AjaxReposos();
  $editarReposo -> idReposo = $_POST["idReposo"];
  $editarReposo -> ajaxEditarReposo();

}


if(isset( $_POST["validarCedulaReposos"])){
  
  $a = new AjaxReposos();
  $a -> validarCedulaReposos = $_POST["validarCedulaReposos"];
  $a -> validarCedulaRepososAjax();

}
