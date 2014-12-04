<?php
//file: view/pinchos/proponer.php

require_once (__DIR__ . "/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();
$errors = $view -> getVariable("errors");
$concurso = $view -> getVariable("concurso");
$view -> setVariable("title", "Crear concurso");
?>
<h1><?= i18n("Concurso") ?></h1>
<form action="index.php?controller=concurso&amp;action=registrarConcurso" method="POST">
      <?= i18n("Nombre") ?>: <input type="text" name="NombreC" 
			value="">
      <?= isset($errors["nombreC"]) ? $errors["nombreC"] : "" ?><br>
      
      <?= i18n("Fecha de Inicio") ?>: <input type="date" name="FechaIni" 
			value="">
      <?= isset($errors["FechaIni"]) ? $errors["FechaIni"] : "" ?><br>
      
      <?= i18n("Fecha de Fin") ?>: <input type="date" name="FechaFin" 
			value="">
      <?= isset($errors["FechaFin"]) ? $errors["FechaFin"] : "" ?><br>
      
      <?= i18n("Bases del concurso") ?>: <input type="text" name="BasesCon" 
			value="">
      <?= isset($errors["BasesCon"]) ? $errors["BasesCon"] : "" ?><br>
      
      <?= i18n("Pattrocinadores") ?>: <input type="text" name="Patrocinadores" 
      <?= isset($errors["Patrocinadores"]) ? $errors["Patrocinadores"] : "" ?><br>
      
      <?= i18n("Premios") ?>: <input type="text" name="Premios" 
			value="">
      <?= isset($errors["Premios"]) ? $errors["Premios"] : "" ?><br>
           
      <input type="submit" value="<?= i18n("Registrar concurso") ?>">
</form>