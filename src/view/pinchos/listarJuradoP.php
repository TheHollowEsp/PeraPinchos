<?php
// file: view/pinchos/listarJuradoP.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$pinchos = $view -> getVariable("pinchos");
$currentusera = $_SESSION["currentuser"];
echo $currentusera;

$view -> setVariable("title", "Pinchos Especiales");
?><h1><?=i18n("Pinchos especiales") ?></h1>



<table border="1">
	<tr>
		<th><?= i18n("Nombre") ?></th>
		<th><?= i18n("Descripcion") ?></th>
		<th><?= i18n("Precio") ?></th>
		<th><?= i18n("Establecimiento") ?></th>
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
		
	</tr>
    <?php endforeach; ?>

    </table>
    
 