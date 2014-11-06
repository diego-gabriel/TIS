<?php
    $nombreU = "camaleon";

    include '../Modelo/conexion.php';
    
    $conect = new conexion();
    
    $conect->consulta("INSERT INTO grupo_empresa(socio.NOMBRE_U, socio.NOMBRES_S, socio.APELLIDOS_S, socio.LOGIN_S, socio.PASSWORD_S) VALUES('$nombreU', '$nombreS', '$apellidoS', '$nombreUS, '$contrasenaS')"); 
     
    
    /*$VerificarUsuario = $conect->consulta("SELECT REPRESENTANTE_LEGAL_GE FROM `grupo_empresa` WHERE NOMBRE_U LIKE '$nombreU'"); 
    $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);
    
     if (!is_array($VerificarUsuario2)) 
     {
         
     }
     else
     {
         echo '<script>
         BootstrapDialog.show({
         title: "Fallo en el Registro",
         message: "El nombre de usuario ya esta registrado"
         });
         </script>';
     }*/
    ?>