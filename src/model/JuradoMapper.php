<?php
// file: model/JuradoMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

class JuradoMapper {

  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }
  
   	/**
	* Guarda en la base de datos un nuevo elemento Jurado
	* @throws PDOException if a database error occurs
	* @return void
	*/
	public function save(Jurado $jurado) {
		$stmt = $this->db->prepare("INSERT INTO Jurado values (?,?,?)");
		$stmt->execute(array(
		$jurado->getDniJurado(), 
		$jurado->getNombreJurado(), 
		$jurado->getIsProfesional));  
  }
  
  	/**
	* Muestra todos los elementos de la tabla Jurado
	* @throws PDOException if a database error occurs
	* @return array
	*/
  	public function findAll() {
		$stmt = $this -> db -> query("SELECT * FROM jurado");
		$jurado_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$juradoL = array();

		foreach ($jurado_db as $jurado) {
			array_push($juradoL, new Jurado($jurado["DniJur"], $jurado["Nombre"], $jurado["Juradocol"]));
		}
		return $juradoL;
	}
	
	/**
	* Comprueba si existe un Jurado segun el nombre
	* @throws PDOException if a database error occurs
	* @return void
	*/
	public function juradoExistsByName(Jurado $nombreJurado) {
		$stmt = $this->db->prepare("SELECT count(nombreJurado) FROM Jurado where nombreJurado=?");
		$stmt->execute(array($nombreJurado));
    
		if ($stmt->fetchColumn() > 0) {   
			return true;
		} 
  }
  
	/**
	* Comprueba si existe un Jurado segun el DNI
	* @throws PDOException if a database error occurs
	* @return void
	*/
	public function juradoExistsByDNI($dniJurado) {
		$stmt = $this->db->prepare("SELECT count(dniJurado) FROM Jurado where dniJurado=?");
		$stmt->execute(array($dniJurado));
    
		if ($stmt->fetchColumn() > 0) {   
			return true;
		} 
  }
  
	/**
	* Busca un elemento Jurado segun su clave primaria, DNI
	* @throws PDOException if a database error occurs
	* @return jurado
	*/
    public function findByDNI($juradodni){
		$stmt = $this->db->prepare("SELECT * FROM Jurado WHERE dniJurado=?");
		$stmt->execute(array($juradodni));
		$jurado = $stmt->fetch(PDO::FETCH_ASSOC);
    
		if(!sizeof($jurado) == 0) {
			return new jurado(
		$jurado["DniJur"],
		$jurado["Nombre"],
		$jurado["Juradocol"],
		} else {
			return NULL;
		}   
  }
  
  	/**
	* Comprueba si el elemento jurado a introduxir es valido o no
	* @throws PDOException if a database error occurs
	* @return void
	*/
	public function isValidJurado($dniJurado, $nombreJurado) {
		$stmt = $this->db->prepare("SELECT count(dniJurado) FROM Jurado where dniJurado=? and nombreJurado=?");
		$stmt->execute(array($dniJurado, $nombreJurado));
    
		if ($stmt->fetchColumn() > 0) {
			return true;        
		}
  }

	/**
	 * Borra el elemento jurado de la base de datos
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
  	public function delete(Jurado $jurado) {
		$stmt = $this -> db -> prepare("DELETE from jurado WHERE dniJurado=?");
		$stmt -> execute(array($jurado -> getDniJurado()));
	}
	
}