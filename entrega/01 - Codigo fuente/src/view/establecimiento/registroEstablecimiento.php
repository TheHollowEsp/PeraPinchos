<?php

require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view -> getVariable("errors");
$establecimiento= $view -> getVariable("establecimiento");
$view -> setVariable("title", "Registrar establecimiento");
?>
<h1><?= i18n("Registrarse como Establecimiento") ?></h1>
<form action="index.php?controller=establecimiento&amp;action=registrarEstablecimiento" method="POST">
      <?= i18n("Nombre del Establecimiento") ?>: <input type="text" name="NombreEst" 
			value="">
      <?= isset($errors["NombreEst"]) ? $errors["NombreEst"] : "" ?><br>
      
      <?= i18n("Direccion") ?>: <input type="text" name="Direccion" 
			value="">
      <?= isset($errors["Direccion"]) ? $errors["Direccion"] : "" ?><br>
      
      <?= i18n("Horario") ?>: <input type="text" name="Horario" 
			value="">
      <?= isset($errors["Horario"]) ? $errors["Horario"] : "" ?><br>
      
      <?= i18n("Fotos") ?>: <input type="text" name="Fotos" 
			value="">
      <?= isset($errors["Fotos"]) ? $errors["Fotos"] : "" ?><br>
      
      <?= i18n("Web") ?>: <input type="text" name="Web" 
			value="">
      <?= isset($errors["Web"]) ? $errors["Web"] : "" ?><br>
      
      <?= i18n("Password") ?>: <input type="password" name="PasswordE" 
			value="">
      <?= isset($errors["PasswordE"]) ? $errors["PasswordE"] : "" ?><br>
      <input type="submit" value="<?= i18n("Registrarse") ?>">
</form>