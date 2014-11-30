<?php
session_start();
include '../Modelo/conexion.php';
$conect = new conexion();
$id = $_GET['id'];


include('config.php');
$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);

// Excluir  noticia
	 $eliminar_comentarios = $conect->consulta("DELETE FROM comentarios WHERE ID_N = '$id' ");
     $eliminar_noticias = $conect->consulta("DELETE FROM noticias WHERE ID_N = '$id' ");
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
2.
alert ("Tema eliminado con exito.")
3.
</SCRIPT>
<script>
  location.href="lista-de-noticias-grupo.php";
</script>