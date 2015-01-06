<?php

session_start();
$UserAct = $_SESSION['usuario'];
include '../Modelo/conexion.php';

$Form = $_POST['formulario'];
                                                  
    $conect = new conexion();
    
    $On_Form = $conect->consulta("UPDATE formulario SET ESTADO_FORM = 'Habilitado' WHERE NOMBRE_FORM = '$Form' AND NOMBRE_U = '$UserAct'");
    $Off_Form = $conect->consulta("UPDATE formulario SET ESTADO_FORM = 'Deshabilitado' WHERE NOMBRE_FORM <> '$Form' AND NOMBRE_U = '$UserAct'");
    
    if($On_Form and $Off_Form) 
    {

        echo '<script>alert("El formulario esta habilitado para su uso");</script>';
        echo '<script>location.reload();</script>';
      
    }
    
    
    
?>
