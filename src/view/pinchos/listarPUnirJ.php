<?php
// file: view/pinchos/listar.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$pinchos = $view -> getVariable("pinchos");

$view -> setVariable("title", "Pinchos");
?><h1><?=i18n("Pinchos") ?></h1>


<table border="1">
	<tr>
		<th><?= i18n("Nombre") ?></th>
		<th><?= i18n("Descripcion") ?></th>
		<th><?= i18n("Precio") ?></th>
		<th><?= i18n("Establecimiento") ?></th>
		<th><?= i18n("Asignar?") ?></th>
	</tr>

    <?php foreach ($pinchos as $pincho): ?>
	    <tr>
		<td><a
			href="index.php?controller=pinchos&amp;action=consultar&amp;nombrePincho=<?= $pincho -> getNombrePincho() ?>"><?= htmlentities($pincho -> getNombrePincho()) ?></a>
		</td>
		<td>
		<?= $pincho -> getDescripcionPincho() ?>
	      </td>
				<td>
				<?= $pincho -> getPrecioPincho() ?>
						</td>
						<td>
						<?= $pincho -> getEstablecimiento() ?>
								</td>
								<td><a
							href="index.php?controller=pinchos&amp;action=unir&amp;nombrePincho=<?= $pincho -> getNombrePincho() ?>"><?= htmlentities("Asignar") ?></a>
								</td>
		
	</tr>
    <?php endforeach; ?>

    </table>
    
 