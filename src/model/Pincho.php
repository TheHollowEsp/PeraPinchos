<?php
// file: model/Pincho.php

require_once (__DIR__ . "/../core/ValidationException.php");

ini_set('display_errors', 'On');

class Pincho {

	private $NombrePincho;
	private $Descripcion;
	private $Precio;
	private $Ingredientes;
	private $Fotos;
	private $Informacion;
	private $Validado;
	private $Establecimiento_NombreEst;
	//Poner la lista en el constructor luego.

	public function __construct($nombrePincho = NULL, $Descripcion = NULL, $Precio = NULL, $Ingredientes = NULL, $Fotos = NULL, $Informacion = NULL, $Validado = NULL, $Establecimiento_NombreEst_NombreEst = NULL) {
		$this -> nombrePincho = $nombrePincho;
		$this -> Descripcion = $Descripcion;
		$this -> Precio = $Precio;
		$this -> Ingredientes = $Ingredientes;
		$this -> Fotos = $Fotos;
		$this -> Informacion = $Informacion;
		$this -> Validado = $Validado;
		$this -> Establecimiento_NombreEst = $Establecimiento_NombreEst;
	}

	public function getNombrePincho() {
		return $this -> nombrePincho;
	}

	public function setNombrePincho($nombrePincho) {
		$this -> nombrePincho = $nombrePincho;
	}

	public function getDescripcionPincho() {
		return $this -> Descripcion;
	}

	public function setDescripcionPincho($Descripcion) {
		$this -> Descripcion = $Descripcion;
	}

	public function getPrecioPincho() {
		return $this -> Precio;
	}

	public function setPrecioPincho($Precio) {
		$this -> precioPincho = $Precio;
	}

	public function getIngredientesPincho() {
		return $this -> Ingredientes;
	}

	public function setIngredientesPincho($Ingredientes) {
		$this -> Ingredientes = $Ingredientes;
	}

	public function getFotosPincho() {
		return $this -> Fotos;
	}

	public function setFotosPincho($Fotos) {
		$this -> Fotos = $Fotos;
	}

	public function getInfoPincho() {
		return $this -> Informacion;
	}

	public function setInfoPincho($Informacion) {
		$this -> Informacion = $Informacion;
	}

	public function getIsValidado() {
		return $this -> Validado;
	}

	public function setIsValidado($Validado) {
		$this -> Validado = $Validado;
	}

	public function getEstablecimiento() {
		return $this -> Establecimiento_NombreEst;
	}

	public function setEstablecimiento($Establecimiento_NombreEst) {
		$this -> Establecimiento_NombreEst = $Establecimiento_NombreEst;
	}

	public function __toString() {
		return "PinchoBean: nombre = $this->nombrePincho," . "descripcion = $this->Descripcion," . "precio = $this->Precio," . "ingredientes = $this->Ingredientes, " . "fotos = $this->Fotos, " . "info = $this->Informacion, " . "Validado = $this->Validado";
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
		if (strlen(trim($this -> Precio)) == 0) {
			$errors["Precio"] = "El precio es obligatorio";
		}
		if (strlen(trim($this -> Ingredientes)) == 0) {
			$errors["Ingredientes"] = "Es necesario el listado de ingredientes";
		}
		if (strlen(trim($this -> Fotos)) == 0) {
			$errors["Fotos"] = "Es obligatorio que tenga foto";
		}
		if (strlen(trim($this -> Descripcion)) == 0) {
			$errors["Descripcion"] = "La descrpcion no puede estar vacia";
		}
		if (strlen(trim($this -> Informacion)) == 0) {
			$errors["Informacion"] = "La informacion adicional no puede estar vacia";
		}
		if (strlen(trim($this -> Validado)) > 1) {
			$errors["Validado"] = "Error en estatus de validacion";
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
