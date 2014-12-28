<?php
// file: model/EstablecimientoMapper.php

require_once (__DIR__ . "/../core/PDOConnection.php");

ini_set('display_errors', 'On');

class EstablecimientoMapper {

	private $db;

	public function __construct() {
		$this -> db = PDOConnection::getInstance();
	}

	/**
	 * Funcion para validar user y pass establecimiento
	 */

	public function isValidUser($NombreEst, $PasswordE) {
		$stmt = $this -> db -> prepare("SELECT count(NombreEst) FROM establecimiento where NombreEst=? and PasswordE=?");
		$stmt -> execute(array($NombreEst, $PasswordE));
		if ($stmt -> fetchColumn() > 0) {
			return true;
		}
	}

	/**
	 * Guarda un establecimiento en la DB
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function save($establecimiento) {
		$stmt = $this -> db -> prepare("INSERT INTO establecimiento values (?,?,?,?,?,?)");
		$stmt -> execute(array($establecimiento -> getNombreEst(), $establecimiento -> getDireccion(), $establecimiento -> getHorario(), $establecimiento -> getFotos(), $establecimiento -> getWeb(), $establecimiento -> getPasswordE()));
	}

	/**
	 * Comprueba que el nombre no exista ya en la DB
	 *
	 * @param string $username the username to check
	 * @return boolean true if the username exists, false otherwise
	 */
	public function establecimientoExists($nombreEst) {
		$stmt = $this -> db -> prepare("SELECT count(NombreEst) FROM Establecimiento where NombreEst=?");
		$stmt -> execute(array($nombreEst));

		if ($stmt -> fetchColumn() > 0) {
			return true;
		}
	}

	public function registrarEnConcurso($nombreEst, $nombreCon) {
		$stmt = $this -> db -> prepare("SELECT count(Establecimiento_NombreEst) FROM establecimiento_has_concurso where Establecimiento_NombreEst=? and Concurso_NombreC=?");
		$stmt -> execute(array($nombreEst, $nombreCon));

		if ($stmt -> fetchColumn() == 0) {
			$stmt = $this -> db -> prepare("INSERT INTO establecimiento_has_concurso values (?,?)");
			$stmt -> execute(array($nombreEst, $nombreCon));
			return true;
		}else{
			return false;
		}
	}

}