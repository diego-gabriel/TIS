<?php

include '../Modelo/conexion.php';

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
        $cc1="SELECT `NOMBRE_CORTO_GE` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nombreLargo'";            
        $aa1= $con->consulta($cc1);
        $vv1 =  mysql_fetch_array($aa1);
        $nombreCorto = $vv1[0]; 
        $asesor = 'Leticia Blanco';
        
        $cc2="SELECT `REPRESENTANTE_LEGAL_GE` FROM `grupo_empresa` WHERE `NOMBRE_LARGO_GE` = '$nombreLargo'";            
        $aa2= $con->consulta($cc2);
        $vv2 =  mysql_fetch_array($aa2);
        $representante = $vv2[0];
        //$sistema = "SISTEMA DE APOYO A LA EMPRESA TIS";
        //$convocatoria = "CPTIS-1707-2014";

        $buscar    = array(
            'empresa_nombre_largo' => '[[empresa-nombre-largo]]',
            'empresa_nombre_corto' => '[[empresa-nombre-corto]]',
            'rep_legal'            => '[[rep-legal]]',
            'asesor'               => '[[asesor]]',
            'fecha_actual'         => '[[fecha-actual]]',
            'hora_actual'          => '[[hora-actual]]',
         
        );


        $remplazo['empresa_nombre_largo'] = $nombreLargo;
        $remplazo['empresa_nombre_corto'] = $nombreCorto;
        $remplazo['rep_legal']            = $representante;
        $remplazo['asesor']               = $asesor;
        $remplazo['fecha_actual']         = date('Y/m/d');

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

        file_put_contents($tex,$texto);

        exec("pdflatex -interaction=nonstopmode $tex",$final);

        file_put_contents($tex, $textoAux);
        unlink($log);
        unlink($aux);
        rename("Contrato.pdf", $pdf);
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

