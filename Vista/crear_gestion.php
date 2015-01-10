<?php
include '../Modelo/conexion.php';
$conectar = new conexion();
session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$addini = $_POST['ini'];
$addfin = $_POST['fin'];
$addRol = $_POST['rol'];

//conexion-------------

	//Peticion
	$peticion = $conectar->consulta("INSERT INTO `gestion` (`ID_G`, `NOM_G`, `FECHA_INICIO_G`, `FECHA_FIN_G`) VALUES (NULL, '$addRol', '$addini', '$addfin')");
	//cerrar conexion--------------------------
	 
	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=add_gestion.php">
		</head>
	</html>';
 
?>