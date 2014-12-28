<?php
// file: view/layouts/welcome.php
require_once (__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();

ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html>
<head>
	
<title><?= $view -> getVariable("title", "no title") ?></title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css" type="text/css">
    <?= $view -> getFragment("css") ?>
    <?= $view -> getFragment("javascript") ?>
  </head>
<body role="document">
	<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PeraPinchos for Organizadores</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="#">Home</a></li>-->
            <li><a href="index.php?controller=jurado&amp;action=registrarJuradoProfesional"><?= i18n("Añadir Jurado")?></a></li>
            <li><a href="index.php?controller=concurso&amp;action=registrarConcurso"><?= i18n("Registrar Concurso")?></a></li>
            <li><a href="index.php?controller=concurso&amp;action=listarParaOrganizador"><?= i18n("Listar concursos")?></a></li>
            <li><a href="index.php?controller=organizador&amp;action=listarPinchosNoValidado"><?= i18n("Validar pinchos")?></a></li>
            <li><a href="index.php?controller=jurado&amp;action=listarParaUnirP"><?= i18n("Asignar pinchos")?></a></li>
            <li><a href="index.php?controller=organizador&amp;action=eliminar"><?= i18n("Darse de baja")?></a></li>
            <li><a href="index.php?controller=login&amp;action=logout">Logout</a></li>
            
           <!-- 
 

<form action=""  method="POST">      
<input type="submit" value=""></form>
           	--> 
            
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    
    
	    <div class="container theme-showcase" role="main">
	<main> <!-- flash message -->
	<div id="flash">
	<?= $view -> popFlash() ?>
      </div>
      <?= $view -> getFragment(ViewManager::DEFAULT_FRAGMENT) ?>
    </main>
    
	<footer>
      <?php
	include (__DIR__ . "/language_select_element.php");
						?>
    </footer>
    </div class="container theme-showcase" role="main">
</body>
</html>