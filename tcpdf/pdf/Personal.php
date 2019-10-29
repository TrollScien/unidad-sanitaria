<?php

require_once "../../controlador/GestorPersonal.php";
require_once "../../modelo/GestorPersonal.php";

require_once "../../controlador/gestorCargo.php";
require_once "../../modelo/gestorCargo.php";

require_once "../../controlador/gestorCondicion.php";
require_once "../../modelo/gestorCondicion.php";

require_once "../../controlador/gestorLugar.php";
require_once "../../modelo/gestorLugar.php";

require_once "../../controlador/gestorTipocondicion.php";
require_once "../../modelo/gestorTipocondicion.php";

require_once "../../controlador/gestorTipopersonal.php";
require_once "../../modelo/gestorTipopersonal.php";


class ImpresionPersonal{

public function imprimirPersonal(){

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

	<table style="border: 1px solid #333 ; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Cédula</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Nombre</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Fecha de nacimiento</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Fecha de ingreso</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Sexo</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Tipo de personal</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Cargo</td>
			<td width="60px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Ubicación</td>
			<td width="59px" style="border: 1px solid #666; background-color:#d50000 ; color:#fff">Condición</td>
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html1, false, false, false, false, '');


$item = null;
$valor = null;
$orden = "cedula_personal"; 

$personal = PersonalController::impresionPersonalController($item, $valor, $orden);

for($i = 0; $i < count($personal); $i++){

$nombrecompleto = $personal[$i]["nombre"].' '.$personal[$i]["apellido"];

$item = "id_cargo";
$valor = $personal[$i]["cargo"];

$cargo = GestorCargo::verCargoController($item, $valor);

$itemTipoper = "id_tipoper";
$valorTipoper = $cargo["tipo_per"];

$tipoper = GestorTipoper::verTipoperController($itemTipoper, $valorTipoper);

$itemlugar = "id_lugardetrabajo";
$valorlugar = $personal[$i]["lugar_trabajo"];

$lugar = GestorLugar::verLugarController($itemlugar, $valorlugar);

$itemTipocon = "id_tipocondicion";
$valorTipocon = $personal[$i]["tipocondicion"];

$tipocon = GestorTipoCondicion::verTipoCondicionController($itemTipocon, $valorTipocon);

$itemcondicion = "id_condicion";
$valorcondicion = $personal[$i]["condicionlab"];

$condicion = GestorCondicion::verCondicionController($itemcondicion, $valorcondicion);

$condiciontrabajador = $tipocon["nombre_tipocon"] .' '. $condicion["nombre_condicion"];


$articulofechanacim = new DateTime($personal[$i]["fecha_nacimiento"]);
$articulofechanacim=$articulofechanacim->format("d/m/Y");

$articulofechaingre= new DateTime($personal[$i]["fecha_ingreso"]);
$articulofechaingre=$articulofechaingre->format("d/m/Y");

$cedula = $personal[$i]["cedula_personal"];

$sexopersonal = $personal[$i]["sexo"];


$html2 = <<<EOF

	<table style="border: 1px solid #d50000 ; text-align:center; line-height: 20px; font-size:10px">
		<tr>
			<td style="border: 1px solid #666;">$cedula</td>
			<td style="border: 1px solid #666;">$nombrecompleto</td>
			<td style="border: 1px solid #666;">$articulofechanacim</td>
			<td style="border: 1px solid #666;">$articulofechaingre</td>
			<td style="border: 1px solid #666;">$sexopersonal</td>
			<td style="border: 1px solid #666;">$tipoper[nombre_tipoper]</td>
			<td style="border: 1px solid #666;">$cargo[nombre_cargo]</td>
			<td style="border: 1px solid #666;">$lugar[nombre_lugar]</td>
			<td style="border: 1px solid #666;">$condiciontrabajador</td>
			
			
		</tr>
	</table>

EOF;

$pdf->writeHTML($html2, false, false, false, false, ''); 	

}

$pdf->Output('Personal.pdf');

}

}

$a = new ImpresionPersonal();
$a -> imprimirPersonal();

?>