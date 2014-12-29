<?php
// file: model/PostMapper.php
require_once (__DIR__ . "/../core/PDOConnection.php");

require_once (__DIR__ . "/../model/Establecimiento.php");

require_once (__DIR__ . "/../model/Pincho.php");
require_once (__DIR__ . "/../model/Voto.php");

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
		 
		 
		 array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Cif"]));
		 }
		 
		 return $pinchos;

	}

	public function findAll() {
		$stmt = $this -> db -> query("SELECT * FROM Pincho where Validado=1");
		$pinchos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$pinchos = array();

		foreach ($pinchos_db as $pincho) {
			array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Cif"]));
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
			array_push($pinchos, new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Cif"]));
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
			return new Pincho($pincho["NombrePincho"], $pincho["Descripcion"], $pincho["Precio"], $pincho["Ingredientes"], $pincho["Fotos"], $pincho["Informacion"], $pincho["Validado"], $pincho["Cif"]);
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
		$stmt = $this -> db -> prepare("INSERT INTO Pincho (NombrePincho, Descripcion, Precio, Ingredientes, Fotos, Informacion, Validado, Cif) values (?,?,?,?,?,?,?,?)");
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
	
	public function countP(){
			$stmt2 = $this -> db -> prepare("SELECT count(NombrePincho) FROM pincho");
			$stmt2 -> execute();
			$numPinchos = $stmt2 -> fetchColumn();
			return $numPinchos;
		}
		
		
		public function unirAzarP($num, $Jurado_Dni){
			$stmt = $this -> db -> prepare("SELECT NombrePincho FROM pincho");
			$stmt2 = $this -> db -> prepare("SELECT count(NombrePincho) FROM pincho");
			$stmt -> execute();	
			$stmt2 -> execute();
			$pincho_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);
			$numPinchos = $stmt2 -> fetchColumn();
			$array = array();
			foreach ($pincho_db as $p) {
				$array[] = $p	;
			}
			for ($i=0; $i == $num; $i++) {
				$number = rand(0, $numPinchos-1);
				$nom_pincho = implode("", $array[$number]);
				$stmt = $this -> db -> prepare("SELECT count(Pincho_NombrePincho) FROM Pincho_has_Jurado where Pincho_NombrePincho=? and Jurado_DniJur=?");
				$stmt -> execute(array($nom_pincho, $Jurado_Dni));
				
				$stmt3 = $this -> db -> prepare("SELECT count(Pincho_NombrePincho) FROM Pincho_has_Jurado where Jurado_DniJur=?");
				$stmt3 -> execute(array($Jurado_Dni));

				if ($stmt -> fetchColumn() == 0 && $stmt3 -> fetchColumn() != $numPinchos) {
					$stmt = $this -> db -> prepare("INSERT INTO Pincho_has_Jurado values (?,?,?)");
					$stmt -> execute(array($nom_pincho, $Jurado_Dni,NULL));
					
				}else{
					 $i--;
					
				}
			}
		}

	public function votos(){
		$stmt = $this -> db -> query("SELECT NombreC, Pincho_NombrePincho, sum(VotoPro), count(*) FROM Pincho_has_Jurado, Pincho where VotoPro is not null and Pincho_NombrePincho=NombrePincho group by Pincho_NombrePincho order by (sum(VotoPro)/count(*)) desc");
		
		$stmt2 = $this -> db -> query("SELECT VotoPro FROM Pincho_has_Jurado where VotoPro is not null");
		$aux = $stmt2 -> fetchAll(PDO::FETCH_ASSOC);
		$suma;
		
		$votos_db = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		$votos = array();

		foreach ($votos_db as $voto) {
			
			array_push($votos, new Voto($voto["Pincho_NombrePincho"], $voto["count(*)"], ($voto["sum(VotoPro)"])/($voto["count(*)"]), $voto["NombreC"]));
		}

		return $votos;
	}
}
