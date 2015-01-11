<?php

//file: view/pinchos/folleto.php
require_once (__DIR__ . "/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$pinchos = $view -> getVariable("pinchos");

$view -> setVariable("title", "Folleto");
$errors = $view -> getVariable("errors");

?>
<style>/* add a little bottom space under the images */
.thumbnail {
	margin-bottom:7px;
}</style>
  <div class="row">
    <?php foreach ($pinchos as $pincho): ?>
    <div class="col-lg-4 col-sm-6 col-xs-12">			
        	<a href="index.php?controller=pinchos&amp;action=consultar&amp;nombrePincho=<?= $pincho -> getNombrePincho() ?>"/>
            <img src="<?=$pincho->getFotosPincho()?>" alt="Imagen del pincho" class="thumbnail img-responsive" width="800px" height="600px"/>            
    </div>
     <?php endforeach; ?>




  </div>
