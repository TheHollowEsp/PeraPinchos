<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Inicio");
 $errors = $view->getVariable("errors");
?>

<h1><?= i18n("Estas en la pagina principal del establecimiento") ?></h1>

<form action="index.php?controller=concurso&amp;action=listarParaEstablecimiento" method="POST">
<input type="submit" value="<?= i18n("Registrate en un concurso") ?>">
</form>

<form action="index.php?controller=pinchos&amp;action=listar" method="POST">
<input type="submit" value="<?= i18n("Listar pinchos") ?>">
</form>
<form action="index.php?controller=pinchos&amp;action=proponer" method="POST">
<input type="submit" value="<?= i18n("Proponer pincho") ?>">
</form>
