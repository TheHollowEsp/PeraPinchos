<?php
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/Concurso.php");
require_once(__DIR__."/../model/ConcursoMapper.php");

require_once(__DIR__."/../controller/BaseController.php");

ini_set('display_errors', 'On');

class ConcursoController extends BaseController {

	private $ConcursoMapper;

	public function __construct() {
		parent::__construct();

		$this->ConcursoMapper = new ConcursoMapper();
		
	}
	/**
	 * Se llama a esta funcion con un GET para obtener el formulario
	 * Se llama a esta funcion con un POST para intentar registrar al Jurado
	 * Los datos que se esperan son dniJurado y nombreJurado
	 */
	public function registrarConcurso() {
		$concurso = new Concurso();
		
		if (isset($_POST["NombreCon"])){
			$concurso->setNombreCon($_POST["NombreCon"]);
			$concurso->setFechaIniCon($_POST["FechaIniCon"]);
			$concurso->setFechaFinCon($_POST["FechaFinCon"]);
			$concurso->setBasesConcurso($_POST["BasesConcurso"]);
			$concurso->setPatrocinadoresCon($_POST["PatrocinadoresCon"]);
			$concurso->setPremiosCon($_POST["PremiosCon"]);
			$concurso->setOrganizadorCon($_SESSION['currentuser']);

			try{
				$concurso->checkIsValidForCreate();
				if (!$this->ConcursoMapper->concursoExistsByName($_POST["NombreCon"])){
					$this->ConcursoMapper->save($concurso);
					//$this->view->setFlash("NombreCon".$concurso->getNombreCon()."Concurso a�adido correctamente");
					$this -> view -> render("organizador", "inicioOrganizador");
					 
				} else {
					$errors = array();
					$errors["NombreCon"] = "Ya existe un concurso con el mismo nombre";
					$this->view->setVariable("errors", $errors);
				}
			}catch(ValidationException $ex) {
				$errors = $ex->getErrors();
				$this->view->setVariable("errors", $errors);
			}
		}else{
		$this->view->setVariable("NombreCon", $concurso);//falta cambiar
		$this->view->render("concurso", "registrar");//falta cambiar
		}
	}

	/**
	 * Se llama a esta funcion solo con un GET para obtener la lista de elementos de la tabla Jurado
	 */
	public function listarParaOrganizador() {
		$concursoL = $this -> ConcursoMapper -> findAll();
		
		// manda el array que contiene los pinchos a la vista(view)
		$this -> view -> setVariable("concurso", $concursoL);

		// renderiza la vista (/view/pinchos/listar.php)
		$this -> view -> render("concurso", "listar");
		
	}
	
		public function listarParaEstablecimiento() {
		$concursoL = $this -> ConcursoMapper -> findAll();
		
		// manda el array que contiene los pinchos a la vista(view)
		$this -> view -> setVariable("concurso", $concursoL);

		// renderiza la vista (/view/pinchos/listar.php)
		$this -> view -> render("concurso", "listarParaEst");
		
	}
	/**
	 * Se llama a esta funcion solo con un GET para obtener la informaci�n especifica
	 * de un unico elemento de la tabla Jurado
	 * El dato que se espera es dniJurado
	 */
	public function consultar() {
		if (!isset($_GET["NombreCon"])) {
			throw new Exception("Escribe el nombre del concurso");
		}
		$NombreCon = $_GET["NombreCon"];
		$concurso = $this->ConcursoMapper->findByName($NombreCon);

		if ($concurso == NULL) {
			throw new Exception("No existe ningun concurso con ese nombre: ".$NombreCon);
		}
		$this->view->setVariable("concurso", $concurso);//falta cambiar
		$this->view->render("concurso", "consultar");//falta cambiar
		 
	}
	/**
	 * Se llama a esta funcion con un GET para obtener la informacion del elemento que se desea borrar
	 * Se llama a esta funcion con un POST para borrar el elemento si todo es correcto
	 * El dato que se espera es dniJurado
	 */
	
		public function eliminar() {
		
		$NombreCon = $_REQUEST["NombreCon"];
		
		$this->ConcursoMapper->delete($NombreCon);

		$this->view->setFlash("Concurso eliminado correctamente.");
		$this->view->render("organizador", "inicioOrganizador");
	}

}
?>