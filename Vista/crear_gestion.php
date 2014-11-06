<?php

session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$addini = $_POST['ini'];
$addfin = $_POST['fin'];
$addRol = $_POST['rol'];

//conexion-------------
	$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
	//Peticion
	$peticion = mysql_query("INSERT INTO `saetis`.`gestion` (`ID_G`, `NOM_G`, `FECHA_INICIO_G`, `FECHA_FIN_G`) VALUES (NULL, '$addRol', '$addini', '$addfin')");
	//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=add_gestion.php">
		</head>
	</html>

	';
 
?>