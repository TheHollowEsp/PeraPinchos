<?php
// file: model/JuradoMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

class JuradoMapper {

  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }
   
  public function save(Jurado $jurado) {
    $stmt = $this->db->prepare("INSERT INTO Jurado values (?,?,?)");
    $stmt->execute(array(
	$jurado->getDniJurado(), 
	$jurado->getNombreJurado(), 
	$jurado->getIsProfesional));  
  }
  
  	public function findAll() {
		$stmt = $this -> db -> query("SELECT * FROM jurado");
		$jurado_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$juradoL = array();

		foreach ($jurado_db as $jurado) {			
			$jurado1 = new Jurado($jurado["Establecimiento_NombreEst"]);
			array_push($juradoL, new Jurado($jurado["dniJurado"], $jurado["nombreJurado"], $jurado["isJuradoP"]));
		}
		return $juradoL;
	}
  
  public function isValidJurado($dniJurado, $nombreJurado) {
    $stmt = $this->db->prepare("SELECT count(dniJurado) FROM Jurado where dniJurado=? and nombreJurado=?");
    $stmt->execute(array($dniJurado, $nombreJurado));
    
    if ($stmt->fetchColumn() > 0) {
      return true;        
    }
  }
  
  	public function delete(Jurado $jurado) {
		$stmt = $this -> db -> prepare("DELETE from jurado WHERE dniJurado=?");
		$stmt -> execute(array($jurado -> getDniJurado()));
	}
	
}