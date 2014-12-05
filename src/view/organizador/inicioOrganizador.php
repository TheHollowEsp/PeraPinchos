<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Inicio");
 $errors = $view->getVariable("errors");
 $concursos = $view->getVariable ( "concurso" );
?>

<h1><?= i18n("Estas en la pagina principal del organizador, que quieres hacer") ?></h1>

<form action="index.php?controller=jurado&amp;action=registrarJuradoProfesional"  method="POST">      
<input type="submit" value="<?= i18n("Registro de Jurado Profesional")?>"></form>

<form action="index.php?controller=concurso&amp;action=registrarConcurso"  method="POST">      
<input type="submit" value="<?= i18n("Registro de Concurso")?>"></form>

<form action="index.php?controller=concurso&amp;action=listarParaOrganizador"  method="POST">      
<input type="submit" value="<?= i18n("Listar concursos")?>"></form>

<form action="index.php?controller=organizador&amp;action=listarPinchosNoValidado"  method="POST">      
<input type="submit" value="<?= i18n("Validar pinchos")?>"></form>

<form action="index.php?controller=jurado&amp;action=listarParaUnirP"  method="POST">      
<input type="submit" value="<?= i18n("Asignar pincho a jurado")?>"></form>


<h1><?=i18n("Posts")?></h1>

