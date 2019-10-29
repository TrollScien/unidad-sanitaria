<?php

require_once "modelo/GestorPersonal.php";
require_once "modelo/gestorReposos.php";
require_once "modelo/gestorVacaciones.php";
require_once "modelo/gestorCargo.php";
require_once "modelo/gestorCondicion.php";
require_once "modelo/gestorLugar.php";
require_once "modelo/gestorMedico.php";
require_once "modelo/gestorPatologias.php";
require_once "modelo/gestorTipopersonal.php";
require_once "modelo/gestorTipocondicion.php";
require_once "modelo/gestorTipovacaciones.php";
require_once "modelo/gestorUsuario.php";
require_once "modelo/gestorFeriados.php";

require_once "controlador/template.php";
require_once "controlador/GestorPersonal.php";
require_once "controlador/gestorReposos.php";
require_once "controlador/gestorVacaciones.php";
require_once "controlador/gestorCargo.php";
require_once "controlador/gestorCondicion.php";
require_once "controlador/gestorLugar.php";
require_once "controlador/gestorMedico.php";
require_once "controlador/gestorPatologias.php";
require_once "controlador/gestorTipopersonal.php";
require_once "controlador/gestorTipocondicion.php";
require_once "controlador/gestorTipovacaciones.php";
require_once "controlador/gestorFeriados.php";
require_once "controlador/gestorUsuario.php";


$template = new TemplateController();
$template -> template();

