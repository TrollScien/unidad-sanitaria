<?php

require_once "../../controlador/gestorReposos.php";
require_once "../../modelo/gestorReposos.php";

require_once "../../controlador/GestorPersonal.php";
require_once "../../modelo/GestorPersonal.php";

require_once "../../controlador/gestorMedico.php";
require_once "../../modelo/gestorMedico.php";

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
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Código</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Cédula</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Nombre</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Médico</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Patologías</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Fecha de inicio</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Fecha de finalización</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Días de reposo</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000; color:#fff">Observaciones</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, ''); 

date_default_timezone_set('America/Caracas');

$item = "fecha_reposo";
$orden = "id_reposo";

$reposo = RepososController::impresionRepososEmitidosController($item,$orden);

for($i = 0; $i < count($reposo); $i++){

$item = "cedula_personal";
$valor = $reposo[$i]["cedula_perso"];
$orden = null;

$personal = PersonalController::mostrarPersonalController($item, $valor, $orden);

$itemMedico = "id_medico";
$valorMedico = $reposo[$i]["medico_reposo"];

$medico = GestorMedico::verMedicoController($itemMedico, $valorMedico);

$nombrecompleto = $personal["nombre"].' '.$personal["apellido"];

if($medico["doc"] == 0) {

$nombremedico = "DRA.".' '. $medico["nombre_medico"].' '.$medico["apellido_medico"];

}else{

$nombremedico = "DR.".' '. $medico["nombre_medico"].' '.$medico["apellido_medico"];

}

$reposofechaini = new DateTime($reposo[$i]["fecha_inicio"]);
$reposofechaini=$reposofechaini->format("d/m/Y");

$reposofechafin= new DateTime($reposo[$i]["fecha_fin"]);
$reposofechafin=$reposofechafin->format("d/m/Y");

$codigoReposo = $reposo[$i]["codigoReposo"];

$cedula = $reposo[$i]["cedula_perso"];

$dias = $reposo[$i]["dias_reposo"];

$observaciones = $reposo[$i]["observaciones"];

$listaPatologiastabla = json_decode($reposo[$i]["patologias"], true);

$arraypatologias = array();

foreach ($listaPatologiastabla as $key => $value) {

array_push($arraypatologias, $value["nombre_patologia"]);
}
$patolog = implode(",", $arraypatologias);


$html2 = <<<EOF

	<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$codigoReposo</td>
			<td style="border: 1px solid #666;">$cedula</td>
			<td style="border: 1px solid #666;">$nombrecompleto</td>
			<td style="border: 1px solid #666;">$nombremedico</td>
			<td style="border: 1px solid #666;">$patolog</td>
			<td style="border: 1px solid #666;">$reposofechaini</td>
			<td style="border: 1px solid #666;">$reposofechafin</td>
			<td style="border: 1px solid #666;">$dias</td>
			<td style="border: 1px solid #666;">$observaciones</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Reposos emitidos.pdf');

}

}

$a = new ImpresionReposos();
$a -> imprimirReposos();

?>