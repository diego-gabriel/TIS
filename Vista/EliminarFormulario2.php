<?php

session_start();
$UsuarioActual = $_SESSION['usuario'];

$formulario = $_POST['EscogidoEliminar'];


include '../Modelo/conexion.php';

    $conect = new conexion();

    $VerificarNota = $conect->consulta("SELECT * FROM nota WHERE ID_FORM = '$formulario'");

    $VerifNota = mysql_fetch_row($VerificarNota);

    if(is_array($VerifNota))
    {
        
        echo    '<script>
                                BootstrapDialog.show({
                                    
                                     message: "El formulario esta siendo usado y no puede ser eliminado",
                                     onhide: function(dialogRef){
                                        location.reload();
                                    }
                                });
                            </script>';

    
    }
    else{

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

    }
  
?>
