<?php

session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$rolAnt=$_SESSION["Variable1"];
$idgp=$_SESSION["Variable2"];
$permiso = $_REQUEST['estado'];
$rol =$_REQUEST['roll'];


//conexion-------------
	$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
	//Peticion
	$peticion = mysql_query( "UPDATE usuario SET ESTADO_E = '$permiso' WHERE usuario.NOMBRE_U = '$idgp';");
        $peticion = mysql_query( "UPDATE usuario_rol SET ROL_R = '$rol' WHERE usuario_rol.NOMBRE_U = '$idgp ' AND usuario_rol.ROL_R = '$rolAnt';");
	//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=asignar_permisos.php">
		</head>
	</html>

	';


?>