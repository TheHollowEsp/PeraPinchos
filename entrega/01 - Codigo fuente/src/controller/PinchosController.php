<?php
require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__ . "/../model/Pincho.php");
require_once (__DIR__ . "/../model/PinchoMapper.php");
require_once (__DIR__ . "/../model/Jurado.php");
require_once (__DIR__ . "/../model/JuradoMapper.php");
require_once (__DIR__ . "/../model/Establecimiento.php");

require_once (__DIR__ . "/../controller/BaseController.php");
ini_set('display_errors', 'On');
/**
 * Class PinchosController
 *
 * Controlador de Listar pinchos, listar pinchos valorables, consultar pincho, valorar pincho
 *
 * @author hrlopez
 */
class PinchosController extends BaseController {

	/**
	 * Utilizar pinchoMapper para llegar a la DB
	 * @var pinchoMapper
	 */
	private $pinchoMapper;
	private $juradoMapper;

	public function __construct() {
		parent::__construct();

		$this -> pinchoMapper = new PinchoMapper();
		$this -> juradoMapper = new JuradoMapper();

		// Users controller operates in a "welcome" layout
		// different to the "default" layout where the internal
		// menu is displayed
		$this -> view -> setLayout("welcome");
		//pendiente de cambio
	}

	//Equivalente a "listar todo"
	public function listar() {
		$pinchos = $this -> pinchoMapper -> findAll();

		// manda el array que contiene los pinchos a la vista(view)
		$this -> view -> setVariable("pinchos", $pinchos);

		// renderiza la vista (/view/pinchos/listar.php)
		$this -> view -> render("pinchos", "listar");

	}

	// TODO: Pensar en una forma de hacer el join m:n para saber cuales son
	public function listarParaJurado() {

		$jurado = $this -> juradoMapper -> findByDNI($_SESSION["currentuser"]);

		if ($jurado -> isJuradoP == "SI") {//Si es profesional le buscamos sus pinchos
			echo "Es jurado profesional!!!";
			$pinchos = $this -> pinchoMapper -> findAllForJuradoConcreto($jurado);

			// manda el array que contiene los pinchos a la vista(view)
			$this -> view -> setVariable("pinchos", $pinchos);
			// renderiza la vista (/view/pinchos/listarJuradoP.php)
			$this -> view -> render("pinchos", "listarJuradoP");
		} else {//Si no le redirigimos al listado normal
			$pinchos = $this -> pinchoMapper -> findAll();

			// manda el array que contiene los pinchos a la vista(view)
			$this -> view -> setVariable("pinchos", $pinchos);

			// renderiza la vista (/view/pinchos/listar.php)
			$this -> view -> render("pinchos", "listar");
		}
	}

	public function consultar() {
		if (!isset($_GET["nombrePincho"])) {
			throw new Exception("nombrePincho es obligatorio");
		}
		$pinchoid = $_GET["nombrePincho"];

		$isjurado = $this -> juradoMapper -> juradoExistsByDNI($_SESSION["currentuser"]);

		// Busca el pincho en la DB
		$pincho = $this -> pinchoMapper -> findById($pinchoid);

		if ($pincho == NULL) {
			throw new Exception("No existe el pincho: " . $pinchoid);
		}

		// Manda el objeto pincho a la vista
		$this -> view -> setVariable("pincho", $pincho);
		$this -> view -> setVariable("isjurado", $isjurado);
		// renderiza la vista (/view/pinchos/consultar.php)
		$this -> view -> render("pinchos", "consultar");

	}

	public function proponer() {
		$pincho = new Pincho();

		if (isset($_POST["nombre"])) {
			echo "He entrado en el seteo\n";
			$pincho -> setNombrePincho($_POST["nombre"]);
			$pincho -> setDescripcionPincho($_POST["descripcion"]);
			$pincho -> setPrecioPincho($_POST["precio"]);
			$pincho -> setIngredientesPincho($_POST["ingredientes"]);
			$pincho -> setFotosPincho($_POST["foto"]);
			$pincho -> setInfoPincho($_POST["info"]);
			$pincho -> setIsValidado(0);
			$pincho -> setEstablecimiento($_SESSION["currentuser"]);

			try {

				$pincho -> checkIsValidForCreate();
				// if it fails, ValidationException

				if (!$this -> pinchoMapper -> pinchoExists($pincho -> getNombrePincho())) {

					// save the User object into the database
					$this -> pinchoMapper -> save($pincho);

					// POST-REDIRECT-GET
					// Everything OK, we will redirect the user to the list of posts
					// We want to see a message after redirection, so we establish
					// a "flash" message (which is simply a Session variable) to be
					// get in the view after redirection.
					//$this -> view -> setFlash("Pincho " . $pincho -> getNombrePincho() . " successfully added.");

					// perform the redirection. More or less:
					// header("Location: index.php?controller=users&action=login")
					// die();
					$this -> view -> redirect("pinchos", "listar");
				} else {
					$errors = array();
					$errors["nombre"] = "El nombre ya existe";
					$this -> view -> setVariable("errors", $errors);
				}
			} catch(ValidationException $ex) {
				// Get the errors array inside the exepction...
				$errors = $ex -> getErrors();
				// And put it to the view as "errors" variable
				$this -> view -> setVariable("errors", $errors);
			}
		}

		// Put the User object visible to the view
		$this -> view -> setVariable("pincho", $pincho);

		// render the view (/view/pinchos/proponer.php)
		$this -> view -> render("pinchos", "proponer");
	}

	//FIXME: En proceso
	public function valorar() {
		if (!isset($_GET["nombrePincho"])) {
			echo "Esto peta";
			throw new Exception("nombrePincho es obligatorio");
		}
		print "Nombre del pincho: ";
		$nombre = $_GET["nombrePincho"];
		echo $nombre;
		$valoracion = $_REQUEST["valoracion"];
		print "Valoracion: ";
		echo $valoracion;
		$user = $_SESSION["currentuser"];
		$pincho = $this -> pinchoMapper -> valorarPincho($nombre,$valoracion,$user);
		$this -> view -> redirect("pinchos", "listar");
		
		

		
	}
			public function unir() {
		
		$nombrep = $_GET["nombrePincho"];
		//$jurado = $this->PinchoMapper->findById($nombrep);
    
			$this->pinchoMapper->unirP($nombrep, $_SESSION["dnij"]);
	 		$this->view->render("organizador", "inicioOrganizador");
   
  }
}
?>