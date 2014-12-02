<?php
$id = $_GET['id'];


include('config.php');
// Excluir  noticia
$sql1 = "DELETE FROM comentarios WHERE   ID_N= '$id'";
$sql = "DELETE FROM noticias WHERE   ID_N= '$id'";
$resultado1 = mysql_query($sql1)
or die ("ocurrio un error.");
$resultado = mysql_query($sql)
or die ("ocurrio un error.");
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
2.
alert ("Tema eliminado con exito.")
3.
</SCRIPT>
<script>
  location.href="lista-de-noticias.php";
</script>