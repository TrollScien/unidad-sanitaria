<?php

require_once "../../controlador/gestorTipopersonal.php";
require_once "../../modelo/gestorTipopersonal.php";

class ImpresionTipoper{

public function imprimirTipoper(){

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
			<td width="540px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Tipo de personal</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, ''); 

$item = null;
$valor = null;

$tipoper = GestorTipoper::impresionTipoperController($item,$valor);

for($i = 0; $i < count($tipoper); $i++){

$nombre = $tipoper[$i]["nombre_tipoper"];

$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$nombre</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Tipo personal.pdf');

}

}

$a = new ImpresionTipoper();
$a -> imprimirTipoper();

?>