<?php
// file: model/Pincho.php

require_once (__DIR__ . "/../core/ValidationException.php");

ini_set('display_errors', 'On');

class Pincho {

	private $nombrePincho;
	private $descripcionPincho;
	private $precioPincho;
	private $ingredientesPincho;
	private $fotosPincho;
	private $infoPincho;
	private $isValidado;
	private $establecimiento;
	//Poner la lista en el constructor luego.

	public function __construct($nombrePincho = NULL, $descripcionPincho = NULL, $precioPincho = NULL, $ingredientesPincho = NULL, $fotosPincho = NULL, $infoPincho = NULL, $isValidado = NULL, $establecimiento = NULL) {
		$this -> nombrePincho = $nombrePincho;
		$this -> descripcionPincho = $descripcionPincho;
		$this -> precioPincho = $precioPincho;
		$this -> ingredientesPincho = $ingredientesPincho;
		$this -> fotosPincho = $fotosPincho;
		$this -> infoPincho = $infoPincho;
		$this -> isValidado = $isValidado;
		$this -> establecimiento = $establecimiento;
	}

	public function getNombrePincho() {
		return $this -> nombrePincho;
	}

	public function setNombrePincho($nombrePincho) {
		$this -> nombrePincho = $nombrePincho;
	}

	public function getDescripcionPincho() {
		return $this -> descripcionPincho;
	}

	public function setDescripcionPincho($descripcionPincho) {
		$this -> descripcionPincho = $descripcionPincho;
	}

	public function getPrecioPincho() {
		return $this -> precioPincho;
	}

	public function setPrecioPincho($precioPincho) {
		$this -> precioPincho = $precioPincho;
	}

	public function getIngredientesPincho() {
		return $this -> ingredientesPincho;
	}

	public function setIngredientesPincho($ingredientesPincho) {
		$this -> ingredientesPincho = $ingredientesPincho;
	}

	public function getFotosPincho() {
		return $this -> fotosPincho;
	}

	public function setFotosPincho($fotosPincho) {
		$this -> fotosPincho = $fotosPincho;
	}

	public function getInfoPincho() {
		return $this -> infoPincho;
	}

	public function setInfoPincho($infoPincho) {
		$this -> infoPincho = $infoPincho;
	}

	public function getIsValidado() {
		return $this -> isValidado;
	}

	public function setIsValidado($isValidado) {
		$this -> isValidado = $isValidado;
	}

	public function getEstablecimiento() {
		return $this -> establecimiento;
	}

	public function setEstablecimiento($establecimiento) {
		$this -> establecimiento = $establecimiento;
	}

	public function __toString() {
		return "UsuarioBean: nombre = $this->nombrePincho," . "descripcion = $this->descripcionPincho," . "precio = $this->precioPincho," . "ingredientes = $this->ingredientesPincho, " . "fotos = $this->fotosPincho, " . "info = $this->infoPincho, " . "isValidado = $this->isValidado";
	}

	/**
	 * Revisa que el pincho sea valido para insercion
	 *
	 * @throws ValidationException if the instance is
	 * not valid
	 * @return void
	 */
	public function checkIsValidForCreate() {
		$errors = array();
		if (strlen(trim($this -> nombrePincho)) == 0) {
			$errors["nombrePincho"] = "El titulo es obligatorio";
		}
		if (strlen(trim($this -> precioPincho)) == 0) {
			$errors["precioPincho"] = "El precio es obligatorio";
		}
		if (strlen(trim($this -> ingredientesPincho)) == 0) {
			$errors["ingredientesPincho"] = "Es necesario el listado de ingredientes";
		}
		if (strlen(trim($this -> fotosPincho)) == 0) {
			$errors["fotosPincho"] = "Es obligatorio que tenga foto";
		}
		if (strlen(trim($this -> descripcionPincho)) == 0) {
			$errors["descripcionPincho"] = "La descrpcion no puede estar vacia";
		}
		if (strlen(trim($this -> infoPincho)) == 0) {
			$errors["infoPincho"] = "La informacion adicional no puede estar vacia";
		}
		if (strlen(trim($this -> isValidado)) > 1) {
			$errors["isValidado"] = "Error en estatus de validacion";
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "Pincho no valido");
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

		if (!isset($this -> nombrePincho)) {
			$errors["nombrePinchoUpdate"] = "Es obligatorio que tenga nombre";
		}

		try {
			$this -> checkIsValidForCreate();
		} catch(ValidationException $ex) {
			foreach ($ex->getErrors() as $key => $error) {
				$errors[$key] = $error;
			}
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "Pincho no valido");
		}
	}

}
