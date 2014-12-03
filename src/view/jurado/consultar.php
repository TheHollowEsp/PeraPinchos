<?php

//file: view/jurado/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$jurado = $view->getVariable("jurado");
//$currentuser = $view->getVariable("currentusername");

$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar jurado");

?><h1><?= i18n("jurado").": ".htmlentities($jurado->getDniJurado()) ?></h1>
    <em><?= sprintf(i18n("Por %s"),$jurado->getNombreJurado) ?></em>
    <p>
    <?= htmlentities($jurado->getIsProfesional()) ?>
    </p>



<?php

if ($pincho->getIsValidado() == 0) echo(i18n("PINCHO NO VALIDADO"));
?><h1><?= i18n("Pincho").": ".htmlentities($pincho->getNombrePincho()) ?></h1>
	<em><?= sprintf(i18n("Descripcion: %s"),$pincho->getDescripcionPincho()) ?></em> </br>
	<em><?= sprintf(i18n("Coste: %s"),$pincho->getPrecioPincho()) ?></em></br>
	<em><?= sprintf(i18n("Ingredientes: %s"),$pincho->getIngredientesPincho()) ?></em></br>
	<em><?= sprintf(i18n("Informacion adicional: %s"),$pincho->getInfoPincho()) ?></em></br>

    <p>
    <?= sprintf(i18n("Solo en: %s"),$pincho->getEstablecimiento()) ?>
    </p>
