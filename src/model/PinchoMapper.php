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

	public function findAllForJuradoConcreto($jurado) {
		
		$stmt = $this -> db -> prepare("SELECT P.* FROM Jurado J, Pincho_has_Jurado PJ, Pincho P WHERE J.DniJur = PJ.Jurado_dniJur AND PJ.Pincho_NombrePincho = P.NombrePincho AND J.DniJur = ?");
		$stmt -> execute(array($jurado -> getDniJurado()));
		$pinchos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		
		$pinchos = array();
		foreach ($pinchos_db as $pincho) {
		 echo "Metiendo un pincho";
		 
		 array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Establecimiento_NombreEst"]));
		 }
		 echo "Retornando pincho";
		 return $pinchos;

	}

	public function findAll() {
		$stmt = $this -> db -> query("SELECT * FROM Pincho where Validado=1");
		$pinchos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$pinchos = array();

		foreach ($pinchos_db as $pincho) {
			array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Establecimiento_NombreEst"]));
		}

		return $pinchos;
	}

	public function findAllNoValidado() {
		$stmt = $this -> db -> query("SELECT * FROM Pincho where Validado=0");
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
		$stmt = $this -> db -> prepare("SELECT * FROM Pincho WHERE NombrePincho=?");
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
		echo "Entrando en el guardado";
		$stmt = $this -> db -> prepare("INSERT INTO Pincho (NombrePincho, Descripcion, Precio, Ingredientes, Fotos, Informacion, Validado, Establecimiento_NombreEst) values (?,?,?,?,?,?,?,?)");
		$stmt -> execute(array($pincho -> getNombrePincho(), $pincho -> getDescripcionPincho(), $pincho -> getPrecioPincho(), $pincho -> getIngredientesPincho(), $pincho -> getFotosPincho(), $pincho -> getInfoPincho(), $pincho -> getIsValidado(), $pincho -> getEstablecimiento()));
	}

	/**
	 * Le hace el update a un pincho
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function update(Pincho $pincho) {
		$stmt = $this -> db -> prepare("UPDATE Pincho set Descripcion=?, Precio=?, Ingredientes=?, Fotos=?, Informacion=?, Validado=? where NombrePincho=?");
		$stmt -> execute(array($pincho -> getDescripcionPincho(), $pincho -> getPrecioPincho(), $pincho -> getIngredientesPincho(), $pincho -> getFotosPincho(), $pincho -> getInfoPincho(), $pincho -> getIsValidado(), $pincho -> getNombrePincho()));
	}//Aquí no se cambia la clave foranea

	/**
	 * Borra el pincho de la base de datos
	 * @throws PDOException if a database error occurs
	 * @return void
	 */
	public function delete(Pincho $pincho) {
		$stmt = $this -> db -> prepare("DELETE from Pincho WHERE NombrePincho=?");
		$stmt -> execute(array($pincho -> getNombrePincho()));
	}
	
	public function valorarPincho($nombre,$valoracion,$user){
		$stmt = $this -> db -> prepare("UPDATE Pincho_has_Jurado set VotoPro=? WHERE Pincho_NombrePincho=? AND Jurado_DniJur=?");
		
		$stmt -> execute(array($valoracion, $nombre,$user));
	
	}
	
	public function pinchoExists($NombrePincho) {
		echo "Comprobando existencia de " . $NombrePincho;
		$stmt = $this -> db -> prepare("SELECT count(NombrePincho) FROM Pincho where NombrePincho=?");
		$stmt -> execute(array($NombrePincho));

		if ($stmt -> fetchColumn() > 0) {
			return true;
		}
	}
		public function unirP($Pincho_NombreP, $Jurado_DniJ) {
		$stmt = $this -> db -> prepare("SELECT count(Pincho_NombrePincho) FROM Pincho_has_Jurado where Pincho_NombrePincho=? and Jurado_DniJur=?");
		$stmt -> execute(array($Pincho_NombreP, $Jurado_DniJ));

		if ($stmt -> fetchColumn() == 0) {
			$stmt = $this -> db -> prepare("INSERT INTO Pincho_has_Jurado values (?,?,?)");
			$stmt -> execute(array($Pincho_NombreP, $Jurado_DniJ,NULL));
			return true;
		}else{
			return false;
		}
	}
}
