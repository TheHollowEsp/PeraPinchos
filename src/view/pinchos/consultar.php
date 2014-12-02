<?php

//file: view/pinchos/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$pincho = $view->getVariable("pincho");
$currentuser = $view->getVariable("currentusername");

$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar pincho");

?><h1><?= i18n("Pincho").": ".htmlentities($pincho->getNombrePincho()) ?></h1>
    <em><?= sprintf(i18n("Por %s"),$pincho->getEstablecimiento) ?></em>
    <p>
    <?= htmlentities($pincho->getDescripcionPincho()) ?>
    </p>
