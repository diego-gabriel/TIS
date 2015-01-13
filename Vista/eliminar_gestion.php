<?php
    include '../Modelo/conexion.php';
    $conectar = new conexion();
    session_start();
    $codigo='';

//Crear variables--------------------------

$usuario= $_SESSION['usuario'];
$contrasena= $_SESSION['contrasena'];

$delRol = $_GET['id_us'];
$peticion1 = $conectar-> consulta("SELECT CODIGO_P FROM proyecto WHERE ID_G='".$delRol."'");
        while ($codp = mysql_fetch_array($peticion1))
        {        
        $codigo=$codp["CODIGO_P"];      
        }
        $peticion2 = $conectar-> consulta("DELETE FROM proyecto WHERE CODIGO_P ='".$codigo."' AND ID_G ='".$delRol."'");
        $peticion3 = $conectar-> consulta("DELETE FROM gestion WHERE ID_G='".$delRol."'");

         echo'
        <html>
                <head>
                        <meta http-equiv="REFRESH" content="0;url=add_gestion.php">
                </head>
        </html>';
?>