<?php
// file: view/organizador/listar.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$pinchos = $view -> getVariable("pinchos");

$view -> setVariable("title", "Pinchos");
?><h1><?=i18n("Pinchos no validados") ?></h1>


<table border="1">
	<tr>
		<th><?= i18n("Nombre") ?></th>
		<th><?= i18n("Descripcion") ?></th>
		<th><?= i18n("Precio") ?></th>
		<th><?= i18n("Establecimiento") ?></th>
		<th><?= i18n("Validar") ?></th>
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
								<td>
									<a
			href="index.php?controller=organizador&amp;action=validarPincho&amp;nombrePincho=<?= $pincho -> getNombrePincho() ?>">Validar</a>
								
								</td>
		
	</tr>
    <?php endforeach; ?>

    </table>
    
 