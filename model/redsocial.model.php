<?php
class redSocial {
	public static $tablename = "redsocial";//nombre de la tabla



	public function redSocial(){//constructor
		$this->tipoRedSocialID = "";
		$this->comentario = "";
		$this->informacionContacto = "";
		$this->pymeID = "";
		$this->link = "";
	}

	public function add(){//crea un nuevo red social
	 try
	    {
			$sql = "insert into ".self::$tablename." (TipoRedSocialID, Comentario, InformacionContacto, PymeID, Link) ";
			$sql .= "value (\"$this->tipoRedSocialID\", \"$this->comentario\", \"$this->informacionContacto\", 
			\"$this->pymeID\", \"$this->link\")";
			Executor::doit($sql);
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


	public function delete($id){//elimina un red social
	 try
	    {
			$sql = "delete from ".self::$tablename." where TipoRedSocialID = $tipoRedSocialID and PymeID = $pymeID";
			Executor::doit($sql);
		}
	 catch(Exception $e)
	    {
			die($e->getMessage());
		}
	}


	public static function getById($id){//consulta un red social
	  try
	    {
			$sql = "select * from ".self::$tablename." where TipoRedSocialID = $tipoRedSocialID and PymeID = $pymeID";
			$query = Executor::doit($sql);
			$found = null;
			$data = new redsocial();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->tipoRedSocialID = $r['TipoRedSocialID'];
				$data->comentario = $r['Comentario'];
				$data->informacionContacto = $r['InformacionContacto'];
				$data->pymeID = $r['PymeID'];
				$data->link = $r['Link'];
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



	public static function getAll(){//consulta todos los red social
	  try
	    {
			$sql = "select  TipoRedSocialID, Comentario, InformacionContacto, PymeID, Link  from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new redsocial();
				$array[$cnt]->tipoRedSocialID = $r['TipoRedSocialID'];
				$array[$cnt]->comentario = $r['Comentario'];
				$array[$cnt]->informacionContacto = $r['InformacionContacto'];
				$array[$cnt]->pymeID = $r['PymeID'];
				$array[$cnt]->link = $r['Link'];
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