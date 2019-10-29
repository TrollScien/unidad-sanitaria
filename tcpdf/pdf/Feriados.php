<?php

require_once "../../controlador/gestorFeriados.php";
require_once "../../modelo/gestorFeriados.php";

class ImpresionFeriado{

public function imprimirFeriado(){

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
			<td width="540px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Día feriado</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, ''); 

$item = null;
$valor = null;

$diaf = GestorFeriado::impresionFeriadoController($item,$valor);

for($i = 0; $i < count($diaf); $i++){

$diaferiado = new DateTime($diaf[$i]["dia_feriado"]);
$diaferiado=$diaferiado->format("d/m/Y");

$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$diaferiado</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Feriados.pdf');

}

}

$a = new ImpresionFeriado();
$a -> imprimirFeriado();

?>