<?php  

	include '../Modelo/conexion.php';
	$conect = new conexion();  

	$GrupoEmpresaF = $_POST['GrupoE'];
	$NotaFn = $_POST['NotaFn'];

	$VerificarNotaFinal = $conect->consulta("SELECT * FROM nota_final WHERE NOMBRE_U='$GrupoEmpresaF'");

	$NotaFinal = mysql_fetch_row($VerificarNotaFinal);

	if (is_array($NotaFinal)) {

		echo '<script>alert("La grupo empresa seleccionada ya tiene una nota registrada anteriormente");
				window.location="../Vista/EvaluacionGeneral.php";
				</script>';
	}
	else
	{
	
		$conect->consulta('INSERT INTO nota_final(NOMBRE_U, NOTA_F) VALUES("'.$GrupoEmpresaF.'","'.$NotaFn.'")');

		echo '<script>alert("Se registro la nota correctamente");
				window.location="../Vista/EvaluacionGeneral.php";
				</script>';

	}

?>