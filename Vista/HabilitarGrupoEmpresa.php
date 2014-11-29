<?php  

	include '../Modelo/conexion.php';
    $conectar = new conexion();
    $GrupoEmpresa = $_GET['GE'];
    $Operacion = $_GET['Operacion'];


    if($Operacion == 'Habilitar')
    {
        $Habilitar = $conectar->consulta("UPDATE inscripcion SET ESTADO_INSCRIPCION = 'Habilitado' WHERE NOMBRE_UGE='$GrupoEmpresa'");

        if($Habilitar)
        {

            echo '<script>alert("Se habilito la grupo empresa correctamente");</script>';
            echo '<script>window.location="../Vista/AdministrarGrupoEmpresa.php";</script>';
                   
            die();

        	echo '<script>
                    BootstrapDialog.show({
                        title: "Habilitar Grupo Empresa",
                        message: "Se habilito correctamente a la grupo empresa",
                        onhide: function(dialogRef){
                            location.reload();
                        }
                    });
                  </script>';
        }
    }

    if($Operacion == 'Deshabilitar')
    {
        $DesHabilitar = $conectar->consulta("UPDATE inscripcion SET ESTADO_INSCRIPCION = 'Deshabilitado' WHERE NOMBRE_UGE='$GrupoEmpresa'");

        if($DesHabilitar)
        {

            echo '<script>alert("Se Deshabilito la grupo empresa correctamente");</script>';
            echo '<script>window.location="../Vista/AdministrarGrupoEmpresa.php";</script>';
                   
            die();

            echo '<script>
                    BootstrapDialog.show({
                        title: "Habilitar Grupo Empresa",
                        message: "Se habilito correctamente a la grupo empresa",
                        onhide: function(dialogRef){
                            location.reload();
                        }
                    });
                  </script>';
        }
    }

?>