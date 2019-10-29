<?php

require_once "../../controlador/gestorCondicion.php";
require_once "../../modelo/gestorCondicion.php";

class ImpresionCondicion{

public function imprimirCondicion(){

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
			<td class="center" width="540px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Condición</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, ''); 

$item = null;
$valor = null;

$condicion = GestorCondicion::impresionCondicionController($item,$valor);

for($i = 0; $i < count($condicion); $i++){

$nombre = $condicion[$i]["nombre_condicion"];

$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td class="center" style="border: 1px solid #666;">$nombre</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Condicion.pdf');

}

}

$a = new ImpresionCondicion();
$a -> imprimirCondicion();

?>