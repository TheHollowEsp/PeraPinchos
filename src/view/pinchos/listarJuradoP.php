<?php
// file: view/pinchos/listarJuradoP.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$pinchos = $view -> getVariable("pinchos");

$view -> setVariable("title", "Listado de Pinchos");
?><h1><?=i18n("Pinchos de Jurado Profesional") ?></h1>

<div class="row">
        <div class="col-md-6">
          <table class="table">
          	<thead>
	<tr>
		<th><?= i18n("Nombre") ?></th>
		<th><?= i18n("Descripcion") ?></th>
		<th><?= i18n("Precio") ?></th>
		<th><?= i18n("Establecimiento") ?></th>
	</tr>
</thead>
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
    </div>
    </div>
    