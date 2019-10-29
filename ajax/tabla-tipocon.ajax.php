  <?php

require_once "../controlador/gestorTipocondicion.php";
require_once "../modelo/gestorTipocondicion.php";


class TablaTipocon
{

  /*=============================================
  MOSTRAR LA TABLA DE Tipo condicion
  =============================================*/

    public function mostrarTabla()
    {

      $item = null;
      $valor = null;

      $tipocon = GestorTipoCondicion::verTipoCondicionController($item, $valor);

      if(count($tipocon)>0){

        echo '{
              "data": [';

              for($i = 0; $i < count($tipocon)-1; $i++){

                  echo '[
                        "'.($i+1).'",
                        "'.$tipocon[$i]["nombre_tipocon"].'",
                        "'.$tipocon[$i]["id_tipocondicion"].'"
                  ],';

              }

            echo'[
                    "'.count($tipocon).'",
                    "'.$tipocon[count($tipocon)-1]["nombre_tipocon"].'",
                    "'.$tipocon[count($tipocon)-1]["id_tipocondicion"].'"
                  ]
              ]
          }';
      }else{
				echo '{ "data": [] }';
			}

    }


}

/*=============================================
ACTIVAR TABLA DE tipocon
=============================================*/
$activar = new TablaTipocon();
$activar->mostrarTabla();
