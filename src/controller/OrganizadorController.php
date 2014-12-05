<?php
require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__ . "/../model/Pincho.php");
require_once (__DIR__ . "/../model/PinchoMapper.php");
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
	private $PinchoMapper;
	public function __construct() {
		parent::__construct();

		$this -> OrganizadorMapper = new OrganizadorMapper();
		$this -> PinchoMapper = new PinchoMapper();

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
		if (isset($_POST["DniOrg"])){
		$organizador->setDniOrg($_POST["DniOrg"]);
		$organizador->setNombreOrg($_POST["NombreOrg"]);
		$organizador->setTelefono($_POST["Telefono"]);
		$organizador->setEmail($_POST["Email"]);
		$organizador->setPasswordO($_POST["PasswordO"]);
		try{
			$organizador -> checkIsValidForCreate();
			if (!$this->OrganizadorMapper->organizadorExistsByDNI($_POST["DniOrg"])){
				$this->OrganizadorMapper->save($organizador);
			//$this->view->setFlash("Organizador creado correctamente, ya puedes loguearte");
			$this->view->redirect("users","login"); //falta cambiar
			}else{
			$errors = array();
			$errors["DniOrg"] = "Ya existe un organizador con ese mismo DNI";
			$this->view->setVariable("errors", $errors);
			}
		}catch(ValidationException $ex){
			$errors = $ex->getErrors();
			$this->view->setVariable("errors",$errors);
		}
		}
		$this->view->setVariable("organizador",$organizador);//falta cambiar
		$this->view->render("organizador","registro");//falta cambiar
	}
	
	public function listarPinchosNoValidado(){
		$pinchos = $this -> PinchoMapper -> findAllNoValidado();

		// manda el array que contiene los pinchos a la vista(view)
		$this -> view -> setVariable("pinchos", $pinchos);

		// renderiza la vista (/view/pinchos/listar.php)
		$this -> view -> render("organizador", "listar");
	}
	
	
	public function validarPincho(){
		$nombrePincho = $_GET["nombrePincho"];
		$pincho = $this -> PinchoMapper -> findById($nombrePincho);
		$pincho->setIsValidado(1);
		$this -> PinchoMapper -> update($pincho);
		$this -> view -> render("organizador", "inicioOrganizador");
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
		//$this->view->setFlash("Has sido eliminado junto con el concurso");
		$this->view->redirect("index");
	}

	
}
?>