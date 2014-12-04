<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Login");
 $errors = $view->getVariable("errors");
?>

<h1><?= i18n("Login") ?></h1>
<?= isset($errors["general"])?$errors["general"]:"" ?>

<form action="index.php?controller=login&amp;action=loginL" method="POST">
<?= i18n("Username")?>: <input type="text" name="username">
<?= i18n("Password")?>: <input type="password" name="passwd">
<input type="submit" value="<?= i18n("Login") ?>">

   Tipo de Usuario:<br /> 
   <select name="Tipo">    
       <option value="Organizador" >Organizador</option>
       <option value="Jurado" selected="selected">Jurado</option>
       <option value="Establecimiento">Establecimiento</option>
   </select>



</form>


<p><?= i18n("Not user?")?> <a href="index.php?controller=registro&amp;action=registrar"><?= i18n("Register here!")?></a></p>
<?php $view->moveToFragment("css");?>
    <link rel="stylesheet" type="text/css" src="css/style2.css">
<?php $view->moveToDefaultFragment(); ?>