<?php
// file: view/pinchos/listarVotos.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$votos = $view -> getVariable("votos");
$concursos = $view -> getVariable("concursos");

$view -> setVariable("title", "Pinchos");
?>


<div class="row">
        <div class="col-md-6">
        	
        	<?php foreach ($concursos as $concurso): ?>
        		<h1><?=i18n("Pinchos del concurso") ?> <br>
        			 <?=$concurso -> getNombreCon()?> </h1>
          <table class="table">
            <thead>
	<tr>
		<th><?= i18n("Nombre") ?></th>
		<th><?= i18n("Número de votos") ?></th>
		<th><?= i18n("Media") ?></th>
		<th><?= i18n("Concurso asociado") ?></th>
	</tr>
</thead>
    <?php foreach ($votos as $voto): ?>
    	<?php if ($voto -> getConcurso() == $concurso -> getNombreCon())
{
?>
	    <tr>
		<td>
			<?= $voto -> getNombrePincho() ?>
		</td>
		
		<td>
		<?= $voto -> getNumVoto() ?>
		</td>
		
		<td>
		<?= $voto -> getMedia() ?>
		</td>
		
		<td>
		<?= $voto -> getConcurso() ?>
		</td>
		
	</tr>
	<?php } ?>
    <?php endforeach; ?>
    
    

    </table>
    
    <?php endforeach; ?>
    </div>
    </div>
    
 