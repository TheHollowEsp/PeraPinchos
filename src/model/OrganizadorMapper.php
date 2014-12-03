<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../core/PDOConnection.php");

require_once (__DIR__ . "/../model/Organizador.php");

/**
 * Interfaz de la DB para los concursos
 */
class ConcursoMapper {



	/*
	 * Guarda el concurso en la DB
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function save(Organizador $organizador) {
		$stmt = $this -> db -> prepare("INSERT INTO organizador (DniOrg, NombreOrg, Telefono, Email) (?,?,?,?)");
		$stmt -> execute(array(
		$organizador -> getDniOrg(), 
		$organizador -> getNombreOrg(), 
		$organizador -> getTelefono(), 
		$organizador-> getEmail(),  
		
		//$concurso -> getEstablecimiento() -> getUsername() //Revisar
		));
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
		)); 
	} //Aquí no se cambia la clave foranea

	/**
	 * Borra el concurso de la base de datos
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function delete(Organizador $organizador) {
		$stmt = $this -> db -> prepare("DELETE from concurso WHERE Nombrec=?");
		$stmt -> execute(array($concurso -> getNombreconcurso()));
	}

}
