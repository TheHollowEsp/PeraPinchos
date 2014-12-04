<?php

//file: view/jurado/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$jurado = $view->getVariable("jurado");
//$currentuser = $view->getVariable("currentusername");

$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar jurado");

?><h1><?= i18n("Jurado").": ".htmlentities($jurado->getNombreJurado()) ?></h1>
	<em><?= sprintf(i18n("DNI: %s"),$jurado->getDniJurado()) ?></em> </br>
	<em><?= sprintf(i18n("Nombre: %s"),$jurado->getNombreJurado()) ?></em></br>
	<em><?= sprintf(i18n("Es jurado Profesional?"),$jurado->getIsProfesional()) ?></em></br>
<?php


