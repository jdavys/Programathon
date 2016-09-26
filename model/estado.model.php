<?php
class estado {
	public static $tablename = "estado";//nombre de la tabla



	public function estado(){//constructor
		$this->id = "";
		$this->nombre = "";
		$this->paisID = "";
	}

	public function add(){//crea un nuevo estado
	 try
		{
			$sql = "insert into ".self::$tablename." (Nombre, PaisID) ";
			$sql .= "value (\"$this->nombre\", \"$this->paisID\")";
			Executor::doit($sql);
		}
	 catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function delete($id){//elimina un estado
	 try
		{
			$sql = "delete from ".self::$tablename." where Id = $id";
			Executor::doit($sql);
		}
	 catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public static function getById($id){//consulta un estado
	  try
		{
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new sector();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->id = $r['Id'];
				$data->nombre = $r['Nombre'];
				$data->paisID = $r['PaisID']; 
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



	public static function getAll(){//consulta todos los sectores
	 try
		{
			$sql = "select Id , Nombre  from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new sector();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombre = $r['Nombre'];
				$array[$cnt]->paisID = $r['PaisID'];
				$cnt++;
			}
			return $array;
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


	public static function getLike($q){//busca un sector por nombre
	 try
		{
			$sql = "select * from ".self::$tablename." where Nombre like '%$q%'";
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new sector();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombre = $r['Nombre'];
				$array[$cnt]->paisID = $r['PaisID'];
				$cnt++;
			}
			return $array;
	    }
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}
}

?>