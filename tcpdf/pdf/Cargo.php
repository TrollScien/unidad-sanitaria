<?php

require_once "../../controlador/gestorCargo.php";
require_once "../../modelo/gestorCargo.php";

require_once "../../controlador/gestorTipopersonal.php";
require_once "../../modelo/gestorTipopersonal.php";

class ImpresionCargo{

public function imprimirCargo(){

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage();

$html1 = <<<EOF
	
	<table>
		<tr>
			<td style="width:540px"><img src="images/back.jpg"></td>
		</tr>

		<tr>
			<td style="width:540px"><img src="images/sin.png"></td>
		</tr>
	</table>

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td width="270px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Tipo de personal</td>
			<td width="270px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Cargo</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, '');

$item = null;
$valor = null; 

$cargo = GestorCargo::impresionCargoController($item,$valor);

for($i = 0; $i < count($cargo); $i++){

$itemTipoper = "id_tipoper";
$valorTipoper = $cargo[$i]["tipo_per"];

$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valorTipoper);

$nombre_cargo = $cargo[$i]["nombre_cargo"];

$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$tipoper[nombre_tipoper]</td>
			<td style="border: 1px solid #666;">$nombre_cargo</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Cargo.pdf');

}

}

$a = new ImpresionCargo();
$a -> imprimirCargo();

?>