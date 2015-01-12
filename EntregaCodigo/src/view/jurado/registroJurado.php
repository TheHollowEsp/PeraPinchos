<?php 
 //file: view/jurado/registroJurado.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $jurado = $view->getVariable("jurado");
 $view->setVariable("title", "registrarNewJurado");
?>
<h1><?= i18n("Registrarte como jurado")?></h1>
<form action="index.php?controller=jurado&amp;action=registrarNewJurado" method="POST">
      <label><?= i18n("DNI")?>:</label>   <input class="form-control" type="text" name="DniJur" 
			value="<?= $jurado->getDniJurado() ?>">
      <?= isset($errors["DniJur"])?$errors["DniJur"]:"" ?><br>
      
      <label><?= i18n("Nombre")?>:</label>   <input class="form-control" type="text" name="Nombre" 
			value="">
      <?= isset($errors["Nombre"])?$errors["Nombre"]:"" ?><br>
      
      <label><?= i18n("Contraseña")?>:</label>   <input class="form-control" type="password" name="PasswordJ" 
			value="">
      <?= isset($errors["PasswordJ"])?$errors["PasswordJ"]:"" ?><br>
      
      <input class="btn btn-warning btn-lg" type="submit" value="<?= i18n("Registro")?>">
</form>