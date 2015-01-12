<?php

//file: view/pinchos/consultar.php
require_once (__DIR__ . "/../../core/ViewManager.php");
ini_set('display_errors', 'On');
$view = ViewManager::getInstance();

$pincho = $view -> getVariable("pincho");
$isjurado = $view -> getVariable("isjurado");
$est = $view -> getVariable("est");

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

	<div class="img-responsive center-block" style="width:300px;height:300px;overflow:hidden;" >
   <img src="<?=$pincho->getFotosPincho()?>" alt="Imagen del pincho"  width="300px" height="auto"/>
	</div>
	
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
	
	<?php foreach ($est as $et): ?>
    <h2>
    <?= sprintf(i18n("Solo en: %s"), $et -> getNombreEst()) ?>
    </h2>
    <?php endforeach; ?>
    
    <?php if($isjurado){ ?>
    	
<form action="index.php?controller=pinchos&amp;action=valorar&amp;nombrePincho=<?= $pincho -> getNombrePincho() ?>" method="POST">



<select name="valoracion" class="form-control">    
       <option value="1" selected="selected">1 - <?= i18n("Very bad") ?></option>
       <option value="2">2 - <?= i18n("Bad") ?></option>
       <option value="3">3 - <?= i18n("Plain") ?></option>
       <option value="4">4 - <?= i18n("Good") ?></option>
       <option value="5">5 - <?= i18n("Very good") ?></option>       
   </select>
  </br>
<input class="btn btn-info btn-lg" type="submit" value="<?= i18n("Valorar") ?>">
  </br>  </br>
</form>

<?php } ?>
