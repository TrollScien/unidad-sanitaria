<?php

require_once "../controlador/gestorPatologias.php";
require_once "../modelo/gestorPatologias.php";


class TablaPatologia
{

  /*=============================================
  MOSTRAR LA TABLA DE Patologia
  =============================================*/

    public function mostrarTabla()
    {

      $item = null;
      $valor = null;

      $patologia = GestorPatologia::verPatologiaController($item, $valor);

      if(count($patologia)>0){

        echo '{
              "data": [';

              for($i = 0; $i < count($patologia)-1; $i++){

                  echo '[
                        "'.($i+1).'",
                        "'.$patologia[$i]["nombre_patologia"].'",
                        "'.$patologia[$i]["id_patologia"].'"
                  ],';

              }

            echo'[
                    "'.count($patologia).'",
                    "'.$patologia[count($patologia)-1]["nombre_patologia"].'",
                    "'.$patologia[count($patologia)-1]["id_patologia"].'"
                  ]
              ]
          }';
      }else{
				echo '{ "data": [] }';
			}

    }


}

/*=============================================
ACTIVAR TABLA DE patologia
=============================================*/
$activar = new TablaPatologia();
$activar->mostrarTabla();
