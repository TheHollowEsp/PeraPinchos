<?php
require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__."/../model/Establecimiento.php");
require_once (__DIR__."/../model/EstablecimientoMapper.php");

require_once (__DIR__ . "/../controller/BaseController.php");

ini_set('display_errors', 'On');

class EstablecimientoController extends BaseController {

	private $EstablecimientoMapper;

	public function __construct() {
		parent::__construct();
		
		$this -> EstablecimientoMapper = new EstablecimientoMapper();
		$this -> view -> setLayout("welcome");
	}
	
	public function registrarEstablecimiento(){
		$establecimiento = new Establecimiento();
    
		if (isset($_POST["NombreEst"])){
		$establecimiento->setNombreEst($_POST["NombreEst"]);
		$establecimiento->setDireccion($_POST["Direccion"]);
		$establecimiento->setHorario($_POST["Horario"]);
		$establecimiento->setFotos($_POST["Fotos"]);
		$establecimiento->setWeb($_POST["Web"]);
		$establecimiento->setPasswordE($_POST["PasswordE"]);
      
		try{
		$establecimiento->checkIsValidForRegisterEstablecimiento();
	  //if (!$this->JuradoMapper->juradoExistsByDNI($_POST["DniJur"])){
		if (!$this->EstablecimientoMapper->establecimientoExists($_POST["NombreEst"])){
		$this->EstablecimientoMapper->save($establecimiento);
		$this->view->setFlash("NombreEst ".$establecimiento->setNombreEst()." successfully added. Please login now");
		$this->view->redirect("users", "login");//falta cambiar
	  
		} else {
			$errors = array();
			$errors["NombreEst"] = "Ya existe un establecimiento con ese mismo nombre";
			$this->view->setVariable("errors", $errors);
		}
		}catch(ValidationException $ex) {
		$errors = $ex->getErrors();
		$this->view->setVariable("errors", $errors);
		}
    }
    $this->view->setVariable("establecimiento", $establecimiento);//falta cambiar
    $this->view->render("establecimiento", "registroEstablecimiento");//falta cambiar
	}
	
	// public function proponerPincho(){
// 		
	// }
}
?>