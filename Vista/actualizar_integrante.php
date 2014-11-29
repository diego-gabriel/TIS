<?php

session_start();

//Crear variables--------------------------


$usuario=$_SESSION['usuario'];


$updLogin = $_POST['login'];
$updPassword = $_POST['password'];
$updNombre = $_POST['nombre'];
$updApellido = $_POST['apellido'];
$updTelefono = $_POST['telefono'];
$updEmail= $_POST['email'];
//conexion-------------
$conexion = mysql_connect("localhost","root","");
//Control
if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
//Seleccion
mysql_select_db("saetis",$conexion);
//Peticion
//Peticion------------------------------------------
mysql_query("UPDATE usuario SET NOMBRE_U='$updLogin',PASSWORD_U='$updPassword',TELEFONO_U='$updTelefono',CORREO_ELECTRONICO_U='$updEmail'
WHERE  NOMBRE_U='$updLogin'");
mysql_query("UPDATE administrador SET NOMBRE_U='$updLogin',NOMBRES_AD='$updNombre',APELLIDOS_AD='$updApellido'
WHERE  NOMBRE_U='$updLogin'");
mysql_query("UPDATE usuario_rol SET NOMBRE_U='$updLogin'
WHERE  NOMBRE_U='$updLogin'");


echo"<script type=\"text/javascript\">alert('el registro se realizo exitosamente'); window.location='principal.php';</script>";
mysql_close($conexion);
 
?>