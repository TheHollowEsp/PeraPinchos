<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Inicio");
 $errors = $view->getVariable("errors");
 $concursos = $view->getVariable ( "concurso" );
?>

<h1><?= i18n("Estas en la pagina principal del organizador, que quieres hacer") ?></h1>

<form action="index.php?controller=concurso&amp;action=registrarConcurso"  method="POST">      
<input type="submit" value="<?= i18n("Registro de Concurso")?>"></form>

<form action="index.php?controller=concurso&amp;action=listarParaOrganizador"  method="POST">      
<input type="submit" value="<?= i18n("Listar concursos")?>"></form>

<form action="index.php?controller=concurso&amp;action=listarParaOrganizador"  method="POST">      
<input type="submit" value="<?= i18n("Asignar jurado a concurso")?>"></form>

<h1><?=i18n("Posts")?></h1>

