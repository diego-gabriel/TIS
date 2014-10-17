<?php
//include('../Vista/recursosasesor.php');
include('../Modelo/crearimagen.php');
$usuario ='leticia';

	$graficorecurso     = new Recurso($usuario);
	$indice = 1;
	$descripcion  =	$graficorecurso->obtenerPropiedades();
	$tabla ='';

	if($descripcion != null){
		foreach($descripcion as $key ) {
			$tipo  =strstr($key['RUTA_D'], '.');
			$icono = '../Librerias/images/ico/'.$tipo.'.jpg';
		   
		 // echo 'Nombre >>'  .$key['NOMBRE_R']. ' DESCRIPCION_D >> ' .$key['DESCRIPCION_D'].'RUTA >> '.$key['RUTA_D'].' ICONO >> '.$icono.'<br>';
		 
		 

			$tabla .= '<tr>
			           <td>'.$indice.'</td>
			           <td>
		               <img class="img-rounded" width="35px" height="35px" alt=" " src="'.$icono.'"></img>
                       </td>
			           <td>
                       <a class="link-dos" href="'.$key['RUTA_D'].'" onclick="">'.$key['NOMBRE_R'].'<span class="instancename">
                       <span class="accesshide "></span></a>
                       </td>
			           <td>'.$key['DESCRIPCION_D'].'
			           </td>
			           </tr>';

			$indice++;
		}
	}else{		$tabla = 'No existen publicaciones';
	
	}
	///echo $tabla;

			$template = file_get_contents("../Vista/recursosasesor.php");
			$template = str_replace('{change}',$tabla, $template);
			print($template); 
?>