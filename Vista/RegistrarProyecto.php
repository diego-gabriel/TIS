<?php
    include '../Modelo/conexion.php';
    $conect = new conexion();
    session_start();
  
    $nombreU = $_SESSION['usuario']  ;
    $nombreProy = $_POST['nombreProy'];
    $descripProy = $_POST['desProy'];
    $convocatoria = $_POST['convocatoria'];
    
    $seleccion="SELECT id_g "
        . "FROM gestion "
        . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";
   
    $consulta=$conect->consulta($seleccion);
    $idGestion=mysql_fetch_row($consulta);
    $idGestion_=$idGestion[0];
    
    if(strnatcasecmp($idGestion_, "")!=0){
        $conect->consulta("INSERT INTO proyecto (NOMBRE_P, DESCRIPCION_P, ID_G, CONVOCATORIA) VALUES ('$nombreProy', '$descripProy', '".$idGestion_."', '$convocatoria')"); 
        echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='InscripcionProyecto.php';</script>";    
    }
    else{
       echo"<script type=\"text/javascript\">alert('No se pudo registrar el proyecto, primero debe registrar una gestion'); window.location='InscripcionProyecto.php';</script>";    
    }

    ?>