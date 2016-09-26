<?php
class respuesta {
	public static $tablename = "respuesta";//nombre de la tabla



	public function respuesta(){//constructor
		$this->id = "";
		$this->respuesta01 = "";
		$this->respuesta02 = "";
		$this->respuesta03 = "";
		$this->respuesta04 = "";
		$this->respuesta05 = "";
		$this->fechaRespuesta = "";
		$this->generoID = "";
		$this->campo01 = "";
		$this->campo02 = "";
		$this->rangoEdad = "";
		$this->pymeID = "";
	}

	public function add(){//crea un nuevo estado
	 try
		{
			$sql = "insert into ".self::$tablename." (Respuesta01, Respuesta02, Respuesta03, Respuesta04,
				Respuesta05, FechaRespuesta, GeneroID, Campo01, Campo02, RangoEdad, PymeID) ";
			$sql .= "value (\"$this->id\", \"$this->respuesta01\", \"$this->respuesta02\", \"$this->respuesta03\", 
			\"$this->respuesta04\", \"$this->re5puesta05\", \"$this->fechaRespuesta\", \"$this->generoID\" ,
			\"$this->campo01\", \"$this->campo02\", \"$this->rangoEdad\",, \"$this->pymeID\",)";
			Executor::doit($sql);
		}
	 catch(Exception $e)
		{
			die($e->getMessage());
		}
	}




	public static function getById($id){//consulta un respuesta
	  try
		{
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new respuesta();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->id = $r['Id'];
				$data->respuesta01 = $r['Respuesta01'];$data->id = $r['Id'];
				$data->respuesta02 = $r['Respuesta02'];
				$data->respuesta03 = $r['Respuesta03'];
				$data->respuesta04 = $r['Respuesta04'];
				$data->respuesta05 = $r['Respuesta05'];
				$data->FechaRespuesta = $r['fechaRespuesta'];
				$data->generoID = $r['GeneroID'];
				$data->campo01 = $r['Campo01'];
				$data->campo02 = $r['Campo02'];
				$data->rangoEdad = $r['RangoEdad'];
				$data->pymeID = $r['PymeID'];

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



	public static function getAll(){//consulta todos las encuestas
	 try
		{
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new respuesta();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->respuesta01 = $r['Respuesta01'];
				$array[$cnt]->respuesta02 = $r['Respuesta02'];
				$array[$cnt]->respuesta03 = $r['Respuesta03'];
				$array[$cnt]->respuesta04 = $r['Respuesta04'];
				$array[$cnt]->respuesta05 = $r['Respuesta05'];
				$array[$cnt]->fechaRespuesta = $r['FechaRespuesta'];
				$array[$cnt]->generoID = $r['GeneroID'];
				$array[$cnt]->campo01 = $r['Campo01'];
				$array[$cnt]->campo02 = $r['Campo02'];
				$array[$cnt]->rangoEdad = $r['RangoEdad'];
				$array[$cnt]->pymeID = $r['PymeID'];

				$cnt++;
			}
			return $array;
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


}//fin class

?>