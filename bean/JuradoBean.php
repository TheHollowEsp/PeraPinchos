<?php


class JuradoBean {
	var $dniJurado;
	var $nombreJurado;
	var $isJuradoP;
	
	public function __construct() {
		
	}
	
	public function getDniJurado() {
		return $this->dniJurado;
	}
	
	public function setDniJurado($dniJurado) {
		$this->dniJurado = $dniJurado;
	}
	
	public function getNombreJurado() {
		return $this->nombreJurado;
	}
	
	public function setNombreJurado($nombreJurado) {
		$this->nombreJurado = $nombreJurado;
	}

	public function getIsProfesional() {
		return $this->isJuradoP;
	}
	
	public function setIsProfesional($isJuradoP) {
		$this->isJuradoP = $isJuradoP;
	}

	public function __toString() {
		return "DNI: ".$this->dniJurado.
			 ", Nombre: ".$this->nombreJurado.
			 ", Profesional: ".$this->isJuradoP;
	}
}
?>