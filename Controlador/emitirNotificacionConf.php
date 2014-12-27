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
        				$nombreUGE = $row->NOMBRE_U;
             
        				$queryStat1 = "SELECT ge.`NOMBRE_CORTO_GE` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '$nombreEmpresa'";
        				$stmt1      = $conexion->query($queryStat1);
        				$row1       = $stmt1->fetchObject();
        				$nombreCGE = $row1->NOMBRE_CORTO_GE;                       
        				
        				$email     = "SELECT u.`CORREO_ELECTRONICO_U` FROM `usuario` AS u WHERE u.`NOMBRE_U` LIKE '$nombreUA'";
        				$consulta  = $conexion->query($email);
        				$row       = $consulta->fetchObject();
        				$correo    = $row->CORREO_ELECTRONICO_U;

        				$consultaNombre = "SELECT a.`NOMBRES_A`, a.`APELLIDOS_A` FROM `asesor` AS a WHERE a.`NOMBRE_U` LIKE '$nombreUA'";
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

                        /******************************************/
                            $cons = "SELECT * FROM registro WHERE NOMBRE_U='$nombreUA' and TIPO_T='documento requerido'";
                            $SeleccionarDocsRequeridos = $conexion->query($cons);
                            $DocsRequeridos = $SeleccionarDocsRequeridos->rowCount();

                            $SeleccionarDocsSubidos = $conexion->query("SELECT * FROM registro WHERE NOMBRE_U='$nombreUGE' AND TIPO_T='documento subido'");
                            $DocsSubidos = $SeleccionarDocsSubidos->rowCount();

                            if($DocsRequeridos == $DocsSubidos)
                            {
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
                                           
                                    $ruta ="../Repositorio/asesor";
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
                                            
                                            
                                            $rutaDirectorio="../".$nombreUGE."/NC/";

                                            $file = "NotificacionConformidad".'_'.$nombreEmpresa.'.pdf';
                
                                           if (!file_exists($rutaDirectorio)) 
                                            {
                                                $oldmask = umask(0); 
                                                mkdir($rutaDirectorio, 0777,TRUE);
                                                umask($oldmask);
                                                chown($rutaDirectorio, "bittle2014"); 
                                                chgrp($rutaDirectorio, "webtis");

                                                if(!file_exists("../".$nombreUGE."/index.html"))
                                                {
                                                    fopen("../".$nombreUGE."/index.html", "x");
                                                }
                                                
                                            }
                                             
                                            //rename("NotificacionConformidad.pdf", $file);
                                            rename("NotificacionConformidad.pdf", $rutaDirectorio.$pdf );
                                           
                                            
                                           $nruta="../Repositorio/".$nombreUGE."/NC/"."NotificacionConformidad.pdf";
                                           $fecha       = date('Y-m-d');
                                           $hora        =  date("G:H:i");
                                           $visualizable="TRUE";
                                           $descargable="TRUE";
                                           $comentario_add = $conexion->query("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$nombreUA','publicaciones','Habilitado','Notificacion de Conformidad','$fecha','$hora')")or
                                           die("Error al s");
                                           
                                       $consultar= $conexion->query("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                                           $row = $consultar->fetchObject();
                                           $id = $row -> ID_R;
                                           
                                           $guardar_doc = $conexion->query("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D) VALUES('$id','1024','$nruta','$visualizable','$descargable')");
                                           $des_D=$conexion->query("INSERT INTO descripcion (ID_R,DESCRIPCION_D) VALUES('$id','Notificacion de Conformidad')");
                                           $destinatario=$conexion->query("INSERT INTO receptor (ID_R,RECEPTOR_R) VALUES('$id','$nombreEmpresa')");
                                           $guardar = $conexion->query("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$id','$fecha','$hora')") or
                                           die("Error al s");

                                    $directorioIndex = "../".$nombreUGE."/NC/index.html";
        
                                    if(!file_exists($directorioIndex))
                                    {
                                        $directorioIndex = "../".$nombreUGE."/NC/index.html";
                                        fopen($directorioIndex, "x");
                                    }

                                    echo"<script type=\"text/javascript\">alert('Se genero correctamente la notificacion de conformidad'); window.location='../Vista/notificacion_conformidad.php';</script>";  
                                                         
                                }   
                                
                            }
                            else
                            {
                        
                                echo"<script type=\"text/javascript\">alert('La grupo empresa que ha escogido no ha registrado aun todos los documentos requeridos'); window.location='../Vista/notificacion_conformidad.php';</script>";  
                            }			
			        } 
                    else
                    {        
                        echo"<script type=\"text/javascript\">alert('Por favor, seleccione una grupo empresa'); window.location='../Vista/notificacion_conformidad.php';</script>";  
                    }
                }
                else
                {
                    echo"<script type=\"text/javascript\">alert('Por favor, suba la plantilla de Notificacion de Conformidad a su repositorio.'); window.location='../Vista/notificacion_conformidad.php';</script>";      
                }
		    }		
	    }
    }
}
?>