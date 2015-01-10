<?php
    include '../Modelo/conexion.php';
    $conectar = new conexion();
    session_start();


$usuario= $_SESSION['usuario'];
$contrasena= $_SESSION['contrasena'];

$delActiv = 0;

//Peticion
$peticion = $conectar->consulta("DELETE FROM `sesion` WHERE 1");
//cerrar conexion--------------------------

 //volver a la pagina---------------
 echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=bitacora_ingreso.php">
	</head>
</html>';
?>

