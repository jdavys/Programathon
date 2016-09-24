<?php
class sector {
	public static $tablename = "Usuario";//nombre de la tabla



	public function sector(){//constructor
		$this->Id = "";
		$this->NombreCompleto = "";
	}

	public function add(){//crea un nuevo sector
		try {
			$sql = "insert into ".self::$tablename." (NombreCompleto) ";
			$sql .= "value (\"$this->nombreCompleto\")";
			Executor::doit($sql);
		} catch (Exception $e) {
			die($e->getMessage());
		}
		

	}


	public function delete($id){//elimina un sector
		try {
			$sql = "delete from ".self::$tablename." where Id = $id";
			Executor::doit($sql);
		} catch (Exception $e) {
			die($e->getMessage());
		}
		
	}


	public static function getById($id){//consulta un sector
		try {
			$sql = "select * from ".self::$tablename." where Id = $id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new Usuario();

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$data->id = $r['Id'];
				$data->name = $r['NombreCompleto'];
				$found = $data;
				break;
			}
			return $found;
			
		} catch (Exception $e) {
			
		}
		
	}



	public static function getAll(){//consulta todos los sectores
		try {
			$sql = "select id , NombreCompleto  from ".self::$tablename;
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new sector();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->nombre = $r['NombreCompleto'];
				$cnt++;
			}
			return $array;
		} catch (Exception $e) {
			die($e->getMessage());
		}
		
	}


	public static function getLike($q){//busca un sector por nombre
		try {
			$sql = "select * from ".self::$tablename." where NombreCompleto like '%$q%'";
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;

			while($r = $query[0]->fetch_array()){//devuelve informacion
				$array[$cnt] = new sector();
				$array[$cnt]->id = $r['Id'];
				$array[$cnt]->name = $r['NombreCompleto'];
				$cnt++;
			}
			return $array;
		} catch (Exception $e) {
			die($e->getMessage());
		}
		
	}
}

?>