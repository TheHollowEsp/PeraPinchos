<?php

//file: view/concurso/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$concurso = $view->getVariable("concurso");
//$currentuser = $view->getVariable("currentusername");

$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar concurso");
?>

<h1>
	<dl class="dl-horizontal">
		<dt style='white-space: wrap;width: 190px;'><?= i18n("Concurso:")?></dt>
  		<dd><?=$concurso->getNombreCon() ?></dd>
	</dl>
</h1>
<p>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Fecha de inicio: ") ?></dt>
  			<dd><?=$concurso->getFechaIniCon() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Fecha de fin: ") ?></dt>
	  		<dd><?=$concurso->getFechaFinCon() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Bases del concurso: ")?></dt>
  			<dd><?=$concurso->getBasesConcurso() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Patrocinadores:") ?></dt>
  			<dd><?=$concurso->getPatrocinadoresCon() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Premios:") ?></dt>
  			<dd><?=$concurso->getPremiosCon() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Organizador:") ?></dt>
  			<dd><?=$concurso->getOrganizadorCon() ?></dd>
		</dl>		
	</p>



    