<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../core/PDOConnection.php");

require_once (__DIR__ . "/../model/Organizador.php");
require_once (__DIR__ . "/../model/Concurso.php");
require_once (__DIR__ . "/../model/EstCon.php");

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
		$stmt = $this -> db -> query("SELECT * FROM Concurso");
		$concursos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$concursoL = array();

		foreach ($concursos_db as $concurso) {			
			//$organizador = new Organizador($_SESSION['currentuser']);
			array_push($concursoL, new Concurso($concurso["NombreC"], $concurso["FechaIni"], $concurso["FechaFin"], $concurso["BasesCon"], $concurso["Patrocinadores"],$concurso["Premios"],$_SESSION['currentuser']));
		}

		return $concursoL;
	}

	/**
	 * Busca un concurso por su nombre en la DB.
	 * Nota: Solo buscar� entre los concursos validados
	 * Practicamente un consultar
	 * @throws PDOException if a database error occurs
	 * @return concurso / NULL si no encuentra el concurso
	 */
	public function findByName($nombreconcurso) {
		$stmt = $this -> db -> prepare("SELECT * FROM Concurso WHERE NombreC=?");
		$stmt -> execute(array($nombreconcurso));
		$concurso = $stmt -> fetch(PDO::FETCH_ASSOC);

		if (!sizeof($concurso) == 0) {
			return  new concurso($concurso["NombreC"], $concurso["FechaIni"], $concurso["FechaFin"], $concurso["BasesCon"], $concurso["Patrocinadores"],$concurso["Premios"],$concurso["Organizador_DniOrg"]);
		} else {
			return NULL;
		}
	}
	
	/**
	 * Comprueba si existe el concurso
	 * 
	 */
	 
	    public function concursoExistsByName($NombreC) {
		$stmt = $this->db->prepare("SELECT count(NombreC) FROM Concurso where NombreC=?");
		$stmt->execute(array($NombreC));
		if ($stmt->fetchColumn() > 0) {
		return true;
	}
		}

	/*
	 * Guarda el concurso en la DB
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function save(concurso $concurso) {
		$stmt = $this -> db -> prepare("INSERT INTO Concurso values (?,?,?,?,?,?,?)");
		$stmt -> execute(array(
		$concurso -> getNombreCon(), 
		$concurso -> getFechaIniCon(), 
		$concurso -> getFechaFinCon(), 
		$concurso -> getBasesConcurso(), 
		$concurso -> getPatrocinadoresCon(), 
		$concurso -> getPremiosCon(), 
		$concurso -> getOrganizadorCon()
		));
	}

	/**
	 * Le hace el update a un concurso
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function update(concurso $concurso) {
		$stmt = $this -> db -> prepare("UPDATE Concurso set NombreC=?, FechaIni=?, FechaFin=?, BasesCon=?, Patrocinadores=?, Premios=?, Organizador_DniOrg=? where NombreC=?");
		$stmt -> execute(array(
		$concurso -> getNombreCon(), 
		$concurso -> getFechaIni(), 
		$concurso -> getFechaFin(), 
		$concurso -> getBasesConcurso(), 
		$concurso -> getPatrocinadores(), 
		$concurso -> getPremios(),
		$concurso -> getOrganizador()
		)); 
	} //Aqu� no se cambia la clave foranea

	/**
	 * Borra el concurso de la base de datos
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function delete($con) {
		$stmt = $this -> db -> prepare("DELETE from Concurso WHERE NombreC=?");
		$stmt -> execute(array($con));
	}
	
	
	public function estaCon($cif){
		$stmt = $this -> db -> prepare("SELECT * FROM Establecimiento_has_Concurso as P where P.Cif=? AND NOT EXISTS (SELECT * FROM Pincho as L WHERE L.Cif=?)");
		// $stmt -> execute(array($nombreconcurso));
		$stmt -> execute(array($cif, $cif));
		$concursos = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$est = array();

		foreach ($concursos as $concurso) {
			array_push($est, new EstCon($concurso["Cif"], $concurso["Concurso_NombreC"]));
		}
		return $est;
	}

}
