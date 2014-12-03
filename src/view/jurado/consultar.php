<?php

//file: view/jurado/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$jurado = $view->getVariable("jurado");
$currentuser = $view->getVariable("currentusername");

$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar jurado");

?><h1><?= i18n("jurado").": ".htmlentities($jurado->getDniJurado()) ?></h1>
    <em><?= sprintf(i18n("Por %s"),$jurado->getNombreJurado) ?></em>
    <p>
    <?= htmlentities($jurado->getIsProfesional()) ?>
    </p>
