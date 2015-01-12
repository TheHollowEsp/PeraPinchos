<?php
// file: model/Voto.php

require_once (__DIR__ . "/../core/ValidationException.php");

ini_set('display_errors', 'On');

class EstCon {

	private $Cif;
	private $NombreC;



	public function __construct($Cif = NULL, $NombreC = NULL) {
		$this -> Cif = $Cif;
		$this -> NombreC = $NombreC;
	}

	public function getCifEst() {
		return $this -> Cif;
	}

	public function setCifEst($Cif) {
		$this -> Cif = $Cif;
	}

	public function getNomCon() {
		return $this -> NombreC;
	}

	public function setNomCon($NombreC) {
		$this -> NombreC = $NombreC;
	}

	public function __toString() {
		return "VotoBean: cif = $this->Cif," . "Nombre del establecimiento = $this->NombreC";
	}
}
