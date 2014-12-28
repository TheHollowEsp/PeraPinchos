<?php
//file: view/pinchos/proponer.php

require_once (__DIR__ . "/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();
$errors = $view -> getVariable("errors");
$pincho = $view -> getVariable("pincho");
$view -> setVariable("title", "Proponer pincho");
?>
<h1><?= i18n("Propon un pincho") ?></h1>
<form action="index.php?controller=pinchos&amp;action=proponer" method="POST">
      <?= i18n("Nombre") ?>: <input type="text" name="nombre" 
			value="">
      <?= isset($errors["nombre"]) ? $errors["nombre"] : "" ?><br>
      
      <?= i18n("Descripcion") ?>: <input type="text" name="descripcion" 
			value="">
      <?= isset($errors["descripcion"]) ? $errors["descripcion"] : "" ?><br>
      
      <?= i18n("Precio") ?>: <input type="number" name="precio" 
			value="">
      <?= isset($errors["precio"]) ? $errors["precio"] : "" ?><br>
      
      <?= i18n("Ingredientes") ?>: <input type="text" name="ingredientes" 
			value="">
      <?= isset($errors["ingredientes"]) ? $errors["ingredientes"] : "" ?><br>
      
      <?= i18n("Foto") ?>: <input type="file" name="foto" enctype="multipart/form-data">
      <?= isset($errors["foto"]) ? $errors["foto"] : "" ?><br>
      
      <?= i18n("Informacion adicional") ?>: <input type="text" name="info" 
			value="">
      <?= isset($errors["info"]) ? $errors["info"] : "" ?><br>
      
      
      
      
      <input type="submit" value="<?= i18n("Proponer") ?>">
</form>