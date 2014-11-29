<?php
    include '../Modelo/conexion.php';
    $conect = new conexion();
    session_start();
  
    $nombreU = $_SESSION['usuario']  ;
    $nombreProy = $_POST['nombreProy'];
    $descripProy = $_POST['desProy'];
    
    $conect->consulta("INSERT INTO proyecto (NOMBRE_P, DESCRIPCION_P) VALUES ('$nombreProy', '$descripProy')"); 


    echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='RegistrarProyecto.php';</script>";
                   
         
     
  
    ?>