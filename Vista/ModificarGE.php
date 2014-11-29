<?php
    include '../Modelo/conexion.php';
    $conect = new conexion();
    session_start();

    $conect = new conexion();
    $nombreUGE = $_SESSION['usuario'];
    
    $correoGE = $_POST['correo'];
    $telefonoGE = $_POST['telefono'];
    $direccionGE = $_POST['direccion'];
    $contrasenaGE = $_POST['contrasena1'];

    $conect->consulta(" UPDATE usuario SET PASSWORD_U='$contrasenaGE', TELEFONO_U='$telefonoGE', CORREO_ELECTRONICO_U='$correoGE' WHERE NOMBRE_U = '$nombreUGE'");
    $conect->consulta(" UPDATE grupo_empresa SET DIRECCION_GE='$direccionGE' WHERE NOMBRE_U = '$nombreUGE'");
                      
    echo"<script type=\"text/javascript\">alert('Se modificaron los datos satisfactoriamente'); window.location='ModificarGrupoEmpresa.php';</script>";
         
?>