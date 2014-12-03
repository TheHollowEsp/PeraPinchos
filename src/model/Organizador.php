<?php
// file: model/Jurado.php

require_once (__DIR__ . "/../core/ValidationException.php");

class Organizador {
	var $DniOrg;
	var $NombreOrg;
	var $Telefono;
	var $Email;
	
	public function __construct($DniOrg=NULL, $NombreOrg=NULL, $Telefono=NULL,$Email=NULL) {
		$this -> DniOrg = $DniOrg;
		$this -> NombreOrg = $NombreOrg;
		$this -> Telefono = $Telefono;
		$this -> Email = $Email;
	}
	
	public function getDniOrg() {
		return $this -> DniOrg;
	}
	
	public function setDniOrg($DniOrg) {
		$this -> DniOrg = $DniOrg;
	}
	
	public function NombreOrg() {
		return $this -> NombreOrg;
	}
	
	public function setNombreOrg($NombreOrg) {
		$this -> NombreOrg = $NombreOrg;
	}
	
	public function getTelefono() {
		return $this -> Telefono;
	}
	
	public function setTelefono($Telefono) {
		$this -> Telefono = $Telefono;
	}
	
	public function getEmail() {
		return $this -> Email;
	}
	
	public function setEmail($Email) {
		$this -> Email = $Email;
	}
	
	public function __toString() {
		return "ConcursoBean:
			 Dni = $this->DniOrg," . "
			 Nombre = $this->NombreOrg," . "
			 Telefono = $this->Telefono," . "
			 Email = $this->Email, ";
	}
	
	/**
	 * Revisa que el concurso sea valido para insercion
	 *
	 * @throws ValidationException if the instance is
	 * not valid
	 * @return void
	 */
	public function checkIsValidForCreate() {
		$errors = array();
		if (strlen(trim($this -> DniOrg)) == 0) {
			$errors["DniOrg"] = "El DNI es obligatorio";
		}
		if (strlen(trim($this -> NombreOrg)) == 0) {
			$errors["Nombre"] = "El nombre es obligatorio";
		}
		if (strlen(trim($this -> Telefono)) == 0) {
			$errors["Telefono"] = "Tienes que indicar un telefono";
		}
		if (strlen(trim($this -> Email)) == 0) {
			$errors["Email"] = "Debes indicar el correo electronico";
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "Concurso no valido");
		}
	}
	
	/**
	 * Revisa que el pincho sea valido para update
	 *
	 * @throws ValidationException if the instance is
	 * not valid
	 *
	 * @return void
	 */
	public function checkIsValidForUpdate() {
		$errors = array();
	
		if (!isset($this -> DniOrg)) {
			$errors["Dni"] = "Es obligatorio tener un Dni";
		}
	
		try {
			$this -> checkIsValidForCreate();
		} catch(ValidationException $ex) {
			foreach ($ex->getErrors() as $key => $error) {
				$errors[$key] = $error;
			}
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "Organizador no valido");
		}
	}
	
}
	
?>

