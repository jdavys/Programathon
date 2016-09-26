<?php
class usuario {
	public static $tablename = "usuario";//nombre de la tabla



	public function usuario(){//constructor
		$this->id = "";
		$this->nombreCompleto = "";
		$this->clave = "";
		$this->emailContacto = "";
	}

	public function add(){//crea un nuevo estado
	 try
		{
			$sql = "insert into ".self::$tablename." (NombreCompleto, Clave, EmailContacto) ";
			$sql .= "value (\"$this->nombreCompleto\", \"$this->clave\", \"$this->emailContacto\")";
			Executor::doit($sql);
		}
	 catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



	public static function getById($id){//consulta un usuario
	  try
		{
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new usuario();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->id = $r['Id'];
				$data->nombreCompleto = $r['NombreCompleto'];
				$data->clave = $r['Clave'];
				$data->emailContacto = $r['EmailContacto'];
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



	public static function getAll(){//consulta todos los usuarios
	 try
		{
			$sql = "select Id , Nombre, Clave, EmailContacto from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new usuario();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombreCompleto = $r['NombreCompleto'];
				$array[$cnt]->clave = $r['Clave'];
				$array[$cnt]->emailContacto = $r['EmailContacto'];
				$cnt++;
			}
			return $array;
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


	public static function getLike($q){//busca un usuario por nombre
	 try
		{
			$sql = "select * from ".self::$tablename." where NombreCompleto like '%$q%'";
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new usuario();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombreCompleto = $r['NombreCompleto'];
				$array[$cnt]->clave = $r['Clave'];
				$array[$cnt]->emailContacto = $r['EmailContacto'];
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