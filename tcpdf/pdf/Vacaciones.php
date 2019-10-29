<?php

require_once "../../controlador/gestorVacaciones.php";
require_once "../../modelo/gestorVacaciones.php";

require_once "../../controlador/GestorPersonal.php";
require_once "../../modelo/GestorPersonal.php";

require_once "../../controlador/gestorTipovacaciones.php";
require_once "../../modelo/gestorTipovacaciones.php";

class ImpresionVacaciones{

public function imprimirVacaciones(){

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
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Cédula</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Nombre</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Años de antiguedad</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Fecha de inicio</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Fecha de finalización</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Fecha de reintegro</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Tipo de vacaciones</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Periodo</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Quinquenio</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Días a disfrutar</td>
			<td width="49px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Días pendientes por disfrutar</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, ''); 

date_default_timezone_set('America/Caracas');

$item = null;
$valor = null;
$orden = "id_vacaciones"; 

$vacaciones = GestorVacaciones::impresionVacacionesController($item, $valor, $orden);

for($i = 0; $i < count($vacaciones); $i++){

$item = "cedula_personal";
$valor = $vacaciones[$i]["cedula_personal"];
$orden = null;

$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

$nombrecompleto = $personal["nombre"].' '.$personal["apellido"];

$fechaIni = new DateTime($vacaciones[$i]["fecha_ini"]);
$fechaIni=$fechaIni->format("d/m/Y");

$fechaFin= new DateTime($vacaciones[$i]["fecha_fin"]);
$fechaFin=$fechaFin->format("d/m/Y");

$fechareintegro= new DateTime($vacaciones[$i]["fecha_reintegro"]);
$fechareintegro=$fechareintegro->format("d/m/Y");

$cedula_personal = $vacaciones[$i]["cedula_personal"];
$a_antiguedad = $vacaciones[$i]["a_antiguedad"];
$periodo = $vacaciones[$i]["periodo"];
$quinquenio = $vacaciones[$i]["quinquenio"];
$dias_disfrutar = $vacaciones[$i]["dias_disfrutar"];
$pendientes_disfrutar = $vacaciones[$i]["pendientes_disfrutar"];


$tipovacaciones = json_decode($vacaciones[$i]["tipovacaciones"], true);

$arrayTvac = array();

foreach ($tipovacaciones as $key => $value) {

array_push($arrayTvac, $value["nombre_tipovac"]);
}
$tipovac = implode(",", $arrayTvac);

$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$cedula_personal</td>
			<td style="border: 1px solid #666;">$nombrecompleto</td>
			<td style="border: 1px solid #666;">$a_antiguedad</td>
			<td style="border: 1px solid #666;">$fechaIni</td>
			<td style="border: 1px solid #666;">$fechaFin</td>
			<td style="border: 1px solid #666;">$fechareintegro</td>
			<td style="border: 1px solid #666;">$tipovac</td>
			<td style="border: 1px solid #666;">$periodo</td>
			<td style="border: 1px solid #666;">$quinquenio</td>
			<td style="border: 1px solid #666;">$dias_disfrutar</td>
			<td style="border: 1px solid #666;">$pendientes_disfrutar</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Vacaciones.pdf');

}

}

$a = new ImpresionVacaciones();
$a -> imprimirVacaciones();

?>