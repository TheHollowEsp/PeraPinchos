<?php 
 //file: view/jurado/registroJurado.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $jurado = $view->getVariable("jurado");
 $view->setVariable("title", "registrarNewJurado");
?>
<h1><?= i18n("Registrarte como jurado")?></h1>
<form action="index.php?controller=jurado&amp;action=registrarJuradoProfesional" method="POST">
      <?= i18n("DNI")?>: <input type="text" name="DniJur" 
			value="<?= $jurado->getDniJurado() ?>">
      <?= isset($errors["DniJur"])?$errors["DniJur"]:"" ?><br>
      
      <?= i18n("Nombre")?>: <input type="text" name="Nombre" 
			value="">
      <?= isset($errors["Nombre"])?$errors["Nombre"]:"" ?><br>
      
      <?= i18n("Contraseña")?>: <input type="password" name="PasswordJ" 
			value="">
      <?= isset($errors["PasswordJ"])?$errors["PasswordJ"]:"" ?><br>
      
      <input type="submit" value="<?= i18n("Registro")?>">
</form>