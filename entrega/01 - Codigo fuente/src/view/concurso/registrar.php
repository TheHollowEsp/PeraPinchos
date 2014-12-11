<?php
//file: view/concurso/registrar.php

require_once (__DIR__ . "/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();
$errors = $view -> getVariable("errors");
$concurso = $view -> getVariable("concurso");
$view -> setVariable("title", "Crear concurso");
?>
<h1><?= i18n("Concurso") ?></h1>
<form action="index.php?controller=concurso&amp;action=registrarConcurso" method="POST">
      <?= i18n("Nombre") ?>: <input type="text" name="NombreCon" 
			value="">
      <?= isset($errors["NombreCon"]) ? $errors["NombreCon"] : "" ?><br>
      
      <?= i18n("Fecha de Inicio") ?>: <input type="date" name="FechaIniCon" 
			value="2013-12-12">
      <?= isset($errors["FechaIniCon"]) ? $errors["FechaIniCon"] : "" ?><br>
      
      <?= i18n("Fecha de Fin") ?>: <input type="date" name="FechaFinCon" 
			value="2013-12-12">
      <?= isset($errors["FechaFinCon"]) ? $errors["FechaFinCon"] : "" ?><br>
      
      <?= i18n("Bases del concurso") ?>: <input type="text" name="BasesConcurso" 
			value="">
      <?= isset($errors["BasesConcurso"]) ? $errors["BasesConcurso"] : "" ?><br>
      
      <?= i18n("PattrocinadoresCon") ?>: <input type="text" name="PatrocinadoresCon" 
      <?= isset($errors["PatrocinadoresCon"]) ? $errors["PatrocinadoresCon"] : "" ?><br>
      
      <?= i18n("PremiosCon") ?>: <input type="text" name="PremiosCon" 
			value="">
      <?= isset($errors["PremiosCon"]) ? $errors["PremiosCon"] : "" ?><br>
           
      <input type="submit" value="<?= i18n("Registrar concurso") ?>">
</form>