<?php
//$ds          = DIRECTORY_SEPARATOR;  //Para no preocuparnos de la plataforma en la que se implemente
require('registro.php');
require('guardarDocumento.php');

$rutaDirectorio = '../../Repositorio/asesor/';   //ruta de nuestro directorio
$asesor = 'leticia';    

    if(!file_exists($rutaDirectorio))
    {
    mkdir($rutaDirectorio, 0777);
    }
    if (!empty($_FILES)) {
    
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    
    $targetPath = dirname( __FILE__ ) . $rutaDirectorio ;  //absolute path of the destination folder.
    
    $targetFile =  $targetPath. $_FILES['file']['name'];  //absolute path of the uploaded file destination.
    
    $subido = move_uploaded_file($tempFile,$targetFile); //6
    
       if ($subido) {
                
                
                $nombre = $_FILES['file']['name'];
                $tamanio =(integer) $_FILES['file']['size'];
                date_default_timezone_set('America/La_Paz');
                $fecha=  date('Y-m-d');
                $hora=  date("G:H:i");
                
                $registro= new Registro($asesor,'documento subido','habilitado',$nombre,$fecha,$hora);
                $idRegistro = $registro->getIdRegistro();
                $documento = new GuardarDocumento($idRegistro,$tamanio,$rutaDocumento,TRUE,TRUE);
                


                
        }
    }

?>    
 