<?php
//file: view/pinchos/registrar.php

require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view -> getVariable("errors");
$organizador= $view -> getVariable("organizador");
$view -> setVariable("title", "Registrar organizador");
?>
<h1><?= i18n("Registrarse como Organizador") ?></h1>
<form action="index.php?controller=organizador&amp;action=registrarOrganizador" method="POST">
      <?= i18n("DNI") ?>: <input type="text" name="DniOrg" 
			value="">
      <?= isset($errors["DniOrg"]) ? $errors["DniOrg"] : "" ?><br>
      
      <?= i18n("Nombre") ?>: <input type="text" name="NombreOrg" 
			value="">
      <?= isset($errors["NombreOrg"]) ? $errors["NombreOrg"] : "" ?><br>
      
      <?= i18n("Telefono") ?>: <input type="text" name="Telefono" 
			value="">
      <?= isset($errors["Telefono"]) ? $errors["Telefono"] : "" ?><br>
      
      <?= i18n("Email") ?>: <input type="text" name="Email" 
			value="">
      <?= isset($errors["Email"]) ? $errors["Email"] : "" ?><br>
      
      <?= i18n("PasswordO") ?>: <input type="password" name="PasswordO" 
			value="">
      <?= isset($errors["PasswordO"]) ? $errors["PasswordO"] : "" ?><br>
      
      <input type="submit" value="<?= i18n("Registrarse") ?>">
</form>