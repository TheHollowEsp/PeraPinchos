<?php 
 //file: view/users/login.php
 
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Inicio");
 $errors = $view->getVariable("errors");
 $concursos = $view->getVariable ( "concurso" );
?>

<h1><?= sprintf(i18n("Bienvenido, %s"),$_SESSION["currentuser"]) ?></h1>
<h3><?= i18n("Éstas son tus opciones: ") ?></h3>
<div class="form-group">
<form action="index.php?controller=jurado&amp;action=registrarJuradoProfesional"  method="POST">      
<input class="btn btn-default" type="submit" value="<?= i18n("Registro de Jurado Profesional")?>"></form></br>

<form action="index.php?controller=concurso&amp;action=registrarConcurso"  method="POST">      
<input class="btn btn-default" type="submit" value="<?= i18n("Registro de Concurso")?>"></form></br>

<form action="index.php?controller=concurso&amp;action=listarParaOrganizador"  method="POST">      
<input class="btn btn-default" type="submit" value="<?= i18n("Listar concursos")?>"></form></br>

<form action="index.php?controller=organizador&amp;action=listarPinchosNoValidado"  method="POST">      
<input class="btn btn-default" type="submit" value="<?= i18n("Validar pinchos")?>"></form></br>

<form action="index.php?controller=jurado&amp;action=listarParaUnirP"  method="POST">      
<input class="btn btn-default" type="submit" value="<?= i18n("Asignar pincho a jurado")?>"></form></br>

<form action="#"  method="POST">      
<input class="btn btn-default" type="submit" value="<?= i18n("A RELLENAR")?>"></form></br>

<form action="#"  method="POST">      
<input class="btn btn-default" type="submit" value="<?= i18n("a RELLENAR")?>"></form></br>
</div>



