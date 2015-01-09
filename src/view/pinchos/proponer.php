<?php
//file: view/pinchos/proponer.php

require_once (__DIR__ . "/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();
$errors = $view -> getVariable("errors");
$pincho = $view -> getVariable("pincho");
$ests = $view -> getVariable("est");
$concursos = $view -> getVariable("concursos");
$view -> setVariable("title", "Proponer pincho");
?>
<html>
	 <?PHP if($ests != null){   ?>
	<h1><?= i18n("Propon un pincho") ?></h1>
		<form action="index.php?controller=pinchos&amp;action=proponer" method="POST">
			<div class="form-group">
		      	<label for="inputNombre"> <?= i18n("Nombre") ?>:</label>
		      	<input id="inputNombre" class="form-control" type="text" name="nombre" value="">
		      	<?= isset($errors["nombre"]) ? $errors["nombre"] : "" ?><br>
      		</div>
			<div class="form-group">
		      	<label for="inputDesc">  <?= i18n("Descripcion") ?>: </label>
		      	<input id="inputDesc" class="form-control"  type="text" name="descripcion" value="">
		      	<?= isset($errors["descripcion"]) ? $errors["descripcion"] : "" ?><br>
		    </div>
      		<div class="form-group">
      			<div class="input-group">
      				<label for="inputPrecio"> <?= i18n("Precio") ?>:</label>
  					<input id="inputPrecio" class="form-control" type="number" name="precio" value="" class="form-control">
			</div>
      		<?= isset($errors["precio"]) ? $errors["precio"] : "" ?><br>
      </div>

      <div class="form-group">
      	<label for="inputNombre"> <?= i18n("Ingredientes") ?>:</label>
      	<input id="inputNombre" class="form-control"type="text" name="ingredientes" value="">
      	<?= isset($errors["ingredientes"]) ? $errors["ingredientes"] : "" ?><br>
      </div>

      <div class="form-group">
    	<label for="einputFile"> <?= i18n("Foto") ?>:</label>
   		<input type="file" id="einputFile" type="file" name="foto" enctype="multipart/form-data">
      	<?= isset($errors["foto"]) ? $errors["foto"] : "" ?><br>
      </div>

      <div class="form-group">
      	<label for="inputInfo">  <?= i18n("Informacion adicional") ?>:</label>
      	<input id="inputInfo" class="form-control"type="text" name="info"	value="">
      	<?= isset($errors["info"]) ? $errors["info"] : "" ?><br>
      </div>
       	<?php foreach ($ests as $est): ?>
       	<div class="radio">
      		<label>
	      	<input id="inputConcurso" class="form-control" type="radio" name="jarl"	value="<?= $est -> getNomCon()?>" ><?=$est -> getNomCon() ?>
	      	</label>


	      	<?= isset($errors["info"]) ? $errors["info"] : "" ?><br>
	    <?php endforeach; ?>
	    </div>

      	<input class="btn btn-default btn-lg" type="submit" value="<?= i18n("Proponer") ?>">
	</form>
		<?php } else { ?>
			<div class="jumbotron"> 
		<div class="container">
  <h2><?= i18n("No puedes proponer más pinchos") ?> </br></h2>
  <p><?= i18n("Solo se permite proponer un pincho por concurso.") ?> </p>
  </div>
</div>
			<?php } ?>
</html>
