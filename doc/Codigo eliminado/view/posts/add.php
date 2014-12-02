<?php 
 //file: view/posts/add.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 
 $post = $view->getVariable("pincho");
 $errors = $view->getVariable("errors");
 
 $view->setVariable("title", "Registrar pincho");
 
?><h1><?= i18n("Create post")?></h1>
      <form action="index.php?controller=Establecimiento&amp;action=proponerPincho" method="POST">
	    <?= i18n("Title") ?>: <input type="text" name="nombrePincho" 
			     value="<?= $pincho->getNombrePincho() ?>">
	    <?= isset($errors["title"])?$errors["title"]:"" ?><br>
	    
	    <?= i18n("Contents") ?>: <br>
	    <textarea name="content" rows="4" cols="50"><?= 
	    $post->getContent() ?></textarea>
	    <?= isset($errors["content"])?$errors["content"]:"" ?><br>
	    
	    <input type="submit" name="submit" value="submit">
      </form>
