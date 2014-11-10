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
			echo $tipo;
			$icono = '../Librerias/images/ico/'.$tipo.'.jpg';
		   
		 // echo 'Nombre >>'  .$key['NOMBRE_R']. ' DESCRIPCION_D >> ' .$key['DESCRIPCION_D'].'RUTA >> '.$key['RUTA_D'].' ICONO >> '.$icono.'<br>';
		 
		 $aux=$key['DESCRIPCION_D'];
         //$delimitador = "*";
         $findme = "*";
         $pos = strpos($aux,$findme);
         $pose=$pos-1;
         $nombre=substr($aux, 0,$pose);
         
            //list ($nombre,$numero) = explode($delimitador,$aux);

                $ubi= $key['RUTA_D'];
               // $del= "/";
               //list ($r1,$r2,$r3,$r4,$r5,$r6,$r7)=explode($del,$ubi);
               //$com=$r5."/".$r6."/".$r7;
               //echo $com."</br>";
                 
                 $ini="32"+1;
                 $size=strlen($ubi);
                 $com=substr($ubi, $ini,$size);

			$tabla .= '<tr>
			           <td>'.$indice.'</td>
			           <td>
		               <img class="img-rounded" width="35px" height="35px" alt=" " src="'.$icono.'"></img>
                       </td>
			           <td>
                       <a class="link-dos" href="../'.$com.'" onclick="">'.$key['NOMBRE_R'].'<span class="instancename">
 
                       <span class="accesshide "></span></a>
                       </td>
			           <td>'.$nombre.'
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