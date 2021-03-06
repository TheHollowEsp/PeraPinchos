<?php
require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__ . "/../model/Jurado.php");
require_once (__DIR__ . "/../model/JuradoMapper.php");

require_once (__DIR__ . "/../model/Pincho.php");
require_once (__DIR__ . "/../model/PinchoMapper.php");

require_once (__DIR__ . "/../controller/BaseController.php");

ini_set('display_errors', 'On');

class JuradoController extends BaseController {

	private $JuradoMapper;
	private $PinchoMapper;

	public function __construct() {
		parent::__construct();

		$this -> JuradoMapper = new JuradoMapper();
		$this -> PinchoMapper = new PinchoMapper();
		//$this -> view -> setLayout("organizador");
		//pendiente de cambio
	}

	public function HomeJurado(){
		$this -> view -> render("jurado", "inicioJurado");
	}
	
	/**
	 * Se llama a esta funcion con un GET para obtener el formulario
	 * Se llama a esta funcion con un POST para intentar registrar al Jurado
	 * Los datos que se esperan son dniJurado y nombreJurado
	 */
	public function registrarNewJurado() {
		$jurado = new Jurado();

		if (isset($_POST["DniJur"])) {
			$jurado -> setDniJurado($_POST["DniJur"]);
			$jurado -> setNombreJurado($_POST["Nombre"]);
			$jurado -> setPasswordJurado($_POST["PasswordJ"]);
			$jurado -> setIsProfesional(0);

			try {
				$jurado -> checkIsValidForRegisterJurado();
				if (!$this -> JuradoMapper -> juradoExistsByDNI($_POST["DniJur"])) {
					$this -> JuradoMapper -> save($jurado);
					//$this->view->setFlash("dniJurado ".$jurado->getNombreJurado()." successfully added. Please login now");
					$this -> view -> redirect("users", "login");
					//falta cambiar

				} else {
					$errors = array();
					$errors["dniJurado"] = "Ya existe un jurado con ese mismo DNI";
					$this -> view -> setVariable("errors", $errors);
				}
			} catch(ValidationException $ex) {
				$errors = $ex -> getErrors();
				$this -> view -> setVariable("errors", $errors);
			}
		}
		$this -> view -> setVariable("jurado", $jurado);
		//falta cambiar
		$this -> view -> render("jurado", "registroJurado");
		//falta cambiar
	}

	public function registrarJuradoProfesional() {
		$jurado = new Jurado();

		if (isset($_POST["DniJur"])) {
			$jurado -> setDniJurado($_POST["DniJur"]);
			$jurado -> setNombreJurado($_POST["Nombre"]);
			$jurado -> setPasswordJurado($_POST["PasswordJ"]);
			$jurado -> setIsProfesional(1);

			try {
				$jurado -> checkIsValidForRegisterJurado();
				if (!$this -> JuradoMapper -> juradoExistsByDNI($_POST["DniJur"])) {
					$this -> JuradoMapper -> save($jurado);
					//$this->view->setFlash("dniJurado ".$jurado->getNombreJurado()." successfully added. Please login now");
					$this -> view -> render("organizador", "inicioOrganizador");
					//falta cambiar

				} else {
					$errors = array();
					$errors["dniJurado"] = "Ya existe un jurado con ese mismo DNI";
					$this -> view -> setVariable("errors", $errors);
				}
			} catch(ValidationException $ex) {
				$errors = $ex -> getErrors();
				$this -> view -> setVariable("errors", $errors);
			}
		}else{
		$this -> view -> setVariable("jurado", $jurado);
		
		$this -> view -> render("jurado", "registroJuradoProfesional");
		}
	}

	/**
	 * Se llama a esta funcion solo con un GET para obtener la lista de elementos de la tabla Jurado
	 */
	public function listar() {
		//Esta funcion solo la puede hacer el organizador, hay que poner al inicio de todo una comprobacion
		//de sesion, falta cambiar
		$juradoL = $this -> JuradoMapper -> findAll();
		$this -> view -> setVariable("jurado", $juradoL);
		//falta agregar la vista, no se continuar
		$this -> view -> render("jurado", "listar");
		//falta cambiar
	}

	public function listarParaUnir() {
		//Esta funcion solo la puede hacer el organizador, hay que poner al inicio de todo una comprobacion
		//de sesion, falta cambiar
		$_SESSION["nomCon"] = $_GET["NombreCon"];
		$juradoL = $this -> JuradoMapper -> findAllPro();

		$this -> view -> setVariable("jurado", $juradoL);
		//falta agregar la vista, no se continuar
		$this -> view -> render("jurado", "listarUnir");
		//falta cambiar
	}

	/**
	 * Se llama a esta funcion solo con un GET para obtener la información especifica
	 * de un unico elemento de la tabla Jurado
	 * El dato que se espera es dniJurado
	 */
	public function unir() {

		$juradodni = $_GET["dniJurado"];
		$jurado = $this -> JuradoMapper -> findByDNI($juradodni);

		$this -> JuradoMapper -> unir($juradodni, $_SESSION["nomCon"]);
		$this -> view -> setFlash("Unido correctamente en el concurso");
		$this -> view -> render("organizador", "inicioOrganizador");

	}

	public function consultar() {
		if (!isset($_GET["dniJurado"])) {
			throw new Exception("Es obligatorio proporcionar el DNI");
		}
		$juradodni = $_GET["dniJurado"];
		$jurado = $this -> JuradoMapper -> findByDNI($juradodni);

		if ($jurado == NULL) {
			throw new Exception("No existe ningun jurado con DNI: " . $juradodni);
		}
		$this -> view -> setVariable("jurado", $jurado);
		//falta cambiar
		$this -> view -> render("jurado", "consultar");
		//falta cambiar

	}

	/**
	 * Se llama a esta funcion con un GET para obtener la informacion del elemento que se desea borrar
	 * Se llama a esta funcion con un POST para borrar el elemento si todo es correcto
	 * El dato que se espera es dniJurado
	 */
	public function eliminar() {
		
		
		$juradodni = $_GET["dniJurado"];
		
		$this -> JuradoMapper -> delete($juradodni);

		
		$this -> view -> redirect("jurado", "listar");
		//falta cambiar
	}

	public function inicio() {
		$this -> view -> redirect("jurado", "inicioJurado");
	}

	public function listarParaUnirP() {
		//Esta funcion solo la puede hacer el organizador, hay que poner al inicio de todo una comprobacion
		//de sesion, falta cambiar
		$juradoL = $this -> JuradoMapper -> findAllPro();

		$this -> view -> setVariable("jurado", $juradoL);
		//falta agregar la vista, no se continuar
		$this -> view -> render("jurado", "listarParaPincho");
		//falta cambiar
	}

	public function listaAsignarPincho() {
		$_SESSION["dnij"] = $_GET["dniJurado"];
		$pinchoL = $this -> PinchoMapper -> findAll();

		$this -> view -> setVariable("pinchos", $pinchoL);
		//falta agregar la vista, no se continuar
		$this -> view -> render("pinchos", "listaPUnirJ");
		//falta cambiar
	}
	
		public function asignarAzar(){
		$_SESSION["dnij"] = $_GET["dniJurado"];
		$aux = $this->PinchoMapper->countP();
		if($_POST["numPinchos"] >$aux){
			$juradoL = $this -> JuradoMapper -> findAllPro();

			$this -> view -> setVariable("jurado", $juradoL);
			$this -> view -> render("jurado", "listarParaPincho");
		}else{
		$this->PinchoMapper->unirAzarP($_POST["numPinchos"], $_GET["dniJurado"]);
	 	$this->view->render("organizador", "inicioOrganizador");
		}
	}

}
?>