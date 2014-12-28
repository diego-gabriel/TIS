<?php
include '../Modelo/conexion.php';
session_start();
$con = new conexion();
if (isset($_POST['grupoempresa'])) {


    $nombreLargoG = $_REQUEST['grupoempresa'];
    $consulta_contrato="SELECT DISTINCT NOMBRE_R FROM `registro` AS r,`receptor` AS w WHERE  r.`ID_R` = w.`ID_R` AND r.`TIPO_T` LIKE 'Contrato' AND w.`RECEPTOR_R` = '$nombreLargoG'";
    $contrato1= $con->consulta($consulta_contrato);
    $contrato2= mysql_num_rows($contrato1);  
    if($contrato2 != 0 )
   {
         echo"<script type=\"text/javascript\">alert('Usted ya emitio un contrato para esta grupo empresa'); window.location='../Vista/contrato.php';</script>";  
   }
   else
   {


        
        
        $nombre_fichero = '../Repositorio/asesor/Contrato.tex';
        $existeFile = FALSE;
        if (file_exists($nombre_fichero)) {
             $existeFile = TRUE;
        }
        if($existeFile){

            $nombreLargo = $_REQUEST['grupoempresa'];

            if(strnatcasecmp($nombreLargo, "Seleccione una grupo empresa")!=0)
            {
                $seleccionar="SELECT `NOMBRE_CORTO_GE` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nombreLargo'";            
                $consulta= $con->consulta($seleccionar);
                $nombreCorto =  mysql_fetch_array($consulta);
                $nombreUA = $_SESSION['usuario'] ;
                $nomAp = $con->consulta("SELECT NOMBRES_A, APELLIDOS_A FROM asesor WHERE NOMBRE_U =  '$nombreUA' ");
                $nombreAp = mysql_fetch_row($nomAp);
                $asesor = $nombreAp[0]." ".$nombreAp[1] ;
                
                
                $seleccion = "SELECT `REPRESENTANTE_LEGAL_GE` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nombreLargo'";            
                $consultar= $con->consulta($seleccion);
                $representante = mysql_fetch_array($consultar);
                
                $selNombreU = "SELECT `NOMBRE_U` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nombreLargo'";            
                $conNombU= $con->consulta($selNombreU);
                $nombreUGE = mysql_fetch_array($conNombU);
                
                $selProyecto = "SELECT p.`NOMBRE_P` FROM `proyecto` AS p, `inscripcion_proyecto` AS ip WHERE ip.`NOMBRE_U` = '$nombreUGE[0]' AND ip.`CODIGO_P` = p.`CODIGO_P`";
                $conProy= $con->consulta($selProyecto);
                $sistema = mysql_fetch_array($conProy);
                
                $selCon = "SELECT p.`CONVOCATORIA` FROM `proyecto` AS p, `inscripcion_proyecto` AS ip WHERE ip.`NOMBRE_U` = '$nombreUGE[0]' AND ip.`CODIGO_P` = p.`CODIGO_P`";
                $convocatoriaProy = $con->consulta($selCon);
                $convocatoria = mysql_fetch_array($convocatoriaProy);
                
                $SeleccionarDocsSubidos = $con->consulta("SELECT * FROM registro,receptor WHERE NOMBRE_U='$nombreUA' AND NOMBRE_R='Notificacion de Conformidad' AND registro.ID_R = receptor.ID_R");
                $DocsSubidos = mysql_num_rows($SeleccionarDocsSubidos);

                if ($DocsSubidos >= 1) {
            
                        
                        $buscar    = array(
                            'empresa_nombre_largo' => '[[empresa-nombre-largo]]',
                            'empresa_nombre_corto' => '[[empresa-nombre-corto]]',
                            'rep_legal'            => '[[rep-legal]]',
                            'asesor'               => '[[asesor]]',
                            'fecha_actual'         => '[[fecha-actual]]',
                            'hora_actual'          => '[[hora-actual]]',
                            'sistema'              => '[[sistema]]',
                            'convocatoria'         => '[[convocatoria]]',
                         
                        );
                        $remplazo['empresa_nombre_largo'] = $nombreLargo;
                        $remplazo['empresa_nombre_corto'] = $nombreCorto[0];
                        $remplazo['rep_legal']            = $representante[0];
                        $remplazo['asesor']               = $asesor;
                        $remplazo['fecha_actual']         = date('Y/m/d');
                        $remplazo['sistema']              = $sistema[0];
                        $remplazo['convocatoria']         = $convocatoria[0];
                        
                        $ruta = "../Repositorio/asesor";
                       // echo $ruta;
                        chdir($ruta);
                        
                        $id = "Contrato";
                        $tex = $id.".tex"; 
                        $log = $id.".log"; 
                        $aux = $id.".aux";
                        $nombCorto = str_replace(' ', '', $nombreCorto[0]);
                        $pdf = $id.$nombCorto.".pdf"; 
                        
                         
                        
                        $plantilla = "Contrato.tex";
                        $texto = file_get_contents($plantilla);
                        $textoAux = file_get_contents($plantilla);
                        $texto = str_replace($buscar['empresa_nombre_largo'], $remplazo['empresa_nombre_largo'], $texto);
                        $texto = str_replace($buscar['empresa_nombre_corto'], $remplazo['empresa_nombre_corto'], $texto);
                        $texto = str_replace($buscar['rep_legal'], $remplazo['rep_legal'], $texto);
                        $texto = str_replace($buscar['asesor'], $remplazo['asesor'], $texto);
                        $texto = str_replace($buscar['fecha_actual'], $remplazo['fecha_actual'], $texto);
                        $texto = str_replace($buscar['sistema'], $remplazo['sistema'], $texto);
                        $texto = str_replace($buscar['convocatoria'], $remplazo['convocatoria'], $texto);
                        
                        file_put_contents($tex,$texto);
                        exec("pdflatex -interaction=nonstopmode $tex",$final);
                        file_put_contents($tex, $textoAux);
                        unlink($log);
                        unlink($aux);
                        
                        $rutaDirectorio="../".$nombreUA."/Contratos/";
                        //echo "ruta directorio".$rutaDirectorio;
                        $file = "Contrato".'_'.$nombreUA.'.pdf';
                        //echo "</br>";
                        //+echo "pdf".$pdf;
                        if (!file_exists($rutaDirectorio)) 
                        {
                            mkdir($rutaDirectorio, 0777,TRUE);

                            if(!file_exists("../".$nombreUA."/index.html"))
                            {
                                fopen("../".$nombreUA."/index.html", "x");
                            }
                        }
                                                   
                        rename("Contrato.pdf", $file);
                        rename($file, $rutaDirectorio.$pdf );
                        $des ="../Repositorio/".$nombreUA."/Contratos/".$pdf;
                        //guardar contrato
                        $fecha       = date('Y-m-d');
                                                   $hora        =  date("G:H:i");
                                                   $visualizable="TRUE";
                                                   $descargable="TRUE";
                                                   $comentario_add = $con->consulta("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$nombreUA','Contrato','Habilitado','$pdf','$fecha','$hora')")or
                                       die("Error al s");
                                                   
                                               $consultar= $con->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
                                                   
                                                   if ($row = mysql_fetch_row($consultar)) 
                                                   {
                                                     $id = trim($row[0]);
                                                    }
                                                   
                                                   $guardar_doc = $con->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D) VALUES('$id','1024','$des','$visualizable','$descargable')");
                                                   $des_D=$con->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D) VALUES('$id','Contrato')");
                                                   $destinatario=$con->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R) VALUES('$id','$nombreLargo')");
                        
                        //rename("Contrato.pdf", $pdf);
                        //$rutaCompleta=$ruta.'/'.$pdf;

                        if(!file_exists("../".$nombreUA."/Contratos/index.html"))
                        {
                            $directorioIndex = "../".$nombreUA."/Contratos/index.html";
                            fopen($directorioIndex, "x");
                        }

                        echo"<script type=\"text/javascript\">alert('Se genero el contrato correctamente'); window.location='../Vista/contrato.php';</script>";  
                                        
                }
                else
                {
                    echo"<script type=\"text/javascript\">alert('Antes de emitir un contrato debe emitir una notificacion de conformidad para la grupo empresa seleccionada'); window.location='../Vista/contrato.php';</script>";  

                }
                
            }
            else{        
            
               echo"<script type=\"text/javascript\">alert('Por favor, seleccione una grupo empresa'); window.location='../Vista/contrato.php';</script>";  
            }
        }
        else
        {
             echo"<script type=\"text/javascript\">alert('Por favor, suba la plantilla del Contrato a su repositorio); window.location='../Vista/contrato.php';</script>";
                                
        }
    }
    
 
}
?>