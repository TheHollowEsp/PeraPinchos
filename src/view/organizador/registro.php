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
      <div class="form-group">
      	<label for="inputDNI"><?= i18n("DNI") ?>:</label> 
        <input id="inputDNI" class="form-control" type="text" name="DniOrg" value="">     			
      <?= isset($errors["DniOrg"]) ? $errors["DniOrg"] : "" ?><br>      
      
      	<label for="inputNombre"><?= i18n("Nombre") ?>:</label>  
      	<input id="inputNombre" class="form-control" type="text" name="NombreOrg" value="">      
	  <?= isset($errors["NombreOrg"]) ? $errors["NombreOrg"] : "" ?><br>
      
      <label for="inputTlfn"><?= i18n("Telefono") ?>: </label> 
      	<input id="inputTlfn" class="form-control" type="text" name="Telefono" value="">
      <?= isset($errors["Telefono"]) ? $errors["Telefono"] : "" ?><br>
      
       <label for="inputmail"><?= i18n("Email") ?>: </label> 
       <input id="inputmail" class="form-control" type="text" name="Email" value="">
      <?= isset($errors["Email"]) ? $errors["Email"] : "" ?><br>
      
      <label for="inputPass"><?= i18n("PasswordO") ?>:</label> <input id="inputPass" class="form-control" type="password" name="PasswordO" 
			value="">
      <?= isset($errors["PasswordO"]) ? $errors["PasswordO"] : "" ?><br>
      
      <input class="btn btn-warning btn-lg" type="submit" value="<?= i18n("Registrarse") ?>"></br>
      </div>
</form>