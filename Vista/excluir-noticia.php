<?php
include '../Modelo/conexion.php';
$conect = new conexion();
$noticia = $_GET['id'];


$delComen = $conect->consulta("DELETE FROM comentarios WHERE   ID_N= '$noticia'");
$delNoti = $conect->consulta("DELETE FROM noticias WHERE   ID_N= '$noticia'");


?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
2.
alert ("Tema eliminado con exito.")
3.
</SCRIPT>
<script>
  location.href="lista-de-noticias.php";
</script>