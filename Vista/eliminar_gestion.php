<?php
   include '../Modelo/conexion.php';
    $conectar = new conexion();
session_start();


//Crear variables--------------------------

$usuario= $_SESSION['usuario'];
$contrasena= $_SESSION['contrasena'];

$delRol = $_GET['id_us'];

//Peticion
$peticion = $conectar-> consulta("DELETE FROM gestion WHERE ID_G='".$delRol."'");
//cerrar conexion--------------------------

 //volver a la pagina---------------
 echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=add_gestion.php">
	</head>
</html>

';
?>