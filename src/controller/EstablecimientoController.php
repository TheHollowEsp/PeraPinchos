<?php

require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__ . "/../model/Establecimiento.php");
require_once (__DIR__ . "/../model/EstablecimientoMapper.php");

require_once (__DIR__ . "/../controller/BaseController.php");

/**
 * Class EstablecimientoController
 *
 * Coontrola el registro de establecimientos y pinchos
 *
 * @author hrlopez
 */
 //TODO: Conseguir registrar a un usuario como establecimiento
 //TODO: Pensar en un modo de llamar al pinchoscontroller o sus subfunciones para instanciar un pincho
class EstablecimientoController extends BaseController {

	private $establecimientoMapper;

	public function __construct() {
		parent::__construct();
		$this -> $establecimientoMapper = new EstablecimientoMapper();
		$this -> view -> setLayout("welcome");
	}
	
	public function registrarEstablecimiento(){
		
	}
	
	public function proponerPincho(){
		
	}
}
