<?php
require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__ . "/../model/Pincho.php");
require_once (__DIR__ . "/../model/PinchoMapper.php");
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

	public function __construct() {
		parent::__construct();

		$this -> pinchoMapper = new PinchoMapper();

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
	public function listarParaJurado(){

	}

	public function consultar() {
		if (!isset($_GET["nombrePincho"])) {
			throw new Exception("nombrePincho es obligatorio");
		}
		$pinchoid = $_GET["nombrePincho"];

		// Busca el pincho en la DB
		$pincho = $this -> pinchoMapper -> findById($pinchoid);

		if ($pincho == NULL) {
			throw new Exception("No existe el pincho: " . $pinchoid);
		}

		// Manda el objeto pincho a la vista
		$this -> view -> setVariable("pincho", $pincho);

		// renderiza la vista (/view/pinchos/consultar.php)
		$this -> view -> render("pinchos", "consultar");

	}

	//FIXME: En proceso
	public function valorar() {
		if (!isset($_GET["nombrePincho"])) {
			throw new Exception("nombrePincho es obligatorio");
		}
		//FIXME: login y comprobaciones
		/*if (!isset($this -> currentUser)) {
			throw new Exception("Not in session. Editing posts requires login");
		}*/

		// Busca el pincho en la DB
		$pinchoid = $_GET["nombrePincho"];
		$pincho = $this -> pinchoMapper -> findById($pinchoid);

		if ($pincho == NULL) {
			throw new Exception("No existe el pincho: " . $pinchoid);
		}

		// FIXME: Comprobar que el usuario en sesion pueda valorar
		if ($post -> getAuthor() != $this -> currentUser) {
			throw new Exception("logged user is not the author of the post id " . $postid);
		}
		/* FIXME: Cuando el login este listo continuo
		if (isset($_POST["submit"])) {// reaching via HTTP Post...

			// populate the Post object with data form the form
			$post -> setTitle($_POST["title"]);
			$post -> setContent($_POST["content"]);

			try {
				// validate Post object
				$post -> checkIsValidForUpdate();
				// if it fails, ValidationException

				// update the Post object in the database
				$this -> postMapper -> update($post);

				// POST-REDIRECT-GET
				// Everything OK
				$this -> view -> setFlash(sprintf(i18n("Post \"%s\" successfully updated."), $post -> getTitle()));

				// header("Location: index.php?controller=posts&action=index")
				// die();
				$this -> view -> redirect("posts", "index");

			} catch(ValidationException $ex) {
				// Get the errors array inside the exepction...
				$errors = $ex -> getErrors();
				// And put it to the view as "errors" variable
				$this -> view -> setVariable("errors", $errors);
			}
		}
		// Put the Post object visible to the view
		$this -> view -> setVariable("post", $post);
		// render the view (/view/posts/add.php)
		$this -> view -> render("posts", "edit");
		*/
	}

}
?>
