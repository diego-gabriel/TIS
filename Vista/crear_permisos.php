<?php

session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$addNomMenu = $_POST['id_menu'];
$addasesor = $_POST['id_rol'];


//conexion-------------
	$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
	//Peticion
	$peticion = mysql_query("INSERT INTO `saetis`.`permisos` (`ROL_R`, `id_permiso`, `menu_id_menu`) VALUES ('$addasesor',NULL, '$addNomMenu');");
	//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=lista_roles.php">
		</head>
	</html>

	';

 
?>