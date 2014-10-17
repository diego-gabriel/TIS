<?php
include '../Modelo/conexion.php';
$con=new conexion();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if(isset($_POST['registrar']) /*&& isset($_POST['asesor'])*/){
            $a=$_POST['asesor'];//Asesor del seleccionador
            if(isset($_POST['ge'])){
                $b=$_POST['ge'];//grupoempresa
                
            }
            
            if($a=="Seleccione un Asesor"){
                    echo"<script type=\"text/javascript\">alert('No seleccion\u00f3 ningun asesor'); window.history.back();</script>";
            }else{
                $consult_cont="SELECT count(*) "
                        . "FROM inscripcion "
                        . "WHERE NOMBRE_UGE='".$b."'";
                $consult=$con->consulta($consult_cont);
                $cont=  mysql_fetch_row($consult);
                $bandera=$cont[0];
                if($bandera==0){
                    $a1="SELECT id_g "
                            . "FROM gestion "
                            . "WHERE DATE (NOW()) > DATE(FECHA_INICIO_G) and DATE(NOW()) < DATE(FECHA_FIN_G)";
                    $a1_=$con->consulta($a1);
                    $id_gestion=mysql_fetch_row($a1_);
                    $id_gestion_=$id_gestion[0];

                    $separar=explode(' ', $a);
                    //$nombre_ua=$separar[0];
                    $consult2="SELECT nombre_u "
                            . "FROM asesor "
                            . "WHERE NOMBRES_A LIKE '". $separar[0]."' and APELLIDOS_A LIKE '".$separar[1]."'";
                    $nombre=$con->consulta($consult2);
                    $nombre_asesor=  mysql_fetch_row($nombre);
                    $nombre_u=$nombre_asesor[0];
                    echo $nombre_u."<br>";
                    echo $_POST['ge']."<br>";
                    echo $id_gestion_."<br>";
                    $b1="INSERT INTO inscripcion(NOMBRE_UA, NOMBRE_UGE, ID_G, CODIGO_P) VALUES ('".$nombre_u."','".$b."','".$id_gestion_."','1')";
                    $con->consulta($b1);
                    echo"<script type=\"text/javascript\">alert('Asesor elegido'); window.history.back();</script>";
                    
                }else{
                    echo"<script type=\"text/javascript\">alert('Usted ya eligi\u00f3 un asesor anteriormente'); window.history.back();</script>";
                }
            }
    }
    ?>
        
    

