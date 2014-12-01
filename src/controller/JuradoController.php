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
  	/**
	 * Se llama a esta funcion con un GET para obtener el formulario
	 * Se llama a esta funcion con un POST para intentar registrar al Jurado
	 * Los datos que se esperan son dniJurado y nombreJurado
	 */
	public function registrar() {
	
   
  }
    /**
	 * Se llama a esta funcion solo con un GET para obtener la lista de elementos de la tabla Jurado
	 */
    public function listar() {
	
   
  }
  	/**
	 * Se llama a esta funcion solo con un GET para obtener la información especifica
	 * de un unico elemento de la tabla Jurado
	 * El dato que se espera es dniJurado
	 */
    public function consultar() {
	
   
  }
  	/**
	 * Se llama a esta funcion con un GET para obtener la informacion del elemento que se desea borrar
	 * Se llama a esta funcion con un POST para borrar el elemento si todo es correcto
	 * El dato que se espera es dniJurado
	 */
    public function eliminar() {
	
   
  }
}
?>