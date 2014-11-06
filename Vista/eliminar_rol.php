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

$delRol = $_GET['id_us'];

//Peticion
$peticion = mysql_query ("DELETE FROM rol WHERE ROL_R='".$delRol."'");
//cerrar conexion--------------------------
 mysql_close($conexion);
 //volver a la pagina---------------
 echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=add_roles.php">
	</head>
</html>

';
?>