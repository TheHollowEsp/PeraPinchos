<?php
// file: view/jurado/listar.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance ();

$concurso = $view->getVariable ( "concurso" );
$view->setVariable ( "title", "Concurso" );

?><h1><?=i18n("Concursos")?></h1>
<div class="row">
        <div class="col-md-6">
<table class="table table-hover">
	<thead>
	<tr>
		<th><?= i18n("Nombre concurso")?></th>
		<th><?= i18n("Fecha inicio")?></th>
		<th><?= i18n("Fecha fin")?></th>
		<th><?= i18n("Bases Concurso")?></th>
		<th><?= i18n("Patrocinadores")?></th>
		<th><?= i18n("Premios")?></th>
		<th><?= i18n("Seleccionar")?></th>
		
	</tr>
	</thead>

    <?php foreach ($concurso as $con): ?>
	    <tr>
			<td><a
				href="index.php?controller=concurso&amp;action=consultar&amp;NombreCon=<?= $con->getNombreCon() ?>"><?= htmlentities($con->getNombreCon()) ?></a>

	    	</td>
		  	<td>
				<?= $con->getFechaIniCon()?>
			</td>
			<td>
				<?= $con->getFechaFinCon()?>
			</td>
			<td>
				<?= $con->getBasesConcurso()?>
	    	</td>
		  	<td>
				<?= $con->getPatrocinadoresCon()?>
			</td>
			<td>
				<?= $con->getPremiosCon()?>
			</td>
			
			<td>
				<a
				href="#"  class="btn btn-primary active" role="button"></a>
			</td>
			
		
	</tr>
    <?php endforeach; ?>

    </table>
     </div>
    </div>