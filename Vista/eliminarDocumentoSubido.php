<?php
 
session_start();
include '../Modelo/conexion.php';
$conect = new conexion();
$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
//Crear variables--------------------------
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
error_reporting(E_ALL ^ E_NOTICE);
$idgp = $_GET['id_us'];


//conexion-------------
	
	//Peticion
    $peticion_registro = mysql_query(" SELECT ID_R , NOMBRE_R FROM `registro` WHERE NOMBRE_R ='$idgp'");
    $peticion_regis=mysql_num_rows($peticion_registro);
    if($peticion_regis>0){
    	$fila = mysql_fetch_array($peticion_registro);
    	 $id=$fila[0];
    	 $id1=$fila[1];
    	 $ruta="../Repositorio/asesor/"."$idgp";

	unlink($ruta);
            $doc_eliminar=mysql_query(" DELETE FROM `documento` WHERE ID_R='$id'");
             $registro_eliminar = $conect->consulta("DELETE FROM registro WHERE ID_R = '$id' "); 
}
 mysql_close($conexion);
#sthash.8WXaDU1F.dpuf
	//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
	
	 echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=lista_doc_subidos.php">
		</head>
	</html>

	';

 
?>