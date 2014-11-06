<?php

session_start();

//conexion-------------
$conexion = mysql_connect("localhost","root","","saetis");
//Control
if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
//Seleccion
mysql_select_db("saetis",$conexion);
//Crear variables--------------------------

$usuario= $_SESSION['usuario'];
$contrasena= $_SESSION['contrasena'];

$delActiv = 0;

//Peticion
$peticion = mysql_query ("DELETE FROM `sesion` WHERE 1");
//cerrar conexion--------------------------
 mysql_close($conexion);
 //volver a la pagina---------------
 echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=bitacora_ingreso.php">
	</head>
</html>

';
?>

