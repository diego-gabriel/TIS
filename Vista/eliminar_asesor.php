<?php

session_start();
include '../Modelo/conexion.php';
$conect = new conexion();
//Crear variables--------------------------

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$idgp = $_GET['id_us'];
echo $idgp;

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
         
            
            $periodo_eliminar = $conect->consulta("DELETE FROM periodo WHERE ID_R = '$id' ");
            $receptor_eliminar = $conect->consulta("DELETE FROM receptor WHERE ID_R = '$id' ");
            $registro_eliminar = $conect->consulta("DELETE FROM registro WHERE ID_R = '$id' ");
         }
        
     }

       $peticion_formulario = mysql_query(" SELECT ID_FROM FROM `formulario` WHERE NOMBRE_U ='$idgp'");
    $peticion_form=mysql_num_rows($peticion_formulario);
    if($peticion_regis>0){

        while($fila1 = mysql_fetch_array($peticion_formulario))
        {
            $id1=$fila1[0];
             $eliminar_puntaje = $conect->consulta("DELETE FROM puntaje WHERE ID_FROM = '$id1' ");
             $eliminar_nota = $conect->consulta("DELETE FROM nota WHERE ID_FROM = '$id1' ");
             $eliminar_FC= $conect->consulta("DELETE FROM form_crit_c WHERE ID_FROM = '$id1' ");
             $eliminar_FE= $conect->consulta("DELETE FROM form_crit_e WHERE ID_FROM = '$id1' ");
             $eliminar_cc= $conect->consulta("DELETE FROM criteriocalificacion WHERE ID_FROM = '$id1' ");
              $eliminar_ce= $conect->consulta("DELETE FROM criterio_evaluacion WHERE ID_FROM = '$id1' ");
                $eliminar_formulario= $conect->consulta("DELETE FROM formulario WHERE ID_FROM = '$id1' ");
        }

    }
     
     $rol_eliminar = $conect->consulta("DELETE FROM usuario_rol WHERE NOMBRE_U = '$idgp' ");
     $eliminar_inscrpcion = $conect->consulta("DELETE FROM inscripcion WHERE NOMBRE_UGE = '$idgp ");
     $eliminar_tipo = $conect->consulta("DELETE FROM asesor WHERE NOMBRE_U = '$idgp' ");
     $sesion_eliminarr = $conect->consulta("DELETE FROM sesion WHERE NOMBRE_U = '$idgp' ");
     $eliminar_usuario = $conect->consulta("DELETE FROM usuario WHERE NOMBRE_U = '$idgp' ");
    
//$peticion5 = mysql_query(" DELETE FROM `usuario_rol` WHERE NOMBRE_U='$idgp'");
//$peticion6 = mysql_query(" DELETE FROM `asesor` WHERE NOMBRE_U='$idgp'");
//	$peticion4 = mysql_query(" DELETE FROM `usuario` WHERE NOMBRE_U='$idgp'");
	
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