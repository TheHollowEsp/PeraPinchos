<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../core/PDOConnection.php");

require_once (__DIR__ . "/../model/Organizador.php");
require_once (__DIR__ . "/../model/Concurso.php");

/**
 * Class concursoMapper
 *
 * Interfaz de la DB para los concursos
 * Falta integrar la busqueda de concursos solo para jurado
 * Falta integrar correctamente la FK Establecimiento_NombreEst
 * @author hrlopez
 */
class concursoMapper {

	/**
	 * Reference to the PDO connection
	 * @var PDO
	 */
	private $db;

	public function __construct() {
		$this -> db = PDOConnection::getInstance();
	}

	/**
	 * Devuelve todos los concursos
	 *
	 * @throws PDOException if a database error occurs
	 * @return mixed Array of Post instances (without comments)
	 */
	public function findAll() {
		$stmt = $this -> db -> query("SELECT * FROM concurso");
		$concursos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$concurso = array();

		foreach ($concursos_db as $concurso) {			
			$organizador = new Organizador($concurso["Organizador_DniOrg"]);
			array_push($concurso, new concurso($concurso["nombreConcurso"], $concurso["fechaInicio"], $concurso["fechaFin"], $concurso["basesConcurso"], $concurso["patrocinadores"],$concurso["premios"],$organizador));
		}

		return $concursos;
	}

	/**
	 * Busca un concurso por su nombre en la DB.
	 * Nota: Solo buscará entre los concursos validados
	 * Practicamente un consultar
	 * @throws PDOException if a database error occurs
	 * @return concurso / NULL si no encuentra el concurso
	 */
	public function findByName($nombreconcurso) {
		$stmt = $this -> db -> prepare("SELECT * FROM concurso WHERE NombreC=?");
		$stmt -> execute(array($nombreconcurso));
		$concurso = $stmt -> fetch(PDO::FETCH_ASSOC);

		if (!sizeof($post) == 0) {
			return new concurso($concurso["nombreConcurso"], $concurso["fechaInicio"], $concurso["fechaFin"], $concurso["basesConcurso"], $concurso["patrocinadores"], $concurso["premios"],new Organizador($concurso["Org"]));
		} else {
			return NULL;
		}
	}

	/*
	 * Guarda el concurso en la DB
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function save(concurso $concurso) {
		$stmt = $this -> db -> prepare("INSERT INTO concurso (NombreConcurso, fechaInicio, fechaFin, basesConcurso, patrocinadores, premios, //aqui falta la foranea) (?,?,?,?,?,?,?,?)");
		$stmt -> execute(array(
		$concurso -> getNombreConcurso(), 
		$concurso -> getFechaInicio(), 
		$concurso -> getFechaFin(), 
		$concurso -> getBasesConcurso(), 
		$concurso -> getPatrocinadores(), 
		$concurso -> getPremios(), 
		
		//$concurso -> getEstablecimiento() -> getUsername() //Revisar
		));
	}

	/**
	 * Le hace el update a un concurso
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function update(concurso $concurso) {
		$stmt = $this -> db -> prepare("UPDATE concurso set NombreC=?, FechaIni=?, FechaFin=?, BasesCon=?, Patrocinadores=?, Premios=? where NombreC=?");
		$stmt -> execute(array(
		$concurso -> getNombreConcurso(), 
		$concurso -> getFechaInicio(), 
		$concurso -> getFechaFin(), 
		$concurso -> getBasesConcurso(), 
		$concurso -> getPatrocinadores(), 
		$concurso -> getPremios(), 
		)); 
	} //Aquí no se cambia la clave foranea

	/**
	 * Borra el concurso de la base de datos
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function delete(concurso $concurso) {
		$stmt = $this -> db -> prepare("DELETE from concurso WHERE Nombrec=?");
		$stmt -> execute(array($concurso -> getNombreconcurso()));
	}

}
