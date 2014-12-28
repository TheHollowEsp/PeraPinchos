<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Inicio");
 $errors = $view->getVariable("errors");
?>

<h1><?= sprintf(i18n("Bienvenido a tu inicio, %s"),$_SESSION["currentuser"]) ?></h1>
<div class="form-group">
<form action="index.php?controller=pinchos&amp;action=listar" method="POST">
<input class="btn btn-default" type="submit" value="<?= i18n("Listar pinchos") ?>">
</form>
</div>
<div class="form-group">
<form action="index.php?controller=concurso&amp;action=listarParaEstablecimiento" method="POST">
<input class="btn btn-default" type="submit" value="<?= i18n("Apuntarse a un concurso") ?>">
</form>
</div>
<div class="form-group">
<form action="index.php?controller=pinchos&amp;action=proponer" method="POST">
<input class="btn btn-default" type="submit" value="<?= i18n("Proponer pincho") ?>">
</form>
</div>
<div class="form-group">
<form action="#" method="POST">
<input class="btn btn-default" type="submit" value="<?= i18n("Darse de baja") ?>">
</form>
</div>

