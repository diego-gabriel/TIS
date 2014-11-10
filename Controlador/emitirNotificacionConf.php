
<?php


include '../Modelo/conexion_pd.php';
include '../Modelo/crear_oc_pdf.php';
$conexion = new conexion();

session_start();
$nombreUA = $_SESSION['usuario'] ;
$nomAp = $conexion->query("SELECT NOMBRES_A, APELLIDOS_A FROM asesor WHERE NOMBRE_U =  '$nombreUA' ");
$nombreAp = $nomAp->fetchObject();
$nomA = $nombreAp->NOMBRES_A;
$apeA = $nombreAp->APELLIDOS_A;
$nombreAsesor = $nomA." ".$apeA ;

if (isset($_POST['lista'])) {
	if (isset($_POST['fecha'])) {
		if (isset($_POST['hora'])) {
			if (isset($_POST['lugar'])) {
                           
                            $existeFile = FALSE;
                            $nombre_fichero = '../Repositorio/asesor/NotificacionConformidad.tex';
                            if (file_exists($nombre_fichero)) {
                                $existeFile = TRUE;
                            }
                            
                           if($existeFile){
                            $nombreEmpresa=$_POST['lista'];
                            if(strnatcasecmp($nombreEmpresa, "Seleccione una grupo empresa")!=0){
				$fecha=$_POST['fecha'];
				$hora=$_POST['hora'];
				$lugar=$_POST['lugar'];
				$arr=$_POST['text'];
				
				$calificaciones = array();
										 			
				$queryStat = "SELECT ge.`NOMBRE_U` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '$nombreEmpresa'";
				$stmt      = $conexion->query($queryStat);
				$row       = $stmt->fetchObject();
				//$user      = $row->NOMBRE_U;
				
				$email     = "SELECT u.`CORREO_ELECTRONICO_U` FROM `usuario` AS u WHERE u.`NOMBRE_U` LIKE '$nombreAsesor'";
				$consulta  = $conexion->query($email);
				$row       = $consulta->fetchObject();
				$correo    = $row->CORREO_ELECTRONICO_U;

				$consultaNombre = "SELECT a.`NOMBRES_A`, a.`APELLIDOS_A` FROM `asesor` AS a WHERE a.`NOMBRE_U` LIKE '$nombreAsesor'";
				$nombre        = $conexion->query($consultaNombre);
				$row           = $nombre->fetchObject();
				$nomAs = $row->NOMBRES_A;
				$apeAs = $row->APELLIDOS_A;
				$nombreCompleto = $nomAs."  ".$apeAs;	
				
				$indice=0;
				foreach ($arr as $key => $value) {
				    $calificaciones[$indice] = $value;
				    $indice++;
				}

				  		
				if(isset($_GET['id'])){
				 
					 $buscar    = array(
                                        'empresa_nombre_largo' => '[[empresa-nombre-largo]]',
                                        'fecha_actual'         => '[[fecha-actual]]',
                                        'hora_actual'          => '[[hora-actual]]',
                                        'lugar'                => '[[lugar]]',
                                        'primer_p'             => '[[primer-puntaje]]',
                                        'segundo_p'            => '[[segundo-puntaje]]',
                                        'tercer_p'             => '[[tercer-puntaje]]',
                                        'cuarto_p'             => '[[cuarto-puntaje]]',
                                        'quinto_p'             => '[[quinto-puntaje]]',
                                        'sexto_p'              => '[[sexto-puntaje]]',
                                        'septimo_p'            => '[[septimo-puntaje]]',
                                     );


                                    $remplazo['empresa_nombre_largo'] = $nombreEmpresa;
                                    $remplazo['fecha_actual'] = $fecha;
                                    $remplazo['hora_actual']  = $hora;
                                    $remplazo['lugar'] = $lugar;
                                   
                                    $remplazo['primer_p'] = intval($calificaciones[0]);
                                    $remplazo['segundo_p'] = intval($calificaciones[1]);
                                    $remplazo['tercer_p'] = intval($calificaciones[2]);
                                    $remplazo['cuarto_p'] = intval($calificaciones[3]);
                                    $remplazo['quinto_p'] = intval($calificaciones[4]);
                                    $remplazo['sexto_p'] = intval($calificaciones[5]);
                                    $remplazo['septimo_p'] = intval($calificaciones[6]);
					
                                
                                    $ruta = "..\\Repositorio\\asesor";
                                    chdir($ruta);
        
                                    $id = "NotificacionConformidad";
                                    $tex = $id.".tex";
                                    $log = $id.".log"; 
                                    $aux = $id.".aux";
                                    $pdf = $id.".pdf"; 
                                    

                                    $plantilla = "NotificacionConformidad.tex";

                                    $texto = file_get_contents($plantilla);
                                    $textoAux = file_get_contents($plantilla);


                                    $texto = str_replace($buscar['empresa_nombre_largo'], $remplazo['empresa_nombre_largo'], $texto);
                                    $texto = str_replace($buscar['fecha_actual'], $remplazo['fecha_actual'], $texto);
                                    $texto = str_replace($buscar['hora_actual'], $remplazo['hora_actual'], $texto);
                                    $texto = str_replace($buscar['lugar'], $remplazo['lugar'], $texto);
                                    $texto = str_replace($buscar['primer_p'], $remplazo['primer_p'], $texto);
                                    $texto = str_replace($buscar['segundo_p'], $remplazo['segundo_p'], $texto);
                                    $texto = str_replace($buscar['tercer_p'], $remplazo['tercer_p'], $texto);
                                    $texto = str_replace($buscar['cuarto_p'], $remplazo['cuarto_p'], $texto);
                                    $texto = str_replace($buscar['quinto_p'], $remplazo['quinto_p'], $texto);
                                    $texto = str_replace($buscar['sexto_p'], $remplazo['sexto_p'], $texto);
                                    $texto = str_replace($buscar['septimo_p'], $remplazo['septimo_p'], $texto);                                  
                                    
                                    file_put_contents($tex,$texto);
                                    
                                    exec("pdflatex -interaction=nonstopmode $tex",$final);

                                    file_put_contents($tex, $textoAux);
                                    unlink($log);
                                    unlink($aux);
                                    
                                    
                                    $rutaDirectorio="../".$nombreEmpresa."/NC/";

                               	    $file = "NotificacionConformidad".'_'.$nombreEmpresa.'.pdf';
        
                                    if (!file_exists($rutaDirectorio)) 
                                    {
                                        mkdir($rutaDirectorio, 0777,TRUE);
                                    }
                                    
                                    rename("NotificacionConformidad.pdf", $file);
                                    rename($file, $rutaDirectorio.$pdf );
                                 
                                    header("location:../Vista/notificacion_conformidad.php");
				 
                                    
				}	
			}               
                        }
                        else
                        {
                            echo"<script type=\"text/javascript\">alert('Por favor, suba la plantilla de Notificacion de conformidad a su repositorio); window.location='../Vista/notificacion_conformidad.php';</script>";
           
                        }
			
		}		
	}
}
}
?>