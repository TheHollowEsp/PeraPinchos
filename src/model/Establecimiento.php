<?php
// file: model/Establecimiento.php

require_once (__DIR__ . "/../core/ValidationException.php");

ini_set('display_errors', 'On');
/**
 * Class Establecimiento
 *
 * Representa a un establecimiento en la plataforma
 *
 * @author hrlopez
 */
class Establecimiento {

	private $nombreEst;
	private $direccion;
	private $horario;
	private $fotos;
	private $web;

	public function __construct($nombreEst = NULL, $direccion = NULL, $horario = NULL, $fotos = NULL, $web = NULL) {
		$this -> nombreEst = $nombreEst;
		$this -> direccion = $direccion;
		$this -> horario = $horario;
		$this -> fotos = $fotos;
		$this -> web = $web;
	}

	public function getNombreEst() {
		return $this -> nombreEst;
	}

	public function setNombreEst($nombreEst) {
		$this -> nombreEst = $nombreEst;
	}

	public function getDireccion() {
		return $this -> direccion;
	}

	public function setDireccion($direccion) {
		$this -> direccion = $direccion;
	}

	public function getHorario() {
		return $this -> horario;
	}

	public function setHorario($horario) {
		$this -> horario = $horario;
	}

	public function getFotos() {
		return $this -> fotos;
	}

	public function setFotos($fotos) {
		$this -> fotos = $fotos;
	}

	public function getWeb() {
		return $this -> web;
	}

	public function setWeb($web) {
		$this -> web = $web;
	}
	
	public function checkIsValidForRegisterEstablecimiento() {
		$errors = array();
		//if (strlen(trim($this -> dniJurado)) == 0) {
		if(nombreEst == NULL){
			$errors["nombreEst"] = "El nombre del estalbecimiento es obligatorio";
		}
		
		if (sizeof($errors)>0){
			throw new ValidationException($errors, "Jurado no valido");
		}
  }
}
