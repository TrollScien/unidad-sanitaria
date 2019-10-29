  <?php

require_once "../controlador/gestorTipovacaciones.php";
require_once "../modelo/gestorTipovacaciones.php";


class TablaTipovac
{

  /*=============================================
  MOSTRAR LA TABLA DE Tipo vacaciones
  =============================================*/

    public function mostrarTabla()
    {

      $item = null;
      $valor = null;

      $tipovac = GestorTipovacaciones::verTipovacacionesController($item, $valor);

      if(count($tipovac)>0){

        echo '{
              "data": [';

              for($i = 0; $i < count($tipovac)-1; $i++){

                  echo '[
                        "'.($i+1).'",
                        "'.$tipovac[$i]["nombre_tipovac"].'",
                        "'.$tipovac[$i]["id_tipova"].'"
                  ],';

              }

            echo'[
                    "'.count($tipovac).'",
                    "'.$tipovac[count($tipovac)-1]["nombre_tipovac"].'",
                    "'.$tipovac[count($tipovac)-1]["id_tipova"].'"
                  ]
              ]
          }';
      }else{
          echo '{ "data": [] }';
        }

    }


}

/*=============================================
ACTIVAR TABLA DE tipovac
=============================================*/
$activar = new TablaTipovac();
$activar->mostrarTabla();
