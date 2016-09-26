<?php
include("conexion.php");


$nomUsuario=$_POST['nombreUsuario'];
$nomCome=$_POST['nombreComercial'];
$listaPais=$_POST['listaPais'];
$contra=$_POST['contraseña'];

$consulUsu="SELECT * 
    FROM usuario
    WHERE Usuario='{$nomUsuario}' and Clave='{$contra}'";
   


$respU=$conex->query($consulUsu);

if($usu=$respU->fetch_assoc()){

	$consulC="SELECT * from pyme where NombreComercio ='{$nomCome}'";
	var_dump($consulC);
	$respC=$conex->query($consulC);
	if($come=$respC->fetch_assoc()){
		$consulP="SELECT * from Pais where Id={$listaPais}";
		var_dump($consulP);
		$respP=$conex->query($consulP);
		if($pais=$respP->fetch_assoc()){
			header("location: view/PanelMetrica/panelMetricas.html");
		}
		else{
			require_once 'view/header.php';
			require_once 'view/Login/index.php';
			require_once 'view/footer.php';
			echo "<script>alert('Usuario o Comercio NO exixte Favor verificar la Información')</script>";
		}
	}else{
		require_once 'view/header.php';
		require_once 'view/Login/index.php';
		require_once 'view/footer.php';
		echo "<script>alert('Usuario o Comercio NO exixte Favor verificar la Información')</script>";
	}
	
}else{
	require_once 'view/header.php';
	require_once 'view/Login/index.php';
	require_once 'view/footer.php';
	echo "<script>alert('Usuario o Comercio NO exixte Favor verificar la Información')</script>";

}

?>