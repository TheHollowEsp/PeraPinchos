<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Inicio");
 $errors = $view->getVariable("errors");
?>

<h1><?= i18n("Estas en la pagina principal del organizador") ?></h1>

<form action="index.php?controller=jurado&amp;action=listar" method="POST">
<input type="submit" value="<?= i18n("Eliminar Jurado Profesional") ?>">
</form>