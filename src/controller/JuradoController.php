<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");

require_once(__DIR__."/../controller/BaseController.php");

ini_set('display_errors', 'On');

class JuradoProfesionalController extends BaseController {

	private $JuradoMapper;    
  
	public function __construct() {
		parent::__construct();
    
		$this->JuradoMapper = new JuradoMapper();
		$this->view->setLayout("welcome"); //pendiente de cambio
  }
  	/**
	* Se llama a esta funcion con un GET para obtener el formulario
	* Se llama a esta funcion con un POST para intentar registrar al Jurado
	* Los datos que se esperan son dniJurado y nombreJurado
	*/
	public function registrarNewJurado() {
		$jurado = new Jurado();
    
		if (isset($_POST["dniJurado"])){
		$jurado->setDniJurado($_POST["dniJurado"]);
		$jurado->setNombreJurado($_POST["nombreJurado"]);
      
		try{
		$jurado->checkIsValidForRegisterJurado();
		if (!$this->JuradoMapper->juradoExistsByDNI($_POST["dniJurado"])){
		$this->JuradoMapper->save($jurado);
		$this->view->setFlash("dniJurado ".$jurado->getNombreJurado()." successfully added. Please login now");
		$this->view->redirect("users", "login");//falta cambiar
	  
		} else {
			$errors = array();
			$errors["dniJurado"] = "Ya existe un jurado con ese mismo DNI";
			$this->view->setVariable("errors", $errors);
		}
		}catch(ValidationException $ex) {
		$errors = $ex->getErrors();
		$this->view->setVariable("errors", $errors);
		}
    }
    $this->view->setVariable("jurado", $jurado);//falta cambiar
    $this->view->render("users", "register");//falta cambiar
  }
  
    /**
	* Se llama a esta funcion solo con un GET para obtener la lista de elementos de la tabla Jurado
	*/
    public function listar() {
	//Esta funcion solo la puede hacer el organizador, hay que poner al inicio de todo una comprobacion
	//de sesion, falta cambiar
		$juradoL = $this->JuradoMapper->findAll();
		if(!juradoL == NULL){
		foreach ($juradoL as $jurado) {
			$juradoT = $this->Jurado->__toString();//no se si esta bien
			//falta agregar la vista, no se continuar
		}
		}else{
			throw new Exception("No existe ningun elemento en la tablar Jurado para listar");
		}
		$this->view->render("posts", "view");//falta cambiar
  }
  	/**
	* Se llama a esta funcion solo con un GET para obtener la información especifica
	* de un unico elemento de la tabla Jurado
	* El dato que se espera es dniJurado
	*/
    public function consultar() {
		if (!isset($_GET["dniJurado"])) {
		throw new Exception("Es obligatorio proporcionar el DNI");
		}
		$juradodni = $_GET["dniJurado"];
		$jurado = $this->JuradoMapper->findByDNI($juradodni);
    
		if ($jurado == NULL) {
		throw new Exception("No existe ningun jurado con DNI: ".$juradodni);
		}
		$this->view->setVariable("post", $jurado);//falta cambiar
		$this->view->render("posts", "view");//falta cambiar
   
  }
  	/**
	* Se llama a esta funcion con un GET para obtener la informacion del elemento que se desea borrar
	* Se llama a esta funcion con un POST para borrar el elemento si todo es correcto
	* El dato que se espera es dniJurado
	*/
    public function eliminar() {
		if (!isset($_POST["dniJurado"])) {
			throw new Exception("Es obligatorio proporcionar el DNI del jurado a eliminar");
		}
		$juradodni = $_REQUEST["dniJurado"];
		$jurado = $this->JuradoMapper->findByDNI($juradodni);
		if ($jurado == NULL) {
			throw new Exception("No existe el jurado con el DNI: ".$juradodni);
		}  
    
    // habria que comprobar, por temas de seguridad, que fuese el organizador el que 
	// elimina, sino, quitar este if
		if ($jurado->getAuthor() != $this->currentUser) {
			throw new Exception("Post author is not the logged user");
		}// falta cmabiar todo este if
    
		$this->JuradoMapper->delete($jurado);

		$this->view->setFlash("jurado \"".$jurado ->getNombreJurado()."\" eliminado correctamente.");    
		$this->view->redirect("posts", "index");//falta cambiar
  }
}
?>