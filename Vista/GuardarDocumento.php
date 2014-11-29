<?php

include '../Modelo/conexion.php';
$conect = new conexion();
date_default_timezone_set('America/Puerto_Rico');

session_start();
$UsuarioActivo = $_SESSION['usuario'];

$nombreDoc = trim($_POST['nombreDocumento']);
$FechaInicioEntrega = $_POST['fechaInicioE'];
$HoraInicioEntrega = $_POST['horaInicioE'];
$FechaFinalEntrega = $_POST['fechaFinalE'];
$HoraFinalEntrega = $_POST['horaFinalE'];


$HoraRegistrado = date("H:i:s");
$FechaRegistrado = date('Y:m:j');

$VerificarExistenciaDoc = $conect->consulta("SELECT * FROM registro WHERE NOMBRE_U = '$UsuarioActivo' AND NOMBRE_R = '$nombreDoc'");

$ExistenciaDoc = mysql_fetch_row($VerificarExistenciaDoc);

if (is_array($ExistenciaDoc)) {

	echo "<SCRIPT LANGUAGE='javascript'>". 
            " alert('Error, ya existe un registro con ese nombre');".
            " document.location=('RegistrarDocumentosRequeridos.php');</SCRIPT>";
}
else{

	$InsertarDocumento = $conect->consulta("INSERT INTO registro(NOMBRE_U, TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES('$UsuarioActivo','documento requerido','Habilitado','$nombreDoc','$FechaRegistrado', '$HoraRegistrado')");
	$SeleccionDocumentoID = $conect->consulta("SELECT MAX(ID_R) FROM registro WHERE NOMBRE_U='$UsuarioActivo' AND TIPO_T = 'documento requerido'");

	$DocId = mysql_fetch_row($SeleccionDocumentoID);

	$InsertarPlazo = $conect->consulta("INSERT INTO plazo VALUES('$DocId[0]','$FechaInicioEntrega','$FechaFinalEntrega','$HoraInicioEntrega','$HoraFinalEntrega')");


	if ($InsertarDocumento and $InsertarPlazo) {

			echo "<SCRIPT LANGUAGE='javascript'>". 
		            " alert('Exito, el registro del documento se realizo exitosamente.');".
		            " document.location=('RegistrarDocumentosRequeridos.php');</SCRIPT>";
	}
	else{
	
			echo "<SCRIPT LANGUAGE='javascript'>". 
		            " alert('Error, no se pudo registrar el documento');".
		            " document.location=('RegistrarDocumentosRequeridos.php');</SCRIPT>";
	}	
}

?>