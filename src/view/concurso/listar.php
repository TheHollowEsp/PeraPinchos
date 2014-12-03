<?php
// file: view/jurado/listar.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance ();

$concurso = $view->getVariable ( "concurso" );
$view->setVariable ( "title", "Concurso" );

?><h1><?=i18n("Posts")?></h1>

<table border="1">
	<tr>
		<th><?= i18n("Nombre concurso")?></th>
		<th><?= i18n("Fecha inicio")?></th>
		<th><?= i18n("Fecha fin")?></th>
		<th><?= i18n("Bases Concurso")?></th>
		<th><?= i18n("Patrocinadores")?></th>
		<th><?= i18n("Premios")?></th>
	</tr>

    <?php foreach ($concurso as $con): ?>
	    <tr>
			<td><a
				href="index.php?controller=concurso&amp;action=consultar&amp;NombreC=<?= $con->getNombreC() ?>"><?= htmlentities($con->getNombreC()) ?></a>
			</td>
			<td>
				<?= $con->getNombreC()?>
	    	</td>
		  	<td>
				<?= $con->getFechaIni()?>
			</td>
			<td>
				<?= $con->getFechaFin()?>
			</td>
			<td>
				<?= $con->getBasesCon()?>
	    	</td>
		  	<td>
				<?= $con->getPatrocinadores()?>
			</td>
			<td>
				<?= $con->getPremios()?>
			</td>
		
	</tr>
    <?php endforeach; ?>

    </table>