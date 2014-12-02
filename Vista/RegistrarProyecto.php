<?php
    include '../Modelo/conexion.php';
    $conect = new conexion();
    session_start();
  
    $nombreU = $_SESSION['usuario']  ;
    $nombreProy = $_POST['nombreProy'];
    $descripProy = $_POST['desProy'];
    
    $a1="SELECT id_g "
        . "FROM gestion "
        . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";
    $a1_=$conect->consulta($a1);
    $idGestion=mysql_fetch_row($a1_);
    $idGestion_=$idGestion[0];
    
    $conect->consulta("INSERT INTO proyecto (NOMBRE_P, DESCRIPCION_P, ID_G) VALUES ('$nombreProy', '$descripProy', '".$idGestion_."')"); 


    echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='InscripcionProyecto.php';</script>";
                   
         
     
  
    ?>