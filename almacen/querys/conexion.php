<?php
function conectar()
{
	$host="localhost";
	$usuario="root";
	$pass="";
	$bd="almacenminibaja";
	$conexion=mysqli_connect($host,$usuario,$pass);
	mysqli_select_db($conexion,$bd);
	return $conexion;
	//echo "window.location.replace(index.php);";
}
?>