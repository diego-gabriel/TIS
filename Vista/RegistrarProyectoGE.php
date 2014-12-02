<?php

include '../Modelo/conexion.php';
session_start();
$conect = new conexion();
$nombreU = $_SESSION['usuario'];

if (isset($_POST['proyecto'])) {
    

    $proyecto = $_REQUEST['proyecto'];
    if(strnatcasecmp($proyecto, "Seleccione un proyecto")!=0)
    {
        $consulta="SELECT `CODIGO_P` FROM `proyecto` WHERE `NOMBRE_P` = '$proyecto'";            
        $con= $conect->consulta($consulta);
        $res =  mysql_fetch_array($con);
        $codProy = $res[0]; 
        
        $conect->consulta("INSERT INTO inscripcion_proyecto(CODIGO_P, NOMBRE_U) VALUES('$codProy','$nombreU')"); 

        
        echo"<script type=\"text/javascript\">alert('Se registro la seleccion'); window.location='../Vista/inicio_grupo_empresa.php';</script>";  
    
    }
    else{        
       echo"<script type=\"text/javascript\">alert('Por favor, seleccione un proyecto'); window.location='../Vista/InscripcionGEProyecto.php';</script>";  
    }
}

?>

