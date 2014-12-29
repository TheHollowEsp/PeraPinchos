<?php
// file: model/Voto.php

require_once (__DIR__ . "/../core/ValidationException.php");

ini_set('display_errors', 'On');

class Voto {

	private $Pincho_NombrePincho;
	private $NumeroDeVotoPro;
	private $Media;
	private $Concurso;


	public function __construct($Pincho_NombrePincho = NULL, $NumeroDeVotoPro = NULL, $Media = NULL, $Concurso = NULL) {
		$this -> Pincho_NombrePincho = $Pincho_NombrePincho;
		$this -> NumeroDeVotoPro = $NumeroDeVotoPro;
		$this -> Media = $Media;
		$this -> Concurso = $Concurso;
	}

	public function getNombrePincho() {
		return $this -> Pincho_NombrePincho;
	}

	public function setNombrePincho($NombrePincho) {
		$this -> Pincho_NombrePincho = $NombrePincho;
	}

	public function getNumVoto() {
		return $this -> NumeroDeVotoPro;
	}

	public function setNumVoto($Voto) {
		$this -> NumeroDeVotoPro = $Voto;
	}
	
	public function getMedia() {
		return $this -> Media;
	}

	public function setMedia($Media) {
		$this -> Media = $Media;
	}

	public function getConcurso() {
		return $this -> Concurso;
	}

	public function setConcurso($Concurso) {
		$this -> Concurso = $Concurso;
	}

	public function __toString() {
		return "VotoBean: nombre = $this->Pincho_NombrePincho," . "Numero de votos = $this->NumeroDeVotoPro," . "media = $this->Media";
	}
}
