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
		<th><?= i18n("Bases Concurso")?></th>
		<th><?= i18n("Premios")?></th>
		<th><?= i18n("Apuntarse")?></th>
	</tr>

    <?php foreach ($concurso as $con): ?>
	    <tr>
			<td><a
				href="index.php?controller=concurso&amp;action=consultar&amp;NombreCon=<?= $con->getNombreCon() ?>"><?= htmlentities($con->getNombreCon()) ?></a>

	    	</td>
			<td>
				<?= $con->getBasesConcurso()?>
	    	</td>

			<td>
				<?= $con->getPremiosCon()?>
			</td>
			
			<td><a
				href="index.php?controller=establecimiento&amp;action=registrarseEnConcurso&amp;NombreCon=<?= $con->getNombreCon() ?>"><?= htmlentities("Registrate!") ?></a>
			</td>
		
	</tr>
    <?php endforeach; ?>

    </t