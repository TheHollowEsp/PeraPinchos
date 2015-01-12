<?php

require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view -> getVariable("errors");
$establecimiento= $view -> getVariable("establecimiento");
$view -> setVariable("title", "Registrar establecimiento");
?>
<h1><?= i18n("Registrarse como Establecimiento") ?></h1>
<form action="index.php?controller=establecimiento&amp;action=registrarEstablecimiento" method="POST">
	  <div class="form-group">
	  <label><?= i18n("Cif del Establecimiento") ?>:</label>  
	  	<input type="text" class="form-control" name="Cif" value="">
	  <?= isset($errors["Cif"]) ? $errors["Cif"] : "" ?><br>
      <label><?= i18n("Nombre del Establecimiento") ?>:</label>   <input class="form-control" type="text" name="NombreEst" 
			value="">
      <?= isset($errors["NombreEst"]) ? $errors["NombreEst"] : "" ?><br>
      
      <label><?= i18n("Direccion") ?>:</label>   <input class="form-control"  type="text" name="Direccion" 
			value="">
      <?= isset($errors["Direccion"]) ? $errors["Direccion"] : "" ?><br>
      
      <label><?= i18n("Horario") ?>:</label>   <input class="form-control" type="text" name="Horario" 
			value="">
      <?= isset($errors["Horario"]) ? $errors["Horario"] : "" ?><br>
      
      <!--<label><?= i18n("Fotos") ?>:</label>   <input class="form-control" type="text" name="Fotos" 
			value="">
      <?= isset($errors["Fotos"]) ? $errors["Fotos"] : "" ?><br>-->
      
      <label><?= i18n("Web") ?>:</label>   <input class="form-control" type="text" name="Web" 
			value="">
      <?= isset($errors["Web"]) ? $errors["Web"] : "" ?><br>
      
      <label><?= i18n("Password") ?>:</label>   <input class="form-control" type="password" name="PasswordE" 
			value="">
      <?= isset($errors["PasswordE"]) ? $errors["PasswordE"] : "" ?><br>
      <input class="btn btn-warning btn-lg" type="submit" value="<?= i18n("Registrarse") ?>">
      </div>
</form>