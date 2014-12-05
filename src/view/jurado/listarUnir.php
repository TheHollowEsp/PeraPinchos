<?php
// file: view/jurado/listar.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$jurado = $view -> getVariable("jurado");
$view -> setVariable("title", "Jurado");
?><h1><?=i18n("Posts") ?></h1>

<table border="1">
	<tr>
		<th><?= i18n("DNI") ?></th>
		<th><?= i18n("Nombre") ?></th>
		<th><?= i18n("Es Profesional") ?></th>
		<th><?= i18n("Añadir?") ?></th>
	</tr>

    <?php foreach ($jurado as $jur): ?>
	    <tr>
		<td><a
			href="index.php?controller=jurado&amp;action=consultar&amp;dniJurado=<?= $jur -> getDniJurado() ?>"><?= htmlentities($jur -> getDniJurado()) ?></a>
		</td>
		<td>
		<?= $jur -> getNombreJurado() ?>
	    </td>
		<td>
		<?= $jur -> getIsProfesional() ?>
		</td>
		
		<td><a
			href="index.php?controller=jurado&amp;action=unir&dniJurado=<?= $jur->getDniJurado()?>"><?= htmlentities("Unir") ?></a>
		</td>
		
	</tr>
    <?php endforeach; ?>

    </table>