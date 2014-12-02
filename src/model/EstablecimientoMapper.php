<?php
// file: model/EstablecimientoMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

ini_set('display_errors', 'On');
/**
 * Class EstablecimientoMapper
 *
 * Interfaz DB para entidades Establecimiento
 * 
 * @author hrlopez
 */
class EstablecimientoMapper {

  /**
   * Reference to the PDO connection
   * @var PDO
   */
  private $db;
  
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }

  /**
   * Guarda un establecimiento en la DB
   * @throws PDOException if a database error occurs
   * @return void
   */      
  public function save($establecimiento) {
    $stmt = $this->db->prepare("INSERT INTO establecimiento values (?,?,?,?,?)");
    $stmt->execute(array($establecimiento-> getNombreEst(), $establecimiento->getDireccion(), $establecimiento->getHorario(), $establecimiento->getFotos(), $establecimiento->getWeb()));  
  }
  
  /**
   * Comprueba que el nombre no exista ya en la DB
   * 
   * @param string $username the username to check
   * @return boolean true if the username exists, false otherwise
   */
  public function usernameExists($username) {
    $stmt = $this->db->prepare("SELECT count(NombreEst) FROM establecimiento where NombreEst=?");
    $stmt->execute(array($username));
    
    if ($stmt->fetchColumn() > 0) {   
      return true;
    } 
  }
  
  
}