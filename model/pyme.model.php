<?php
class myPymeModel {

		private $pdo;

		public function __CONSTRUCT()
		{
			try
			{
	            $this->pdo = Database::Conectar();
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		
		public function Eliminar($id)
		{
			try 
			{
				$stm = $this->pdo->prepare("DELETE FROM pyme WHERE id = ?");
				$stm->execute(array($id));
			}
	        catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Registrar($miPyme)
		{

			date_default_timezone_set('America/Costa_Rica');
			$fec=date('d-m-Y');
			$fecha= date("d-m-y",strtotime($fec));

			$EsActiva=0;
			$EsNegocioFamiliar=0;
			$FaceInsta=0;
			

			try 
			{

				/* Registramos el Usuario */
				$sql = "INSERT INTO Usuario(Usuario,NombreCompleto, Clave ,EmailContacto ) 
				VALUES (?, ?, ?, ? );";
				$this->pdo->prepare($sql)
				          ->execute(
				            array(
				                $miPyme['usuario'],
				                $miPyme['nombreCompleto'],
				                $miPyme['clave'],
				                $miPyme['emailContacto']

				            ));

				 $idUsuario = $this->pdo->lastInsertId();

				 
	            /* Registramos la Pyme */
	            $sql = "INSERT INTO pyme(NombreComercio,EstadoID, SectorID, AnnoInicioOperaciones,NumeroTelefono,Direccion,EsActiva,EsNegocioFamiliar,FechaCreacion,FechaUltimaActualizacion,EsFacebookAppInstalado,UsuarioID,GeneroPropietarioID,CedJuridica) 
	            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	            $this->pdo->prepare($sql)
	                      ->execute(
	                        array(
	                            $miPyme['NombreComercio'],
	                            $miPyme['EstadoID'],
	                            $miPyme['SectorID'],
	                            $miPyme['AnnoInicioOperaciones'],
	                            $miPyme['NumeroTelefono'],
	                            $miPyme['Direccion'],
	                            $EsActiva,
	                            $EsNegocioFamiliar,
	                            $fecha,
	                            $fecha,
	                            $FaceInsta,	
	                            $idUsuario,
	                            $miPyme['GeneroPropietarioID'],
	                            $miPyme['CedJuridica']

	                        ));
   
	            
	            return true;
			}
	        catch (Exception $e) 
			{
				return false;
			}
		}
	}



	/*public static $tablename = "pyme";//nombre de la tabla



	public function pyme(){//constructor
		$this->id = "";
		$this->nombreComercio = "";
		$this->estadoID = "";
		$this->sectorID = "";
		$this->annoInicioOperaciones = "";
		$this->numeroTelefono = "";
		$this->direccion = "";
		$this->esActiva = "";
		$this->esNegocioFamiliar = "";
		$this->logo = "";
		$this->extensionLogo = "";
		$this->fechaCreacion = "";
		$this->fechaUltimaActualizacion = "";
		$this->esFacebookAppInstalado = "";
		$this->usuarioID = "";
		$this->generoPropietarioID = "";
		$this->cedJuridica = "";
	}

	public function add(){//crea un nueva pyme
	 try
		{
			$this->estado = 1;//activa la pyme a insertar
			$sql = "insert into ".self::$tablename." (NombreComercio, EstadoID, SectorID, AnnoInicioOperaciones, NumeroTelefono, Direccion, EsActiva, EsNegocioFamiliar, Logo, ExtensionLogo, FechaCreacion, FechaUltimaActualizacion,
			UsuarioID, GeneroPropietarioID, CedJuridica ) ";
			$sql .= "value (\"$this->nombreComercio\", \"$this->estadoID\", \"$this->sectorID\", \"$this->annoInicioOperaciones\",
			\"$this->numeroTelefono\", \"$this->direccion\", \"$this->esActiva\", \"$this->esNegocioFamiliar\",
		    \"$this->logo\", \"$this->extensionLogo\", \"$this->fechaCreacion\", \"$this->fechaUltimaActualizacion\",
		    \"$this->esFacebookAppInstalado\", \"$this->usuarioID\", \"$this->generoPropietarioID\", \"$this->cedJuridica\")";
			Executor::doit($sql);
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


	public function delete($id){//elimina un pyme, cambia el estado a 0
	 try
	    {
			$sql = "update ".self::$tablename." set Estado = 0 where Id = $id";
			Executor::doit($sql);
	  	}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


	public static function getById($id){//consulta un pyme especifica
	 try
	    {
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new pyme();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->id = $r['Id'];
				$data->nombreComercio = $r['NombreComercio'];
				$data->estadoID = $r['EstadoID'];
				$data->sectorID = $r['SectorID'];
				$data->annoInicioOperaciones = $r['AnnoInicioOperaciones'];
				$data->numeroTelefono = $r['NumeroTelefono'];
				$data->direccion = $r['Direccion'];
				$data->esActiva = $r['EsActiva'];
				$data->esNegocioFamiliar = $r['EsNegocioFamiliar'];
				$data->logo = $r['Logo'];
				$data->extensionLogo = $r['ExtensionLogo'];
				$data->fechaCreacion = $r['FechaCreacion'];
				$data->fechaUltimaActualizacion = $r['FechaUltimaActualizacion'];
				$data->usuarioID = $r['UsuarioID'];
				$data->generoPropietarioID = $r['GeneroPropietarioID'];
				$data->cedJuridica = $r['CedJuridica'];
				$found = $data;
				break;
			}
			return $found;
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}



	public static function getAll(){//consulta todos los pymes
	  try
	    {
			$sql = "select Id , Nombre  from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new pyme();

				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombreComercio = $r['NombreComercio'];
				$array[$cnt]->estadoID = $r['EstadoID'];
				$array[$cnt]->sectorID = $r['SectorID'];
				$array[$cnt]->annoInicioOperaciones = $r['AnnoInicioOperaciones'];
				$array[$cnt]->numeroTelefono = $r['NumeroTelefono'];
				$array[$cnt]->direccion = $r['Direccion'];
				$array[$cnt]->esActiva = $r['EsActiva'];
				$array[$cnt]->esNegocioFamiliar = $r['EsNegocioFamiliar'];
				$array[$cnt]->logo = $r['Logo'];
				$array[$cnt]->extensionLogo = $r['ExtensionLogo'];
				$array[$cnt]->fechaCreacion = $r['FechaCreacion'];
				$array[$cnt]->fechaUltimaActualizacion = $r['FechaUltimaActualizacion'];
				$array[$cnt]->fechaUltimaActualizacion = $r['FechaUltimaActualizacion'];
				$array[$cnt]->usuarioID = $r['UsuarioID'];
				$array[$cnt]->generoPropietarioID = $r['GeneroPropietarioID'];
				$array[$cnt]->cedJuridica = $r['CedJuridica'];

				$cnt++;
			}
			return $array;
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


	public static function getLike($q){//busca un pyme por nombre
	 try
	    {
			$sql = "select * from ".self::$tablename." where NombreComercio like '%$q%'";
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new pyme();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombreComercio = $r['NombreComercio'];
				$array[$cnt]->estadoID = $r['EstadoID'];
				$array[$cnt]->sectorID = $r['SectorID'];
				$array[$cnt]->annoInicioOperaciones = $r['AnnoInicioOperaciones'];
				$array[$cnt]->numeroTelefono = $r['NumeroTelefono'];
				$array[$cnt]->direccion = $r['Direccion'];
				$array[$cnt]->esActiva = $r['EsActiva'];
				$array[$cnt]->esNegocioFamiliar = $r['EsNegocioFamiliar'];
				$array[$cnt]->logo = $r['Logo'];
				$array[$cnt]->extensionLogo = $r['ExtensionLogo'];
				$array[$cnt]->fechaCreacion = $r['FechaCreacion'];
				$array[$cnt]->fechaUltimaActualizacion = $r['FechaUltimaActualizacion'];
				$array[$cnt]->fechaUltimaActualizacion = $r['FechaUltimaActualizacion'];
				$array[$cnt]->usuarioID = $r['UsuarioID'];
				$array[$cnt]->generoPropietarioID = $r['GeneroPropietarioID'];
				$array[$cnt]->cedJuridica = $r['CedJuridica'];
				$cnt++;
			}
			return $array;
	    }
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}*/


?>

