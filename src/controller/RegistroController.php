<?php
require_once (__DIR__."/../core/ViewManager.php");
require_once (__DIR__."/../core/I18n.php");

require_once (__DIR__."/../controller/BaseController.php");

ini_set('display_errors', 'On');

class RegistroController extends BaseController {

	private $JuradoMapper;    
  
	public function __construct() {
		parent::__construct();
    
		//$this->JuradoMapper = new JuradoMapper();
		//$this->view->setLayout("welcome"); //pendiente de cambio
  }

	public function registrar() {

    //$this->view->setVariable("jurado", $jurado);//falta cambiar
    $this->view->render("general", "registro");//falta cambiar
    
  }
}
?>