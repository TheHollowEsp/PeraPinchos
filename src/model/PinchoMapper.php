<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../core/PDOConnection.php");

require_once (__DIR__ . "/../model/Establecimiento.php");

require_once (__DIR__ . "/../model/Pincho.php");

ini_set('display_errors', 'On');
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

	//FIXME: Le falta poner atributos de jurado
	public function findAllForJuradoP() {
		$stmt = query("SELECT * FROM pincho NATURAL JOIN pincho_has_jurado NATURAL JOIN jurado");
		$pinchos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$pinchos = array();
		foreach ($pinchos_db as $pincho) {
			//$establecimiento = new Establecimiento($pincho["Establecimiento_NombreEst"]);
			//Usar nombres de las columnas en la DB
			array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Establecimiento_NombreEst"]));
		}

		return $pinchos;

	}

	//FIXME: Por probar, falta poner atributos de jurado en array
	public function findAllForJuradoConcreto($jurado) {
		$stmt = $this -> db -> prepare("SELECT * FROM pincho NATURAL JOIN pincho_has_jurado NATURAL JOIN jurado WHERE jurado.DNIJur=?");

		$stmt -> execute(array($jurado -> getDniJurado()));

		$pinchos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$pinchos = array();
		foreach ($pinchos_db as $pincho) {
			//$establecimiento = new Establecimiento($pincho["Establecimiento_NombreEst"]);
			//Usar nombres de las columnas en la DB
			array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Establecimiento_NombreEst"]));
		}

		return $pinchos;

	}

	public function findAll() {
		$stmt = $this -> db -> query("SELECT * FROM pincho");
		$pinchos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$pinchos = array();

		foreach ($pinchos_db as $pincho) {
			//$establecimiento = new Establecimiento($pincho["Establecimiento_NombreEst"]);
			//Usar nombres de las columnas en la DB
			array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Establecimiento_NombreEst"]));
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
		//$stmt = $this -> db -> prepare("SELECT * FROM pincho WHERE NombrePincho=? AND Validado=1");
		$stmt = $this -> db -> prepare("SELECT * FROM pincho WHERE NombrePincho=?");
		$stmt -> execute(array($nombrePincho));
		$pincho = $stmt -> fetch(PDO::FETCH_ASSOC);

		if (!sizeof($pincho) == 0) {
			return new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Establecimiento_NombreEst"]);
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
		$stmt -> execute(array($pincho -> getNombrePincho(), $pincho -> getDescripcionPincho(), $pincho -> getPrecioPincho(), $pincho -> getIngredientesPincho(), $pincho -> getFotosPincho(), $pincho -> getInfoPincho(), $pincho -> getIsValidado(), $pincho -> getEstablecimiento() -> getNombre() //Revisar
		));
	}

	/**
	 * Le hace el update a un pincho
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function update(Pincho $pincho) {
		$stmt = $this -> db -> prepare("UPDATE pincho set Descripcion=?, Precio=?, Ingredientes=?, Fotos=?, Informacion=?, Validado=? where NombrePincho=?");
		$stmt -> execute(array($pincho -> getDescripcionPincho(), $pincho -> getPrecioPincho(), $pincho -> getIngredientesPincho(), $pincho -> getFotosPincho(), $pincho -> getInfoPincho(), $pincho -> getIsValidado(), $pincho -> getNombrePincho()));
	}//Aquí no se cambia la clave foranea

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
