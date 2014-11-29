<?php

session_start();

//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$idgp = $_GET['id_us'];


//conexion-------------
	$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
	//Peticion
	$peticion =mysql_num_rows( mysql_query(" SELECT * FROM `comentarios` WHERE NOMBRE_U ='$idgp'"));
	if($peticion>0){
         $peticion1 = mysql_query(" DELETE FROM `comentarios` WHERE NOMBRE_U='$idgp'");
     }
   
	$peticion2 =mysql_num_rows( mysql_query(" SELECT * FROM `noticias` WHERE NOMBRE_U ='$idgp'"));
    if($peticion2>0){
         $peticion3 = mysql_query(" DELETE FROM `noticias` WHERE NOMBRE_U='$idgp'");
     }

    $peticion_registro = mysql_query(" SELECT ID_R FROM `registro` WHERE NOMBRE_U ='$idgp'");
    $peticion_regis=mysql_num_rows($peticion_registro);
    if($peticion_regis>0){

    	while($fila = mysql_fetch_array($peticion_registro))
		{
    	    $id=$fila[0];
    	    $des_e=mysql_num_rows( mysql_query(" SELECT * FROM `descripcion` WHERE ID_R='$id'"));
    	    if($des_e > 0)
    	    {
    		  $des_eliminar=mysql_query(" DELETE FROM `descripcion` WHERE ID_R='$idgp'");
    	    }	

    	    $doc_e=mysql_num_rows( mysql_query(" SELECT * FROM `documento` WHERE ID_R='$id'"));
    	    if($des_e > 0)
    	    {
    		   $doc_eliminar=mysql_query(" DELETE FROM `documento` WHERE ID_R='$idgp'");
    	    }
         
            $registro_e=mysql_num_rows( mysql_query(" SELECT * FROM `registro` WHERE ID_R='$id'"));
            if($registro_e > 0)
    	    {
    		   $registro_eliminar=mysql_query(" DELETE FROM `registro` WHERE ID_R='$id'");
    	    }
         }
        
     }
     

    
$peticion5 = mysql_query(" DELETE FROM `usuario_rol` WHERE NOMBRE_U='$idgp'");
$peticion6 = mysql_query(" DELETE FROM `asesor` WHERE NOMBRE_U='$idgp'");
	$peticion4 = mysql_query(" DELETE FROM `usuario` WHERE NOMBRE_U='$idgp'");
	
	//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
	 echo'
	<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=lista_asesores.php">
	</head>
	</html>

	';

 
?>