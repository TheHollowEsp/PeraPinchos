<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/Concurso.php");
require_once(__DIR__."/../model/ConcursoMapper.php");

require_once(__DIR__."/../controller/BaseController.php");

ini_set('display_errors', 'On');

class ConcursoController extends BaseController {

	private $ConcursoController;

	public function __construct() {
		parent::__construct();

		$this->ConcursoMapper = new ConcursoMapper();
		$this->view->setLayout("welcome"); //pendiente de cambio
	}
	/**
	 * Se llama a esta funcion con un GET para obtener el formulario
	 * Se llama a esta funcion con un POST para intentar registrar al Jurado
	 * Los datos que se esperan son dniJurado y nombreJurado
	 */
	public function registrarConcurso() {
		$concurso = new Concurso();

		if (isset($_POST["NombreC"])){
			$concurso->setNombreC($_POST["NombreC"]);

			try{
				$concurso->checkIsValidForRegisterConcurso();//pendiente
				if (!$this->ConcursoMapper->ConcursoExistsByDNI($_POST["NombreC"])){
					$this->ConcursoMapper->save($concurso);
					$this->view->setFlash("NombreC".$concurso->getNombreC()."Concurso añadido correctamente");
					//$this->view->redirect("users", "login"); creo que sobra o mas bien no tiene mucho sentido aqui
					 
				} else {
					$errors = array();
					$errors["NombreC"] = "Ya existe un concurso con el mismo nombre";
					$this->view->setVariable("errors", $errors);
				}
			}catch(ValidationException $ex) {
				$errors = $ex->getErrors();
				$this->view->setVariable("errors", $errors);
			}
		}
		$this->view->setVariable("nombreC", $concurso);//falta cambiar
		$this->view->render("users", "register");//falta cambiar
	}

	/**
	 * Se llama a esta funcion solo con un GET para obtener la lista de elementos de la tabla Jurado
	 */
	public function listar() {
		$concurso = $this -> ConcursoMapper -> findAll();

		// manda el array que contiene los pinchos a la vista(view)
		$this -> view -> setVariable("concurso", $concurso);

		// renderiza la vista (/view/pinchos/listar.php)
		$this -> view -> render("concurso", "listar");
	}
	/**
	 * Se llama a esta funcion solo con un GET para obtener la información especifica
	 * de un unico elemento de la tabla Jurado
	 * El dato que se espera es dniJurado
	 */
	public function consultar() {
		if (!isset($_GET["NombreC"])) {
			throw new Exception("Escribe el nombre del concurso");
		}
		$NombreC = $_GET["NombreC"];
		$concurso = $this->ConcursoMapper->findByName($concurso);

		if ($concurso == NULL) {
			throw new Exception("No existe ningun concurso con ese nombre: ".$NombreC);
		}
		$this->view->setVariable("post", $concurso);//falta cambiar
		$this->view->render("posts", "view");//falta cambiar
		 
	}
	/**
	 * Se llama a esta funcion con un GET para obtener la informacion del elemento que se desea borrar
	 * Se llama a esta funcion con un POST para borrar el elemento si todo es correcto
	 * El dato que se espera es dniJurado
	 */
	public function eliminar() {
		if (!isset($_POST["NombreC"])) {
			throw new Exception("Es obligatorio proporcionar el nombre del concurso a eliminar");
		}
		$NombreC = $_REQUEST["NombreC"];
		$concurso = $this->ConcursoMapper->findByName($NombreC);
		if ($concurso == NULL) {
			throw new Exception("No existe el concurso con ese nombre: ".$NombreC);
		}

		// habria que comprobar, por temas de seguridad, que fuese el organizador el que
		// elimina, sino, quitar este if
		if ($concurso->getDNIOrg() != $_SESSION['login']) {
			throw new Exception("Usted no es el organizador de este concurso");
		}// falta cmabiar todo este if

		$this->ConcursoMapper->delete($concurso);

		$this->view->setFlash("Concurso \"".$concurso ->getNombreC()."\" eliminado correctamente.");
		$this->view->redirect("posts", "index");//falta cambiar
	}
}
?>