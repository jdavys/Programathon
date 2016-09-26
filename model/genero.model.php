<?php
class genero {
	public static $tablename = "genero";//nombre de la tabla



	public function genero(){//constructor
		$this->id = "";
		$this->nombre = "";
	}

	public function add(){//crea un nuevo estado
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



	public static function getById($id){//consulta un genero
	  try
		{
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new genero();

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



	public static function getAll(){//consulta todos los generos
	 try
		{
			$sql = "select Id , Nombre from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new genero();
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


}//fin class

?>