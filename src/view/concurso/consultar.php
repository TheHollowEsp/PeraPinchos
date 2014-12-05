<?php

//file: view/concurso/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$concurso = $view->getVariable("concurso");
//$currentuser = $view->getVariable("currentusername");

$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar concurso");
?><h1><?= i18n("concurso").": ".htmlentities($concurso->getNombreC()) ?></h1>
	<em><?= sprintf(i18n("Fecha de inicio: %s"),$pincho->getFechaIni()) ?></em> </br>
	<em><?= sprintf(i18n("Fecha de fin: %s"),$pincho->getFechaFin()) ?></em></br>
	<em><?= sprintf(i18n("Bases del concurso: %s"),$pincho->getBasesCon()) ?></em></br>
	<em><?= sprintf(i18n("Patrocinadores: %s"),$pincho->getPatrocinadores()) ?></em></br>
	<em><?= sprintf(i18n("Premios: %s"),$pincho->getInfoPremios()) ?></em></br>

    