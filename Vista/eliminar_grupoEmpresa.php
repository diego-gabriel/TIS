<?php
    include '../Modelo/conexion.php';
    $conectar = new conexion();
    session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$idgp = $_GET['id_us'];



	$peticion = $conectar->consulta(" DELETE FROM `socio` WHERE CODIGO_S='$idgp'
													");
	//cerrar conexion--------------------------
	
	 //volver a la pagina---------------
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=lista_grupoEmpresa.php">
		</head>
	</html>';

 
?>