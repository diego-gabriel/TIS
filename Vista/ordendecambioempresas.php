<?php
		require_once( '../Modelo/conexion_pd.php' );
		$conexion = new Conexion();
		$fecha=  date('Y-m-d');
		$hora= date('G:H:i');
		$idAsesor = 'boris' ;
		$empresas = '';
		

 		$resultado = "SELECT ge.`NOMBRE_LARGO_GE` FROM `asesor` AS a,`grupo_empresa` AS ge,`gestion` AS g,`inscripcion` AS i WHERE a.`NOMBRE_U` = i.`NOMBRE_UA` AND ge.`NOMBRE_U` = i.`NOMBRE_UGE` AND g.`ID_G` = i.`ID_G` AND g.`FECHA_FIN_G` >= '$fecha' AND g.`FECHA_INICIO_G` <= '$fecha' AND a.`NOMBRE_U` LIKE '$idAsesor'";
		
		$stmt = $conexion->prepare($resultado);
		$stmt->execute();
		$result = $stmt->fetchAll();
		//var_dump($result);

		foreach ($result as $row) {
			$empresas.="<option value = '".$row['NOMBRE_LARGO_GE']."'>".$row['NOMBRE_LARGO_GE']."</option>";
		}
		//echo $empresas; 
		
		$template = file_get_contents("../Vista/ordenDeCambio.php"); //***
		$template = str_replace('{llenar_GE}',$empresas, $template);
		print($template); 
                ?>