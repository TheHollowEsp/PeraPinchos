<?php
// file: view/pinchos/listarJuradoP.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$pinchos = $view -> getVariable("pinchos");

$view -> setVariable("title", "Pinchos Especiales");
?><h1><?=i18n("Pinchos especiales") ?></h1>

<table border="1">
	<tr>
		<th><?= i18n("Nombre") ?></th>
		<th><?= i18n("Descripcion") ?></th>
		<th><?= i18n("Precio") ?></th>
		<th><?= i18n("Establecimiento") ?></th>
	</tr>

    <?php foreach ($pinchos as $pin): ?>
	    <tr>
		<td><a
			href="index.php?controller=pinchos&amp;action=consultar&amp;nombrePincho=<?= $pin -> getNombrePincho() ?>"><?= htmlentities($pin -> getNombrePincho()) ?></a>
		</td>
		<td>
		<?= $pin -> getDescripcionPincho() ?>
	      </td>
				<td>
				<?= $pin -> getPrecioPincho() ?>
						</td>
						<td>
						<?= $pin -> getEstablecimiento() ?>
								</td>
		
	</tr>
    <?php endforeach; ?>

    </table>