<?php
require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__ . "/../model/Pincho.php");
require_once (__DIR__ . "/../model/Organizador.php");
require_once (__DIR__ . "/../model/OrganizadorMapper.php");
require_once (__DIR__ . "/../model/Jurado.php");

require_once (__DIR__ . "/../controller/BaseController.php");
ini_set('display_errors', 'On');
/**
 * Class PinchosController
 *
 * Controlador de Listar pinchos, listar pinchos valorables, consultar pincho, valorar pincho
 *
 * @author hrlopez
*/
class OrganizadorController extends BaseController {

	/**
	 * Utilizar pinchoMapper para llegar a la DB
	 * @var pinchoMapper
	 */
	
	private $OrganizadorMapper;

	public function __construct() {
		parent::__construct();

		$this -> OrganizadorMapper = new OrganizadorMapper();

		// Users controller operates in a "welcome" layout
		// different to the "default" layout where the internal
		// menu is displayed
		$this -> view -> setLayout("welcome");
		//pendiente de cambio
	}
	
	
	/** 
	 * 
	 * Funcion de registro de organizador
	 * 
	 */
	public function registrarOrganizador(){
		$organizador = new Organizador();
		
		try{
			$organizador -> checkIsValidForCreate();
			$this->OrganizadorMapper->save($organizador);
			$this->view->setFlash("Organizador añadido correctamente, ya puedes loguearte");
			$this->view->redirect("users","login"); //falta cambiar
		}catch(ValidationException $ex){
			$errors = $ex->getErrors();
			$this->view->setVariable("errors",$errors);
		}
		
		$this->view->setVariable("organizador",$organizador);//falta cambiar
		$this->view->render("users","register");//falta cambiar
	}
	
	public function validarPincho(){
		
	}
	/**
	 * 
	 * Funcion eliminar organizador
	 * Pendiente de revision y alguna cosilla mas
	 * 
	 */
	public function eliminar(){

		$DniOrg = $_SESSION['login'];
		$organizador = $this->OrganizadorMapper->findByDni($DniOrg);
		$this->OrganizadorMapper->delete($organizador);
		$this->view->setFlash("Has sido eliminado junto con el concurso");
		$this->view->redirect("index");
	}

	
}
?>