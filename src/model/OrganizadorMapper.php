<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../core/PDOConnection.php");

/**
 * Interfaz de la DB para los concursos
 */
class OrganizadorMapper {

	private $db;

	public function __construct() {
		$this -> db = PDOConnection::getInstance();
	}

	/*
	 * Guarda el concurso en la DB
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function save(Organizador $organizador) {
		$stmt = $this -> db -> prepare("INSERT INTO organizador values (?,?,?,?,?)");
		$stmt -> execute(array(
		$organizador -> getDniOrg(), 
		$organizador -> getNombreOrg(), 
		$organizador -> getTelefono(), 
		$organizador-> getEmail(),
		$organizador -> getPasswordO()));
	}
	
	/**
	 * Comprueba si el organizador es un usuario valido
	 * 
	 */
	 
	    public function isValidUser($DniOrg, $PasswordO) {
		$stmt = $this->db->prepare("SELECT count(DniOrg) FROM Organizador where DniOrg=? and PasswordO=?");
		$stmt->execute(array($DniOrg, $PasswordO));
		if ($stmt->fetchColumn() > 0) {
		return true;
	}
		}
	/**
	 * Le hace el update a un concurso
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function update(Organizador $organizador) {
		$stmt = $this -> db -> prepare("UPDATE concurso set DniOrg=?, NombreOrg=?, Telefono=?, Email=? where DniOrg=?");
		$stmt -> execute(array(
		$organizador -> getDniOrg(),
		$organizador -> getNombreOrg(),
		$organizador -> getTelefono(),
		$organizador-> getEmail(),
		$organizador-> getPasswordO()
		)); 
	} //Aqu� no se cambia la clave foranea

	/**
	 * Borra el concurso de la base de datos
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function delete(Organizador $organizador) {
		$stmt = $this -> db -> prepare("DELETE from concurso WHERE Nombrec=?");
		$stmt -> execute(array($concurso -> getNombreconcurso()));
	}
	
		public function organizadorExistsByDNI($DniOrg) {
		$stmt = $this->db->prepare("SELECT count(DniOrg) FROM organizador where DniOrg=?");
		$stmt->execute(array($DniOrg));
    
		if ($stmt->fetchColumn() > 0) {
			return true;
		}
  }

}
