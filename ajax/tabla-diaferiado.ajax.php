  <?php

require_once "../controlador/gestorFeriados.php";
require_once "../modelo/gestorFeriados.php";


class TablaDiaf
{

  /*=============================================
  MOSTRAR LA TABLA DE dias feriados
  =============================================*/

    public function mostrarTabla()
    {

      $item = null;
      $valor = null;

      $diaf = GestorFeriado::verFeriadoController($item, $valor);
      if(count($diaf)>0){

        echo '{
              "data": [';

              for($i = 0; $i < count($diaf)-1; $i++){
                $diaferiado = new DateTime($diaf[$i]["dia_feriado"]);
                $diaferiado=$diaferiado->format("d/m/Y");

                  echo '[
                        "'.($i+1).'",
                        "'.$diaferiado.'",
                        "'.$diaf[$i]["id_diaf"].'"
                  ],';

              }
                $diaferiado = new DateTime($diaf[count($diaf)-1]["dia_feriado"]);
                $diaferiado=$diaferiado->format("d/m/Y");
            echo'[
                    "'.count($diaf).'",
                    "'.$diaferiado.'",
                    "'.$diaf[count($diaf)-1]["id_diaf"].'"
                  ]
              ]
          }';
      }else{
				echo '{ "data": [] }';
			}

    }


}

/*=============================================
ACTIVAR TABLA DE diaf
=============================================*/
$activar = new TablaDiaf();
$activar->mostrarTabla();
