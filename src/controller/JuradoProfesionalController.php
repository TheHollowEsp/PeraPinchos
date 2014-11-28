<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");

require_once(__DIR__."/../controller/BaseController.php");

/**
 * Class JuradoProfesionalController
 * 
 * Controller to Consultar, registrar, eliminar, listar.
 * 
 * @author lipido <lipido@gmail.com>
 */
class JuradoProfesionalController extends BaseController {
  
  /**
   * Reference to the UserMapper to interact
   * with the database
   * 
   * @var UserMapper
   */  
  private $userMapper;    
  
  public function __construct() {    
    parent::__construct();
    
    $this->userMapper = new UserMapper();// queda decidir si usar el modelo User o crear uno llamado Jurado

    // Users controller operates in a "welcome" layout
    // different to the "default" layout where the internal
    // menu is displayed
    $this->view->setLayout("welcome"); //pendiente de cambio
  }
  
	public function registrar() {
	
   
  }
  
    public function listar() {
	
   
  }
  
    public function consultar() {
	
   
  }
  
    public function eliminar() {
	
   
  }
}
?>