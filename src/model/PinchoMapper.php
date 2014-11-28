<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../core/PDOConnection.php");

require_once (__DIR__ . "/../model/Establecimiento.php");
require_once (__DIR__ . "/../model/Pincho.php");

/**
 * Class PinchoMapper
 *
 * Interfaz de la DB para los pinchos
 * Falta integrar la busqueda de pinchos solo para jurado
 * Falta integrar correctamente la FK Establecimiento_NombreEst
 * @author hrlopez
 */
class PinchoMapper {

	/**
	 * Reference to the PDO connection
	 * @var PDO
	 */
	private $db;

	public function __construct() {
		$this -> db = PDOConnection::getInstance();
	}

	/**
	 * Devuelve todos los pinchos
	 *
	 * @throws PDOException if a database error occurs
	 * @return mixed Array of Post instances (without comments)
	 */
	public function findAll() {
		$stmt = $this -> db -> query("SELECT * FROM pincho");
		$pinchos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$pinchos = array();

		foreach ($pinchos_db as $pincho) {			
			$establecimiento = new Establecimiento($pincho["Establecimiento_NombreEst"]);
			array_push($pinchos, new Pincho($pincho["nombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Info"]));
		}

		return $pinchos;
	}

	/**
	 * Busca un pincho por su nombre en la DB.
	 * Nota: Solo buscará entre los pinchos validados
	 * Practicamente un consultar
	 * @throws PDOException if a database error occurs
	 * @return Pincho / NULL si no encuentra el pincho
	 */
	public function findById($nombrePincho) {
		$stmt = $this -> db -> prepare("SELECT * FROM pincho WHERE id=? AND isValidado=1");
		$stmt -> execute(array($nombrePincho));
		$pincho = $stmt -> fetch(PDO::FETCH_ASSOC);

		if (!sizeof($post) == 0) {
			return new Pincho($pincho["nombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Info"], new Establecimiento($pincho["Establecimiento_NombreEst"]));
		} else {
			return NULL;
		}
	}

	/*
	 * Guarda el pincho en la DB
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function save(Pincho $pincho) {
		$stmt = $this -> db -> prepare("INSERT INTO pincho (NombrePincho, Descripcion, Precio, Ingredientes, Fotos, Informacion, Validado, Establecimiento_NombreEst) (?,?,?,?,?,?,?,?)");
		$stmt -> execute(array(
		$pincho -> getNombrePincho(), 
		$pincho -> getDescripcionPincho(), 
		$pincho -> getPrecioPincho(), 
		$pincho -> getIngredientesPincho(), 
		$pincho -> getFotosPincho(), 
		$pincho -> getInfoPincho(), 
		$pincho -> getIsValidado(), 
		$pincho -> getEstablecimiento() -> getUsername() //Revisar
		));
	}

	/**
	 * Le hace el update a un pincho
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function update(Pincho $pincho) {
		$stmt = $this -> db -> prepare("UPDATE pincho set Descripcion=?, Precio=?, Ingredientes=?, Fotos=?, Informacion=?, Validado=? where NombrePincho=?");
		$stmt -> execute(array(
		$pincho -> getDescripcionPincho(), 
		$pincho -> getPrecioPincho(), 
		$pincho -> getIngredientesPincho(), 
		$pincho -> getFotosPincho(), 
		$pincho -> getInfoPincho(), 
		$pincho -> getIsValidado(),
		$pincho -> getNombrePincho()
		)); 
	} //Aquí no se cambia la clave foranea

	/**
	 * Borra el pincho de la base de datos
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function delete(Pincho $pincho) {
		$stmt = $this -> db -> prepare("DELETE from pincho WHERE NombrePincho=?");
		$stmt -> execute(array($pincho -> getNombrePincho()));
	}

}
