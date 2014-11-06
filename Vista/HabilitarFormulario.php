<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$formulario = $_POST['formulario'];

include '../Modelo/conexion.php';
                                                  
    $conect = new conexion();
    
    $resutado = $conect->consulta("UPDATE formulario SET Form_Estado = 'Habilitado' WHERE Name_Form = '$formulario'");
    $resultado2 = $conect->consulta("UPDATE formulario SET Form_Estado = 'Inhabilitado' WHERE Name_Form <> '$formulario'");
    
    if($resutado and $resultado2) 
    {
        echo '<script>
                BootstrapDialog.show({
                    title: "Habilitacion de Formulario",
                    message: "El formulario esta habilitado para su uso"
                });
              </script>';
    }
    
    
    
?>
