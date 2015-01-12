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
	private $Cif;
	private $NombreCon;
	//Poner la lista en el constructor luego.

	public function __construct($NombrePincho = NULL, $Descripcion = NULL, $Precio = NULL, $Ingredientes = NULL, $Fotos = NULL, $Informacion = NULL, $Validado = NULL, $Cif = NULL, $NombreCon = NULL) {
		$this -> NombrePincho = $NombrePincho;
		$this -> Descripcion = $Descripcion;
		$this -> Precio = $Precio;
		$this -> Ingredientes = $Ingredientes;
		$this -> Fotos = $Fotos;
		$this -> Informacion = $Informacion;
		$this -> Validado = $Validado;
		$this -> Cif = $Cif;
		$this -> NombreCon = $NombreCon;
	}

	public function getNombrePincho() {
		return $this -> NombrePincho;
	}

	public function setNombrePincho($NombrePincho) {
		$this -> NombrePincho = $NombrePincho;
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
		$this -> Precio = $Precio;
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
		return $this -> Cif;
	}

	public function setEstablecimiento($Cif) {
		$this -> Cif = $Cif;
	}
	
	public function getNombreCon() {
		return $this -> NombreCon;
	}

	public function setNombreCon($NombreCon) {
		$this -> NombreCon = $NombreCon;
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
		if (strlen(trim($this -> NombrePincho)) == 0) {
			$errors["nombrePincho"] = "El titulo es obligatorio";
			echo "El titulo es obligatorio\n";
		}
		if ($this -> Precio <= 0) {
			$errors["Precio"] = "El precio es obligatorio";
			echo "El precio es obligatorio\n";
			echo $this -> Precio;
			echo "El precio es obligatorio\n";
		}
		if (strlen(trim($this -> Ingredientes)) == 0) {
			$errors["Ingredientes"] = "Es necesario el listado de ingredientes";
			echo "El ingrediente es obligatorio\n";
		}
		if (strlen(trim($this -> Fotos)) == 0) {
			$errors["Fotos"] = "Es obligatorio que tenga foto";
			echo "El foto es obligatorio\n";
		}
		if (strlen(trim($this -> Descripcion)) == 0) {
			$errors["Descripcion"] = "La descripcion no puede estar vacia";
			echo "El descripcion es obligatorio\n";
		}
		if (strlen(trim($this -> Informacion)) == 0) {
			$errors["Informacion"] = "La informacion adicional no puede estar vacia";
			echo "El info es obligatorio\n";
		}
		/*if (strlen(trim($this -> Validado)) > 1) {
		 $errors["Validado"] = "Error en estatus de validacion";
		 echo "Te has colao\n";
		 }*/
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
