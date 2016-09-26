<?php
$servidor="localhost";
$dbuser="root";
$dbpassword="";
$dbnombre="programathon2016";

$conex = new mysqli($servidor,$dbuser,$dbpassword,$dbnombre);
if($conex->connect_errno>0){
		die("No se pudo conectar con la base de datos ".$conex->connect_error."");
	}
mysql_query("SET NAMES 'utf8'");
?>