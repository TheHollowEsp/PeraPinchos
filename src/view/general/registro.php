<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Registro");
 $errors = $view->getVariable("errors");
?>

<h1><?= i18n("Registro") ?></h1>
<?= isset($errors["general"])?$errors["general"]:"" ?>

<form action="index.php?controller=jurado&amp;action=registrarNewJurado" method="POST">
<input type="submit" value="<?= i18n("Registrate como Jurado") ?>">
</form>

<form action="index.php?controller=establecimiento&amp;action=registrarEstablecimiento" method="POST">
<input type="submit" value="<?= i18n("Registrate como Establecimiento") ?>">
</form>

<form action="index.php?controller=organizador&amp;action=registrarOrganizador" method="POST">
<input type="submit" value="<?= i18n("Registrate como Organizador") ?>">
</form>