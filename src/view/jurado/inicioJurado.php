<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Inicio");
 $errors = $view->getVariable("errors");
?>

<h1><?= sprintf(i18n("Bienvenido a tu página de inicio, %s"),$_SESSION["currentuser"]) ?></h1>

<p><a href="index.php?controller=pinchos&amp;action=listarParaJurado">Listar pinchos asignados</a></p>