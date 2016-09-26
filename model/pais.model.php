<?php
class pais {
	public static $tablename = "pais";//nombre de la tabla



	public function pais(){//constructor
		$this->id = "";
		$this->nombre = "";
		$this->iso = "";
		$this->iso3 = "";
		$this->codigoNumerico = "";
		$this->codigoTelefono = "";
	}

	public function add(){//crea un nuevo pais
	 try
		{
			$sql = "insert into ".self::$tablename." (Nombre, Iso, Iso3, CodigoNumerico, CodigoTelefono ) ";
			$sql .= "value (\"$this->nombre\", \"$this->iso\", \"$this->iso3\", \"$this->codigoNumerico\", \"$this->codigoTelefono\")";
			Executor::doit($sql);
		}
	 catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function delete($id){//elimina un pais
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


	public static function getById($id){//consulta un pais
	  try
		{
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new pais();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->id = $r['Id'];
				$data->nombre = $r['Nombre'];
				$data->iso = $r['Iso'];
				$data->iso3 = $r['Iso3'];
				$data->codigoNumerico = $r['CodigoNumerico'];
				$data->codigoTelefono = $r['CodigoTelefono'];
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



	public static function getAll(){//consulta todos los paises
	 try
		{
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new pais();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombre = $r['Nombre'];
				$array[$cnt]->iso = $r['Iso'];
				$array[$cnt]->iso3 = $r['Iso3'];
				$array[$cnt]->codigoNumerico = $r['CodigoNumerico'];
				$array[$cnt]->codigoTelefono = $r['CodigoTelefono'];
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