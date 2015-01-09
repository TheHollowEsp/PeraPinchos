<?php
// file: view/layouts/language_select_element.php
if( $_SESSION["__currentlang__"] == "en"){
?>
<a href="index.php?controller=language&action=change&lang=es" id="buttonES" class="btn btn-primary disabled"role="button"> <?= i18n("Español") ?></a>
<a href="index.php?controller=language&action=change&lang=en" id="buttonEN" class="btn btn-primary active"role="button"> <?= i18n("Inglés") ?></a>
<?php }else{ ?>
<a href="index.php?controller=language&action=change&lang=es" id="buttonES" class="btn btn-primary active"role="button"> <?= i18n("Spanish") ?></a>
<a href="index.php?controller=language&action=change&lang=en" id="buttonEN" class="btn btn-primary disabled"role="button"> <?= i18n("English") ?></a>
<?php } ?>
