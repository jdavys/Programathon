<?php
class Database {
<<<<<<< HEAD
	/*public static $db;
=======
	public static $db;
>>>>>>> c2210e6ce09c147ad49e4e7b5674d1ce6ea17670
	public static $con;
	function Database(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="inventiolite";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
<<<<<<< HEAD
	}*/

	public static function Conectar()
	{
	    $pdo = new PDO('mysql:host=localhost;dbname=facturadorP;charset=utf8', 'root', '');
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	    return $pdo;
=======
>>>>>>> c2210e6ce09c147ad49e4e7b5674d1ce6ea17670
	}
	
}
?>
