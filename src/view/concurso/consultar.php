<?php

//file: view/concurso/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$concurso = $view->getVariable("concurso");
//$currentuser = $view->getVariable("currentusername");

$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar concurso");
?><h1><?= i18n("concurso").": ".htmlentities($concurso->getNombreCon()) ?></h1>
	<em><?= sprintf(i18n("Fecha de inicio: %s"),$pincho->getFechaIniCon()) ?></em> </br>
	<em><?= sprintf(i18n("Fecha de fin: %s"),$pincho->getFechaFinCon()) ?></em></br>
	<em><?= sprintf(i18n("Bases del concurso: %s"),$pincho->getBasesConcurso()) ?></em></br>
	<em><?= sprintf(i18n("Patrocinadores: %s"),$pincho->getPatrocinadoresCon()) ?></em></br>
	<em><?= sprintf(i18n("Premios: %s"),$pincho->getInfoPremiosCon()) ?></em></br>

    