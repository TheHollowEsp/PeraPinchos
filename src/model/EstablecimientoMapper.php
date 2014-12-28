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

	public function isValidUser($Cif, $PasswordE) {
		$stmt = $this -> db -> prepare("SELECT count(Cif) FROM Establecimiento where Cif=? and PasswordE=?");
		$stmt -> execute(array($Cif, $PasswordE));
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
		$stmt = $this -> db -> prepare("INSERT INTO Establecimiento values (?,?,?,?,?,?,?)");
		$stmt -> execute(array($establecimiento -> getCif(), $establecimiento -> getNombreEst(), $establecimiento -> getDireccion(), $establecimiento -> getHorario(), $establecimiento -> getFotos(), $establecimiento -> getWeb(), $establecimiento -> getPasswordE()));
	}

	/**
	 * Comprueba que el nombre no exista ya en la DB
	 *
	 * @param string $username the username to check
	 * @return boolean true if the username exists, false otherwise
	 */
	public function establecimientoExists($Cif) {
		$stmt = $this -> db -> prepare("SELECT count(Cif) FROM Establecimiento where Cif=?");
		$stmt -> execute(array($Cif));

		if ($stmt -> fetchColumn() > 0) {
			return true;
		}
	}

	public function registrarEnConcurso($cif, $nombreCon) {
		$stmt = $this -> db -> prepare("SELECT count(Cif) FROM Establecimiento_has_Concurso where Cif=? and Concurso_NombreC=?");
		$stmt -> execute(array($cif, $nombreCon));

		if ($stmt -> fetchColumn() == 0) {
			$stmt = $this -> db -> prepare("INSERT INTO Establecimiento_has_Concurso values (?,?)");
			$stmt -> execute(array($cif, $nombreCon));
			return true;
		}else{
			return false;
		}
	}
	
	public function delete($cif) {
		$stmt = $this -> db -> prepare("DELETE from Establecimiento WHERE Cif=?");
		$stmt -> execute(array($establecimiento -> getCif()));
	}
	

}
