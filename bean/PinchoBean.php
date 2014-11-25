<?php
class PinchoBean {
	var $nombrePincho;
	var $descripcionPincho;
	var $precioPincho;
	var $ingredientesPincho;
	var $fotosPincho;
	var $infoPincho;
	var $isValidado;
	
	public function __construct() {
	}
	public function getNombrePincho() {
		return $this->nombrePincho;
	}
	public function setNombrePincho($nombrePincho) {
		$this->nombrePincho = $nombrePincho;
	}
	public function getDescripcionPincho() {
		return $this->descripcionPincho;
	}
	public function setDescripcionPincho($descripcionPincho) {
		$this->descripcionPincho = $descripcionPincho;
	}
	public function getPrecioPincho() {
		return $this->precioPincho;
	}
	public function setPrecioPincho($precioPincho) {
		$this->precioPincho = $precioPincho;
	}
	public function getIngredientesPincho() {
		return $this->ingredientesPincho;
	}
	public function setIngredientesPincho($ingredientesPincho) {
		$this->ingredientesPincho = $ingredientesPincho;
	}
	public function getFotosPincho() {
		return $this->fotosPincho;
	}
	public function setFotosPincho($fotosPincho) {
		$this->fotosPincho = $fotosPincho;
	}
	public function getInfoPincho() {
		return $this->infoPincho;
	}
	public function setInfoPincho($infoPincho) {
		$this->infoPincho = $infoPincho;
	}
	public function getIsValidado() {
		return $this->isValidado;
	}
	public function setIsValidado($isValidado) {
		$this->isValidado = $isValidado;
	}
	public function __toString() {
		return "UsuarioBean: nombre = $this->nombrePincho," . "descripcion = $this->descripcionPincho," . "precio = $this->precioPincho," . "ingredientes = $this->ingredientesPincho, " . "fotos = $this->fotosPincho, " . "info = $this->infoPincho, " . "isValidado = $this->isValidado";
	}
}

?>