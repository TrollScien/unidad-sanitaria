<?php

require_once "../../controlador/gestorReposos.php";
require_once "../../modelo/gestorReposos.php";

require_once "../../controlador/GestorPersonal.php";
require_once "../../modelo/GestorPersonal.php";

class ImpresionReposos{

public function imprimirReposos(){

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
			<td width="180px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Cédula</td>
			<td width="180px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Nombre</td>
			<td width="180px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Total de días de reposo</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, ''); 

date_default_timezone_set('America/Caracas');

$item = "cedula_perso";
$item2 = "fecha_reposo";

$reposo = RepososController::impresionDiastotalPersonalController($item,$item2);

for($i = 0; $i < count((array)$reposo["cedula_perso"]); $i++){

$item = "cedula_personal";
$valor = $reposo["cedula_perso"];
$orden = null;

$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

$nombrecompleto = $personal["nombre"].' '.$personal["apellido"];

$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$reposo[cedula_perso]</td>
			<td style="border: 1px solid #666;">$nombrecompleto</td>
			<td style="border: 1px solid #666;">$reposo[total_suma]</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('total dias de reposo.pdf');

}

}

$a = new ImpresionReposos();
$a -> imprimirReposos();

?>