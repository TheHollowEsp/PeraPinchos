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
      <div class="form-group">
      	<label for="inputNombre"><?= i18n("Nombre") ?>: <input  id="inputDNI" class="form-control" type="text" name="NombreCon" value="">
      <?= isset($errors["NombreCon"]) ? $errors["NombreCon"] : "" ?> </div>
      
       <div class="form-group">
      	<label for="inputFecha"><?= i18n("Fecha de Inicio") ?>: <input  id="inputFecha" class="form-control" type="date" name="FechaIniCon"	value="2013-12-12">
      <?= isset($errors["FechaIniCon"]) ? $errors["FechaIniCon"] : "" ?> </div>
      
       <div class="form-group">
      	<label for="inputFecha"><?= i18n("Fecha de Fin") ?>: <input  id="inputFecha" class="form-control" type="date" name="FechaFinCon" value="2013-12-12">
      <?= isset($errors["FechaFinCon"]) ? $errors["FechaFinCon"] : "" ?> </div>
      
       <div class="form-group">
      	<label for="inputBases"><?= i18n("Bases del concurso") ?>: <input  id="inputBases" class="form-control" type="text" name="BasesConcurso" value="">
      <?= isset($errors["BasesConcurso"]) ? $errors["BasesConcurso"] : "" ?> </div>
      
       <div class="form-group">
      	<label for="inputPat"><?= i18n("Patrocinadores") ?>: <input  id="inputPat" class="form-control" type="text" name="PatrocinadoresCon" value="">
      <?= isset($errors["PatrocinadoresCon"]) ? $errors["PatrocinadoresCon"] : "" ?> </div>
      
       <div class="form-group">
      	<label for="inputPremios"><?= i18n("Premios") ?>: <input  id="inputPremios" class="form-control" type="text" name="PremiosCon" value="">
      <?= isset($errors["PremiosCon"]) ? $errors["PremiosCon"] : "" ?> </div>
           
      <input class="btn btn-default" type="submit" value="<?= i18n("Registrar concurso") ?>">
</form></br>