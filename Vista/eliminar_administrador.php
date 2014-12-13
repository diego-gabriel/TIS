<?php
include '../Modelo/conexion.php';
$conect = new conexion();
session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$idgp = $_GET['id_us'];

//conexion-------------
	
	//Peticion
	$peticion =$conect->consulta (" DELETE FROM `usuario_rol` WHERE NOMBRE_U ='$idgp'");
	$peticion =$conect->consulta(" DELETE FROM `administrador` WHERE NOMBRE_U ='$idgp'");
	$peticion1 = $conect->consulta(" DELETE FROM `usuario` WHERE NOMBRE_U='$idgp'");
	//cerrar conexion--------------------------
	 //mysql_close($conexion);
	 //volver a la pagina---------------
         
         
         echo '<script>alert("Se elimino al administrador correctamente");</script>';
         echo '<script>window.location="../Vista/lista_administradores.php";</script>';
	
 
?>