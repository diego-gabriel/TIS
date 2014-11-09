<?php
    session_start();
    $nombreU = $_SESSION['usuario'];
    
    include '../Modelo/conexion.php';
    
    $conect = new conexion();
    
    $representanteL = $conect->consulta("SELECT REPRESENTANTE_LEGAL_GE FROM grupo_empresa WHERE NOMBRE_U = '$nombreU' ");
    $repL = mysql_fetch_row($representanteL);
    
    if(strcmp($repL[0],"")!=0)
    {
        echo"<script type=\"text/javascript\">alert('Usted ya registro un representante legal'); window.location='AnadirRL.php';</script>";
     
    }
    else
    {
        $nomRL = $_REQUEST['repLegal'];
        if(strnatcasecmp($nomRL, "Seleccione un representante legal")!=0)
        {
               $conect->consulta(" UPDATE grupo_empresa SET REPRESENTANTE_LEGAL_GE='$nomRL' WHERE NOMBRE_U = '$nombreU'");   
               echo"<script type=\"text/javascript\">alert('Se registro satisfactoriamente'); window.location='AnadirRL.php';</script>";
     
        }
        else
        {
            echo"<script type=\"text/javascript\">alert('Por favor, seleccione un representante legal'); window.location='AnadirRL.php';</script>";
     
        }
     }

    ?>