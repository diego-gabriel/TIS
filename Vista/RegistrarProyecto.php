<?php

    include '../Modelo/conexion.php';
    session_start();
    $conexion = new conexion();
  
    $nombreU = $_SESSION['usuario']  ;
    $nombProy = $_POST['nombreProy'];
    $descProy = $_POST['desProy'];
    $conv = $_POST['convocatoria'];
    
    $seleccion = "SELECT id_g "
        . "FROM gestion "
        . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";
   
    $consulta = $conexion->consulta($seleccion);
    $idGestion = mysql_fetch_row($consulta);
    $idGestion_ = $idGestion[0];
    
    if(strnatcasecmp($idGestion_, "")!=0)
    {
        $conexion->consulta("INSERT INTO proyecto (NOMBRE_P, DESCRIPCION_P, ID_G, CONVOCATORIA) VALUES ('$nombProy', '$descProy', '".$idGestion_."', '$conv')"); 
        echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='InscripcionProyecto.php';</script>";    
    }
    else
    {
       echo"<script type=\"text/javascript\">alert('No se pudo registrar el proyecto, primero debe registrar una gestion'); window.location='InscripcionProyecto.php';</script>";    
    }
    
?>