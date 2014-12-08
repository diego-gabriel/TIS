<?php
session_start();

    $name = $_POST['nombreUsuario'];
    $RealName = $_POST['nombreReal'];
    $password = $_POST['password'];
    $emailUsuario = $_POST['email'];
    $apellidoUsuario = $_POST['apellido'];
    $telefonoUsuario = $_POST['telefono'];


$updLogin=$_SESSION['usuario'];



//conexion-------------
$conexion = mysql_connect("localhost","root","");
//Control
if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
//Seleccion
mysql_select_db("saetis",$conexion);
//Peticion
//Peticion------------------------------------------
mysql_query("UPDATE usuario SET NOMBRE_U='$updLogin',PASSWORD_U='$password',TELEFONO_U='$telefonoUsuario',CORREO_ELECTRONICO_U='$emailUsuario'
WHERE  NOMBRE_U='$updLogin'");
mysql_query("UPDATE asesor SET NOMBRE_U='$updLogin',NOMBRES_A='$RealName',APELLIDOS_A='$apellidoUsuario'
WHERE  NOMBRE_U='$updLogin'");
mysql_query("UPDATE usuario_rol SET NOMBRE_U='$updLogin'
WHERE  NOMBRE_U='$updLogin'");


echo"<script type=\"text/javascript\">alert('Se modificaron los datos satisfactoriamente'); window.location='inicio_asesor.php';</script>";
mysql_close($conexion);


   
 
   
?>
