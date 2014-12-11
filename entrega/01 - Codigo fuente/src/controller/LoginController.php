 
 <?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");

require_once(__DIR__."/../model/Organizador.php");
require_once(__DIR__."/../model/OrganizadorMapper.php");

require_once(__DIR__."/../model/Establecimiento.php");
require_once(__DIR__."/../model/EstablecimientoMapper.php");

require_once(__DIR__."/../model/Jurado.php");
require_once(__DIR__."/../model/JuradoMapper.php");

require_once(__DIR__."/../controller/BaseController.php");

/**
 * Class UsersController
 * 
 * Controller to login, logout and user registration
 * 
 * @author lipido <lipido@gmail.com>
 */
class LoginController extends BaseController {
  
  private $JuradoMapper;
  private $OrganizadorMapper;
  private $EstablecimientoMapper;
  
	public function __construct() {
		parent::__construct();
    
		$this->JuradoMapper = new JuradoMapper();
		$this->OrganizadorMapper = new OrganizadorMapper();
		$this->EstablecimientoMapper = new EstablecimientoMapper();
		$this->view->setLayout("welcome"); //pendiente de cambio
  }
 
 public function loginL() {
    if (isset($_POST["username"])){ // reaching via HTTP Post...
	//process login form
	$tipo = $_POST["Tipo"];
	if(strcmp($tipo, "Establecimiento") == 0){
		 if ($this->EstablecimientoMapper->isValidUser($_POST["username"], $_POST["passwd"])) {
			$_SESSION["currentuser"]=$_POST["username"];
			// send user to the restricted area (HTTP 302 code)
			$this->view->render("establecimiento", "inicioEstablecimiento");//falta redireccion
		}else{
			$errors = array();
			$errors["general"] = "Usuario no valido";
			$this->view->setVariable("errors", $errors);
			$this->view->redirect("users", "login");//falta redireccion
			}
	}
	if(strcmp($tipo, "Organizador") == 0){
		if ($this->OrganizadorMapper->isValidUser($_POST["username"], $_POST["passwd"])) {
			$_SESSION["currentuser"]=$_POST["username"];
			// send user to the restricted area (HTTP 302 code)
			$this->view->render("organizador", "inicioOrganizador");//falta redireccion
		}else{
			$errors = array();
			$errors["general"] = "Usuario no valido";
			$this->view->setVariable("errors", $errors);
			 $this->view->redirect("users", "login");//falta redireccion
			}
	}
	if(strcmp($tipo, "Jurado") == 0){
		if ($this->JuradoMapper->isValidUser($_POST["username"], $_POST["passwd"])) {
			$_SESSION["currentuser"]=$_POST["username"];
			// send user to the restricted area (HTTP 302 code)
			$this->view->render("jurado", "inicioJurado");//falta redireccion
		}else{
			$errors = array();
			$errors["general"] = "Usuario no valido";
			$this->view->setVariable("errors", $errors);
		  	 $this->view->redirect("users", "login");//falta redireccion
			}
	}
	}
	}
	}