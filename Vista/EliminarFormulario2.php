<?php

$formulario = $_POST['EscogidoEliminar'];

include '../Modelo/conexion.php';
                                                  
    $conect = new conexion();
    
    $EliminarCE = $conect->consulta("DELETE FROM form_crit_e WHERE ID_FORM = '$formulario'");

    $EliminarCC = $conect->consulta("DELETE FROM from_crit_c WHERE ID_FORM = '$formulario'");

    $EliminarPuntaje = $conect->consulta("DELETE FROM puntaje WHERE ID_FORM = '$formulario'");

    $EliminarFormulario = $conect->consulta("DELETE FROM formulario WHERE ID_FORM = '$formulario'");
    
    if($EliminarCE and $EliminarCC and $EliminarPuntaje and $EliminarFormulario) 
    {

    	
        echo    '<script>
                                BootstrapDialog.show({
                                    
                                     message: "Se elimino el formulario correctamente",
                                     onhide: function(dialogRef){
                                        location.reload();
                                    }
                                });
                            </script>';
 
        
    }
    
?>
