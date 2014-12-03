<?php
// file: model/Jurado.php

require_once (__DIR__ . "/../core/ValidationException.php");

class Concurso {
	var $NombreCon;
	var $FechaIniCon;
	var $FechaFinCon;
	var $BasesConcurso;
	var $PatrocinadoresCon;
	var $PremiosCon;
	
	public function __construct($NombreCon=NULL, $FechaIniCon=NULL, $FechaFinCon=NULL,$BasesConcurso=NULL,$PatrocinadoresCon=NULL,$PremiosCon=NULL) {
		$this -> NombreCon = $NombreCon;
		$this -> FechaIniCon = $FechaIniCon;
		$this -> FechaFinCon = $FechaFinCon;
		$this -> BasesConcurso = $BasesConcurso;
		$this -> PatrocinadoresCon = $PatrocinadoresCon;
		$this -> PremiosCon = $PremiosCon;
	}
	
	public function getNombreCon() {
		return $this -> NombreCon;
	}
	
	public function setNombreCon($NombreCon) {
		$this -> NombreCon = $NombreCon;
	}
	
	public function getFechaIniCon() {
		return $this -> FechaIniCon;
	}
	
	public function setFechaIniCon($FechaIniCon) {
		$this -> FechaIniCon = $FechaIniCon;
	}
	
	public function getFechaFinCon() {
		return $this -> FechaFinCon;
	}
	
	public function setFechaFinCon($FechaFinCon) {
		$this -> FechaFinCon = $FechaFinCon;
	}
	
	public function getBasesConcurso() {
		return $this -> BasesConcurso;
	}
	
	public function setBasesConcurso($BasesConcurso) {
		$this -> BasesConcurso = $BasesConcurso;
	}
	
	public function getPatrocinadoresCon() {
		return $this -> PatrocinadoresCon;
	}
	
	public function setPatrocinadoresCon($PatrocinadoresCon) {
		$this -> PatrocinadoresCon = $PatrocinadoresCon;
	}
	
	public function getPremiosCon() {
		return $this -> PremiosCon;
	}
	
	public function setPremiosCon($PremiosCon) {
		$this -> PremiosCon = $PremiosCon;
	}
	
	public function __toString() {
		return "ConcursoBean:
			 nombre = $this->NombreCon," . "
			 fecha de inicio = $this->FechaIniCon," . "
			 fecha de fin = $this->FechaFinCon," . "
			 bases de concurso = $this->BasesConcurso, " . "
			 PatrocinadoresCon = $this->PatrocinadoresCon, " . "
			 PremiosCon = $this->infoPincho, ";
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
		if (strlen(trim($this -> NombreCon)) == 0) {
			$errors["NombreCon"] = "El nombre es obligatorio";
		}
		if (strlen(trim($this -> FechaIniCon)) == 0) {
			$errors["FechaIniCon"] = "Necesita fecha de inicio";
		}
		if (strlen(trim($this -> FechaFinCon)) == 0) {
			$errors["FechaFinCon"] = "Necesita fecha de fin";
		}
		if (strlen(trim($this -> BasesConcurso)) == 0) {
			$errors["BasesConcurso"] = "Es obligatorio poner las bases del concurso";
		}
		if (strlen(trim($this -> PatrocinadoresCon)) == 0) {
			$errors["PatrocinadoresCon"] = "Se deben incluir los PatrocinadoresCon";
		}
		if (strlen(trim($this -> PremiosCon)) == 0) {
			$errors["PremiosCon"] = "Deben existir los PremiosCon";
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
	
		if (!isset($this -> NombreCon)) {
			$errors["NombreConUpdate"] = "Es obligatorio que tenga nombre";
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
