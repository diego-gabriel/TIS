<?php

include '../Modelo/conexion.php';
$conexion = new conexion();


if(isset($_POST['registrar']))
{
    $asesor=$_POST['asesor'];
    
    if(isset($_POST['ge']))
    {
        $grupoE = $_POST['ge'];        
    }
    
   
    if($asesor == "Seleccione un Asesor")
    {
        echo"<script type=\"text/javascript\">alert('No seleccion\u00f3 ningun asesor'); window.history.back();</script>"; 
    }
    else
    {
        $seleccion = "SELECT count(*) "
                        . "FROM inscripcion "
                        . "WHERE NOMBRE_UGE='".$grupoE."'";
        $consulta = $conexion->consulta($seleccion);
        $cont =  mysql_fetch_row($consulta);
        $bandera=$cont[0];
        
        if($bandera == 0)
        {
            $seleccion="SELECT id_g "
                    . "FROM gestion "
                    . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";
            $consulta=$conexion->consulta($seleccion);
            $idGestion=mysql_fetch_row($consulta);
            $idGestion_= $idGestion[0];

            $separar = explode(' ', $asesor);
            $nom = $separar[0];
            $count = count($separar);

            if( $count == 3)
            {
                $apellido = $separar[1]." ".$separar[2];
            } else if( $count == 4){
                $nom = $nom." ".$separar[1];
                $apellido = $separar[2]." ".$separar[3];
            }


            $seleccion = "SELECT NOMBRE_U "
                    . "FROM asesor "
                    . "WHERE NOMBRES_A LIKE '". $nom."' and APELLIDOS_A LIKE '".$apellido."'";
            $consulta = $conexion->consulta($seleccion);
            $nombre =  mysql_fetch_row($consulta);
            $nombreU = $nombre[0];

            $insertar="INSERT INTO inscripcion(NOMBRE_UA, NOMBRE_UGE, ESTADO_INSCRIPCION) VALUES ('".$nombreU."','".$grupoE."', 'Deshabilitado')";

            $conexion->consulta($insertar);
                    
            echo"<script type=\"text/javascript\">alert('Asesor elegido'); window.history.back();</script>";
        }
        else
        {
            echo"<script type=\"text/javascript\">alert('Usted ya eligi\u00f3 un asesor anteriormente'); window.history.back();</script>";
        }
    }
 }
?>
        
    

