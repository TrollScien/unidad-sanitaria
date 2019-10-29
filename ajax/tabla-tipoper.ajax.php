  <?php

require_once "../controlador/gestorTipopersonal.php";
require_once "../modelo/gestorTipopersonal.php";


class TablaTipoper
{

  /*=============================================
  MOSTRAR LA TABLA DE Tipo personal
  =============================================*/

    public function mostrarTabla()
    {

      $item = null;
      $valor = null;

      $tipoper = GestorTipoper::verTipoperController($item, $valor);

      if(count($tipoper)>0){

        echo '{
              "data": [';

              for($i = 0; $i < count($tipoper)-1; $i++){

                  echo '[
                        "'.($i+1).'",
                        "'.$tipoper[$i]["nombre_tipoper"].'",
                        "'.$tipoper[$i]["id_tipoper"].'"
                  ],';

              }

            echo'[
                    "'.count($tipoper).'",
                    "'.$tipoper[count($tipoper)-1]["nombre_tipoper"].'",
                    "'.$tipoper[count($tipoper)-1]["id_tipoper"].'"
                  ]
              ]
          }';
      }else{
				echo '{ "data": [] }';
			}

    }


}

/*=============================================
ACTIVAR TABLA DE tipoper
=============================================*/
$activar = new TablaTipoper();
$activar->mostrarTabla();
