<?php 
 //file: view/jurado/registroJurado.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $jurado = $view->getVariable("jurado");
 $view->setVariable("title", "registrarNewJurado");
?>
<h1><?= i18n("Registrarte como jurado")?></h1>
<form class="form-inline" action="index.php?controller=jurado&amp;action=registrarJuradoProfesional" method="POST">
      <div class="form-group"><label for="inputDNI"><?= i18n("DNI")?>:</label>
       <input id="inputDNI" class="form-control" type="text" name="DniJur" value="<?= $jurado->getDniJurado() ?>">
      <?= isset($errors["DniJur"])?$errors["DniJur"]:"" ?><br>
      </div>
      <div class="form-group"><label for="inputNombre"><?= i18n("Nombre")?>:</label>  <input id="inputNombre" class="form-control" type="text" name="Nombre" 
			value="">
      <?= isset($errors["Nombre"])?$errors["Nombre"]:"" ?><br>
      </div>
      <div class="form-group"><label for="inputPass"><?= i18n("Contraseña")?>:</label>  <input id="inputPass" class="form-control" type="password" name="PasswordJ" 
			value="">
      <?= isset($errors["PasswordJ"])?$errors["PasswordJ"]:"" ?><br>
      </div>
      <input class="btn btn-default" type="submit" value="<?= i18n("Registro")?>">
</form><br>