<?php 
 //file: view/general/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Registro");
 $errors = $view->getVariable("errors");

?>

<h1><?= i18n("Registro") ?></h1>
<?= isset($errors["general"])?$errors["general"]:"" ?>

<form class="form-inline" action="index.php?controller=jurado&amp;action=registrarNewJurado" method="POST">
<input class="btn btn-info " type="submit" value="<?= i18n("Registrate como Jurado") ?>">
</form>
</br>

<form class="form-inline" action="index.php?controller=establecimiento&amp;action=registrarEstablecimiento" method="POST">
<input class="btn btn-info " type="submit" value="<?= i18n("Registrate como Establecimiento") ?>">
</form>
</br>
<form class="form-inline" action="index.php?controller=organizador&amp;action=registrarOrganizador" method="POST">
<input class="btn btn-info " type="submit" value="<?= i18n("Registrate como Organizador") ?>">
</form>
</br>
<form class="form-inline" action="index.php?controller=users&amp;action=login"  method="POST">      
<input class="btn btn-info " type="submit" value="<?= i18n("Inicio sesion")?>">
</br></br>