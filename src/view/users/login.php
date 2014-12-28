<?php
//file: view/users/login.php

require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view -> setVariable("title", "Login");
$errors = $view -> getVariable("errors");
?>
<html>
	<div class="row text-center">
	<img src="/src/view/general/logo.png" alt="Logo inicial" class="img-rounded">
	</div>
	<div class="jumbotron"> 
		<div class="container">
  <h2>Bienvenido a PeraPinchos </br><small> Tu plataforma de gestión de concursos de pinchos</small></h1>
  <p>PeraPinchos ha sido creada por el grupo 7 de la asignatura ABP para cubrir la necesidad de gestionar de manera digital y centralizada el Concurso de Pinchos anual de la ciudad de Ourense.</p>
  </div>
</div>
	
<h1><?= i18n("Login") ?></h1>
<?= isset($errors["general"]) ? $errors["general"] : "" ?>

<form action="index.php?controller=login&amp;action=loginL" method="POST">
	<div class="form-group">
		<label for="inputUsername"><?= i18n("Username") ?>:</label> 
		<input type="text" id="inputUsername" class="form-control" name="username"/>
	</div>
	<div class="form-group">
		 <label for="inputPass"><?= i18n("Password") ?>:</label>
		<input type="password" id="inputPass"  class="form-control" name="passwd"/>
	</div>
	 
   
   <div class="form-group">
   	<label for="tipoUser1"><?= i18n("Tipo de Usuario") ?>:</label> 
   
	<div class="radio">
	  <label>
	    <input type="radio" name="Tipo" id="tipoUser1" value="Organizador" checked>
	    <?= i18n("Organizador") ?>
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="Tipo" id="tipoUser2" value="Jurado">
	    <?= i18n("Jurado") ?>
	  </label>
	</div>
		<div class="radio">
	  <label>
	    <input type="radio" name="Tipo" id="tipoUser3" value="Establecimiento">
	    <?= i18n("Establecimiento") ?>
	  </label>
	</div>
	</div>

	<input class="btn btn-default btn-lg" type="submit" value="<?= i18n("Login") ?>">
</form>


<p><?= i18n("Not user?") ?> <a href="index.php?controller=registro&amp;action=registrar"><?= i18n("Register here!") ?></a></p>
<?php $view -> moveToFragment("css"); ?>
    <link rel="stylesheet" type="text/css" src="css/style2.css">
<?php $view -> moveToDefaultFragment(); ?>
</html>