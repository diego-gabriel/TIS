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

$delActiv = $_GET['id_us'];
$rol = mysql_query("SELECT ROL_R
FROM usuario_rol 
WHERE  NOMBRE_U = '$usuario' ");
//Peticion
$peticion = mysql_query ("DELETE FROM sesion WHERE grupo_empresa.NOMBRE_U = '$delActiv'");
$peticion = mysql_query ("DELETE FROM asesor WHERE asesor.NOMBRE_U ='$delActiv'");
$peticion = mysql_query ("DELETE FROM usuario_rol WHERE usuario_rol.NOMBRE_U ='$delActiv' AND usuario_rol.ROL_R ='$rol'");
$peticion = mysql_query ("DELETE FROM usuario WHERE usuario.NOMBRE_U = '$delActiv'");
$peticion = mysql_query ("DELETE FROM grupo_empresa WHERE grupo_empresa.NOMBRE_U = '$delActiv'");
//cerrar conexion--------------------------
 mysql_close($conexion);
 //volver a la pagina---------------
 echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=lista_usuarios.php">
	</head>
</html>

';
?>

