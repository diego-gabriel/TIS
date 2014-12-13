<?php

session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
   include '../Modelo/conexion.php';
    $conectar = new conexion();

$rolAnt=$_SESSION["Variable1"];
$idgp=$_SESSION["Variable2"];
$permiso = $_REQUEST['estado'];
$rol =$_REQUEST['roll'];


//conexion-------------

	//Peticion
	$peticion = $conectar-> consulta( "UPDATE usuario SET ESTADO_E = '$permiso' WHERE usuario.NOMBRE_U = '$idgp';");
        $peticion = $conectar-> consulta( "UPDATE usuario_rol SET ROL_R = '$rol' WHERE usuario_rol.NOMBRE_U = '$idgp ' AND usuario_rol.ROL_R = '$rolAnt';");
	//cerrar conexion--------------------------

	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=asignar_permisos.php">
		</head>
	</html>

	';


?>