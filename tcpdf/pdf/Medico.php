<?php

require_once "../../controlador/gestorMedico.php";
require_once "../../modelo/gestorMedico.php";

class ImpresionMedico{

public function imprimirMedico(){

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
			<td width="540px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Médico</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, ''); 

$item = null;
$valor = null;

$medico = GestorMedico::impresionMedicoController($item, $valor);

for($i = 0; $i < count($medico); $i++){

if ($medico[$i]["doc"] == 1) {

$nombre = 'DR. ' . $medico[$i]["nombre_medico"] .' '. $medico[$i]["apellido_medico"];

}else{

$nombre = 'DRA. ' . $medico[$i]["nombre_medico"] .' '. $medico[$i]["apellido_medico"];
}
$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$nombre</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Medico.pdf');

}

}

$a = new ImpresionMedico();
$a -> imprimirMedico();

?>