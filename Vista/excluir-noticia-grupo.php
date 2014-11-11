<?php
$id = $_GET['id'];


include('config.php');
// Excluir  noticia
$sql = "DELETE FROM noticias WHERE   ID_N= '$id'";

$resultado = mysql_query($sql)
or die ("ocurrio un error.");
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
2.
alert ("Tema eliminado con exito.")
3.
</SCRIPT>
<script>
  location.href="lista-de-noticias-grupo.php";
</script>