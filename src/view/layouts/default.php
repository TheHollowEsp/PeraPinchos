<?php
// file: view/layouts/default.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance ();
$currentuser = $view->getVariable ( "currentusername" );
ini_set ( 'display_errors', 'On' );
?>
<!DOCTYPE html>
<html>
<head>
<title><?= $view->getVariable("title", "no title") ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">
    <?= $view->getFragment("css")?>
    <?= $view->getFragment("javascript")?>
  </head>
<body>
	<!-- header -->
	<header>
		<h1>Pinchos Pera</h1>

	</header>

	<main>
	<div id="flash">
	<?= $view->popFlash()?>
      </div>
      
      <?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>    
    </main>

	<footer class="footer">
      <?php
						include (__DIR__ . "/language_select_element.php");
						?>
    </footer>

</body>
</html>