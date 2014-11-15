<?php

session_start();
$UsuarioActivo = $_SESSION['usuario'];


include '../Modelo/conexion.php';

$formulario = $_POST['formulario'];
                                                  
    $conect = new conexion();
    
    $resutado = $conect->consulta("UPDATE formulario SET ESTADO_FORM = 'Habilitado' WHERE NOMBRE_FORM = '$formulario' AND NOMBRE_U = '$UsuarioActivo'");
    $resultado2 = $conect->consulta("UPDATE formulario SET ESTADO_FORM = 'Deshabilitado' WHERE NOMBRE_FORM <> '$formulario' AND NOMBRE_U = '$UsuarioActivo'");
    
    if($resutado and $resultado2) 
    {
        echo '<script>
                BootstrapDialog.show({
                    title: "Habilitacion de Formulario",
                    message: "El formulario esta habilitado para su uso",
                    onhide: function(dialogRef){
                        location.reload();
                    }
                });
              </script>';
    }
    
    
    
?>
