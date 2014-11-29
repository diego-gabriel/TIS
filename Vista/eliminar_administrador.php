<?php

session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$idgp = $_GET['id_us'];


//conexion-------------
	$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
	//Peticion
	$peticion = mysql_query(" DELETE FROM `usuario_rol` WHERE NOMBRE_U ='$idgp'");
	$peticion = mysql_query(" DELETE FROM `administrador` WHERE NOMBRE_U ='$idgp'");
	$peticion1 = mysql_query(" DELETE FROM `usuario` WHERE NOMBRE_U='$idgp'");
	//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=lista_administradores.php">
		</head>
	</html>

	';

 
?>