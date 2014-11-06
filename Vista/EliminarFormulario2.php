<?php

$formulario = $_POST['EscogidoEliminar'];

include '../Modelo/conexion.php';
                                                  
    $conect = new conexion();
    
    $resutado = $conect->consulta("DELETE FROM formulario WHERE Name_Form = '$formulario'");
    
    if($resutado) 
    {
        echo '<script>alert("Se elimino el formulario Correctamente")</script>';
        echo '<script>location.reload()</script>';
    }
    
?>
