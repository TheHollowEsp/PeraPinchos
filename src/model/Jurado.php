<?php
// file: model/Jurado.php

require_once (__DIR__ . "/../core/ValidationException.php");

class Jurado {
	var $dniJurado;
	var $nombreJurado;
	var $isJuradoP;
	var $passJurado;
	
	public function __construct($dniJurado=NULL, $nombreJurado=NULL, $isJuradoP=NULL, $passJurado=NULL) {
		$this -> dniJurado = $dniJurado;
		$this -> nombreJurado = $nombreJurado;
		$this -> isJuradoP = $isJuradoP;
		$this -> passJurado = $passJurado;
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
	
	public function getPasswordJurado() {
		return $this->passJurado;
	}
	
	public function setPasswordJurado($passJurado) {
		$this->passJurado = $passJurado;
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
			 ", Password: ".$this->passJurado.
			 ", Profesional: ".$this->isJuradoP;
	}
	
	//revisa si el elemento jurado a troducir es correcto
	public function checkIsValidForRegisterJurado() {
		$errors = array();
		//if (strlen(trim($this -> dniJurado)) == 0) {
		if (strlen($this->dniJurado) != 9) {
			$errors["dniJurado"] = "El DNI introducido tiene una longitud invalida";
		}
		if(strlen($this->passJurado) == 0){
			$errors["passJurado"] = "La contraseña introducida tiene una longitud invalida";
		}
		
		if (strlen(trim($this -> nombreJurado)) == 0) {
			$errors["nombreJurado"] = "El Nombre del Jurado es obligatorio";
		}
		if (sizeof($errors)>0){
			throw new ValidationException($errors, "Jurado no valido");
		}
  } 
}
?>