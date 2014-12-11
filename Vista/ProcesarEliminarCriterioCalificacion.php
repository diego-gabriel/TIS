<?php  
	session_start();
	$UsuarioActivo = $_SESSION['usuario'];

	$CritEliminar = $_POST['CriterioEliminar'];

	include '../Modelo/conexion.php';
						                    
	$conect = new conexion();

	$formularios = "";

	if ($CritEliminar == 'PUNTAJE') {

		echo '<script>alert("No puede eliminar ese criterio");</script>';
		die();
	}

	$ResIdC = $conect->consulta("SELECT ID_CRITERIO_C FROM criteriocalificacion WHERE NOMBRE_CRITERIO_C = '$CritEliminar' AND NOMBRE_U = '$UsuarioActivo'");

	$IdC = mysql_fetch_row($ResIdC);

	$ResBuscar = $conect->consulta("SELECT ID_FORM FROM from_crit_c WHERE ID_CRITERIO_C = '$IdC[0]'");

	while ($rowBuscar = mysql_fetch_row($ResBuscar)) {
		
		$Buscar[] = $rowBuscar;
	}


	if (isset($Buscar) and is_array($Buscar)) {

		for ($i=0; $i < count($Buscar) ; $i++) { 

			$BuscarFormulario = $conect->consulta('SELECT NOMBRE_FORM FROM formulario WHERE ID_FORM = '.$Buscar[$i][0].'');

			$NomForm = mysql_fetch_row($BuscarFormulario);

			//$formularios = $formularios.' '.$NomForm[$i][0];		
	
		}

		//var_dump($formularios);

		echo '<script>alert("El criterio esta en uso por los siguiente formularios: '.$NomForm[0].'");</script>';
		die();
	
	}

	$EliminarIndicadores = $conect->consulta("DELETE FROM indicador WHERE ID_CRITERIO_C = '$IdC[0]'");

	$EliminarCriterio = $conect->consulta("DELETE FROM criteriocalificacion WHERE ID_CRITERIO_C = '$IdC[0]'");

	if ($EliminarIndicadores and $EliminarCriterio) {

		echo '<script>alert("Se elimino el criterio correctamente");</script>';
		echo '<script>location.reload();</script>';
		
	}

?>