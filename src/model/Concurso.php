<?php
// file: model/Jurado.php

require_once (__DIR__ . "/../core/ValidationException.php");

class JuradoBean {
	var $NombreC;
	var $FechaIni;
	var $FechaFin;
	var $BasesCon;
	var $Patrocinadores;
	var $Premios;
	
	public function __construct($NombreC=NULL, $FechaIni=NULL, $FechaFin=NULL,$BasesCon=NULL,$Patrocinadores=NULL,$Premios=NULL) {
		$this -> NombreC = $NombreC;
		$this -> FechaIni = $FechaIni;
		$this -> FechaFin = $FechaFin;
		$this -> BasesCon = $BasesCon;
		$this -> Patrocinadores = $Patrocinadores;
		$this -> Premios = $Premios;
	}
	
	public function getNombreC() {
		return $this -> NombreC;
	}
	
	public function setNombreC($nombreC) {
		$this -> nombreC = $nombreC;
	}
	
	public function getFechaIni() {
		return $this -> FechaIni;
	}
	
	public function setFechaIni($FechaIni) {
		$this -> FechaIni = $FechaIni;
	}
	
	public function getFechaFin() {
		return $this -> FechaFin;
	}
	
	public function setFechaFin($FechaFin) {
		$this -> FechaFin = $FechaFin;
	}
	
	public function getBasesCon() {
		return $this -> BsesCon;
	}
	
	public function setBasesCon($BasesCon) {
		$this -> BasesCon = $BasesCon;
	}
	
	public function getPatrocinadores() {
		return $this -> Patrocinadores;
	}
	
	public function setPatrocinadores($Patrocinadores) {
		$this -> Patrocinadores = $Patrocinadores;
	}
	
	public function getNombreC() {
		return $this -> NombreC;
	}
	
	public function setPremios($Premios) {
		$this -> Premios = $Premios;
	}
	
	public function __toString() {
		return "ConcursoBean:
			 nombre = $this->NombreC," . "
			 fecha de inicio = $this->FechaIni," . "
			 fecha de fin = $this->FechaFin," . "
			 bases de concurso = $this->BasesCon, " . "
			 patrocinadores = $this->Patrocinadores, " . "
			 premios = $this->infoPincho, ";
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
		if (strlen(trim($this -> nombreC)) == 0) {
			$errors["nombreC"] = "El nombre es obligatorio";
		}
		if (strlen(trim($this -> FechaIni)) == 0) {
			$errors["FechaIni"] = "Necesita fecha de inicio";
		}
		if (strlen(trim($this -> FechaFin)) == 0) {
			$errors["FechaFin"] = "Necesita fecha de fin";
		}
		if (strlen(trim($this -> BasesCon)) == 0) {
			$errors["BasesCon"] = "Es obligatorio poner las bases del concurso";
		}
		if (strlen(trim($this -> Patrocinadores)) == 0) {
			$errors["Patrocinadores"] = "Se deben incluir los patrocinadores";
		}
		if (strlen(trim($this -> Premios)) == 0) {
			$errors["Premios"] = "Deben existir los premios";
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
	
		if (!isset($this -> NombreC)) {
			$errors["NombreCUpdate"] = "Es obligatorio que tenga nombre";
		}
	
		try {
			$this -> checkIsValidForCreate();
		} catch(ValidationException $ex) {
			foreach ($ex->getErrors() as $key => $error) {
				$errors[$key] = $error;
			}
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "Concurso no valido");
		}
	}
	
}
	
?>
