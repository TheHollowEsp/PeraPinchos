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
	<em><?= sprintf(i18n("Fecha de inicio: %s"),$concurso->getFechaIniCon()) ?></em> </br>
	<em><?= sprintf(i18n("Fecha de fin: %s"),$concurso->getFechaFinCon()) ?></em></br>
	<em><?= sprintf(i18n("Bases del concurso: %s"),$concurso->getBasesConcurso()) ?></em></br>
	<em><?= sprintf(i18n("Patrocinadores: %s"),$concurso->getPatrocinadoresCon()) ?></em></br>
	<em><?= sprintf(i18n("Premios: %s"),$concurso->getPremiosCon()) ?></em></br>
	<em><?= sprintf(i18n("Organizador: %s"),$concurso->getOrganizadorCon()) ?></em></br>

    