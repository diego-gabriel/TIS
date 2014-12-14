<?php

include '../Modelo/conexion.php';
session_start();
$con = new conexion();

if (isset($_POST['grupoempresa'])) {
    
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
        $nombreCorto =  mysql_fetch_array($consulta)[0];

        $nombreUA = $_SESSION['usuario'] ;
        $nomAp = $con->consulta("SELECT NOMBRES_A, APELLIDOS_A FROM asesor WHERE NOMBRE_U =  '$nombreUA' ");
        $nombreAp = mysql_fetch_row($nomAp);
        $asesor = $nombreAp[0]." ".$nombreAp[1] ;
        
        
        $seleccion = "SELECT `REPRESENTANTE_LEGAL_GE` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nombreLargo'";            
        $consultar= $con->consulta($seleccion);
        $representante = mysql_fetch_array($consultar)[0];
        
        $selNombreU = "SELECT `NOMBRE_U` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nombreLargo'";            
        $conNombU= $con->consulta($selNombreU);
        $nombreUGE = mysql_fetch_array($conNombU)[0];

        
        $selProyecto = "SELECT p.`NOMBRE_P` FROM `proyecto` AS p, `inscripcion_proyecto` AS ip WHERE ip.`NOMBRE_U` = '$nombreUGE' AND ip.`CODIGO_P` = p.`CODIGO_P`";
        $conProy= $con->consulta($selProyecto);
        $sistema = mysql_fetch_array($conProy)[0];
        
        $sistema = "SISTEMA";//SISTEMA DE APOYO A LA EMPRESA TIS
        //$convocatoria = "CPTIS-1707-2014";

        $buscar    = array(
            'empresa_nombre_largo' => '[[empresa-nombre-largo]]',
            'empresa_nombre_corto' => '[[empresa-nombre-corto]]',
            'rep_legal'            => '[[rep-legal]]',
            'asesor'               => '[[asesor]]',
            'fecha_actual'         => '[[fecha-actual]]',
            'hora_actual'          => '[[hora-actual]]',
            'sistema'              => '[[sistema]]',
         
        );


        $remplazo['empresa_nombre_largo'] = $nombreLargo;
        $remplazo['empresa_nombre_corto'] = $nombreCorto;
        $remplazo['rep_legal']            = $representante;
        $remplazo['asesor']               = $asesor;
        $remplazo['fecha_actual']         = date('Y/m/d');
        $remplazo['sistema']              = $sistema;
        
        $ruta = "..\\Repositorio\\asesor";
        
        chdir($ruta);
        
        $id = "Contrato";
        $tex = $id.".tex"; 
        $log = $id.".log"; 
        $aux = $id.".aux";
        $nombCorto = str_replace(' ', '', $nombreCorto);
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
        
        file_put_contents($tex,$texto);

        exec("pdflatex -interaction=nonstopmode $tex",$final);

        file_put_contents($tex, $textoAux);
        unlink($log);
        unlink($aux);
        
        $rutaDirectorio="../".$nombreUA."/Contratos/";

        $file = "Contrato".'_'.$nombreUA.'.pdf';
        
        if (!file_exists($rutaDirectorio)) 
        {
            mkdir($rutaDirectorio, 0777,TRUE);
        }
                                   
        rename("Contrato.pdf", $file);
        rename($file, $rutaDirectorio.$pdf );
        
        //rename("Contrato.pdf", $pdf);
        //$rutaCompleta=$ruta.'/'.$pdf;
        
        
        
        header("location:../Vista/contrato.php");
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

?>

