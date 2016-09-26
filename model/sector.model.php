<?php
class sector {
	public static $tablename = "sector";//nombre de la tabla

	public function sector(){//constructor

		$this->id = "";
		$this->nombre = "";
	}

	public function add(){//crea un nuevo sector
	 try
		{
			$sql = "insert into ".self::$tablename." (Nombre) ";
			$sql .= "value (\"$this->nombre\")";
			Executor::doit($sql);
		}
	 catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function delete($id){//elimina un sector
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


	public static function getById($id){//consulta un sector
	 try
		{
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new sector();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->id = $r['Id'];
				$data->nombre = $r['Nombre'];
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