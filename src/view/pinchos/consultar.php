<?php

//file: view/pinchos/consultar.php
require_once(__DIR__."/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$pincho = $view->getVariable("pincho");
$isjurado = $view->getVariable("isjurado");


$errors = $view->getVariable("errors");

$view->setVariable("title", "Consultar pincho");
if ($pincho->getIsValidado() == 0) echo(i18n("PINCHO NO VALIDADO"));

?><h1><?= i18n("Pincho").": ".htmlentities($pincho->getNombrePincho()) ?></h1>
	<em><?= sprintf(i18n("Descripcion: %s"),$pincho->getDescripcionPincho()) ?></em> </br>
	<em><?= sprintf(i18n("Coste: %s"),$pincho->getPrecioPincho()) ?></em></br>
	<em><?= sprintf(i18n("Ingredientes: %s"),$pincho->getIngredientesPincho()) ?></em></br>
	<em><?= sprintf(i18n("Informacion adicional: %s"),$pincho->getInfoPincho()) ?></em></br>

    <p>
    <?= sprintf(i18n("Solo en: %s"),$pincho->getEstablecimiento()) ?>
    </p>
    
    <?php if($isjurado){ ?>
    	
<form action="index.php?controller=pinchos&amp;action=valorar&amp;nombrePincho=<?= $pincho -> getNombrePincho()?>" method="POST">
<select name="valoracion">    
       <option value="1" selected="selected">1</option>
       <option value="2">2</option>
       <option value="2">3</option>
       <option value="2">4</option>
       <option value="2">5</option>       
   </select>
<input type="submit" value="<?= i18n("Valorar") ?>">
</form>

<?php } ?>
