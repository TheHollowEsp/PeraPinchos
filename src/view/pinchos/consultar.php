<?php

//file: view/pinchos/consultar.php
require_once (__DIR__ . "/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$pincho = $view -> getVariable("pincho");
$isjurado = $view -> getVariable("isjurado");

$errors = $view -> getVariable("errors");

$view -> setVariable("title", "Consultar pincho");
if ($pincho -> getIsValidado() == 0)
	echo(i18n("PINCHO NO VALIDADO"));
?>
<h1>
	<dl class="dl-horizontal">
  		<dt><?= i18n("Pincho: ") ?></dt>
  		<dd><?=$pincho -> getNombrePincho() ?></dd>
	</dl>
</h1>
	<p>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Descripcion:") ?></dt>
  			<dd><?=$pincho -> getDescripcionPincho() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Coste:") ?></dt>
	  		<dd><?=$pincho -> getPrecioPincho() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Ingredientes:")?></dt>
  			<dd><?=$pincho -> getIngredientesPincho() ?></dd>
		</dl>
		<dl class="dl-horizontal">
  			<dt><?= i18n("Informacion adicional:") ?></dt>
  			<dd><?=$pincho -> getInfoPincho() ?></dd>
		</dl>		
	</p>
	
    <p>
    <?= sprintf(i18n("Solo en: %s"), $pincho -> getEstablecimiento()) ?>
    </p>
    
    <?php if($isjurado){ ?>
    	
<form action="index.php?controller=pinchos&amp;action=valorar&amp;nombrePincho=<?= $pincho -> getNombrePincho() ?>" method="POST">
<select name="valoracion">    
       <option value="1" selected="selected">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>       
   </select>
<input type="submit" value="<?= i18n("Valorar") ?>">
</form>

<?php } ?>
