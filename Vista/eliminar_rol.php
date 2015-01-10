<?php
    include '../Modelo/conexion.php';
    $conectar = new conexion();
    session_start();


$usuario= $_SESSION['usuario'];
$contrasena= $_SESSION['contrasena'];

$delRol = $_GET['id_us'];

//Peticion
$peticion = $conectar->consulta("DELETE FROM rol WHERE ROL_R='".$delRol."'");
//cerrar conexion--------------------------

 //volver a la pagina---------------
 echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=add_roles.php">
	</head>
</html>';
?>