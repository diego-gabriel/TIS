<?php

include '../Modelo/conexion.php';

//session_start();
//$UsuarioActivo = $_SESSION['usuario'];
$UsuarioActivo = $_POST['Usuario'];
$DocumentoR = $_POST['Documento'];

$rutaDirectorio="../Repositorio/$UsuarioActivo";  //ruta de nuestro directorio
//$asesor = $UsuarioActivo;   
$clas = new conexion();

    if(!file_exists($rutaDirectorio))
    {
        mkdir($rutaDirectorio, 0777);
    }
    
    $ruta = "$rutaDirectorio/" . $_FILES['archivoA']['name'];
            $rutaDocumento="/Repositorio/$UsuarioActivo/" . $_FILES['archivoA']['name'];
            //ahora movemos el archivo
            try{
            $resultado = move_uploaded_file($_FILES['archivoA']['tmp_name'], $ruta);
            if ($resultado) {
                
                //recuperamos la idRegistro siguiente que se insertara en la BD de registro para enviarlo a documento
                $resultadoUno=$clas->consulta("SELECT auto_increment FROM `information_schema`.tables WHERE TABLE_SCHEMA = 'tis_mbittle' AND TABLE_NAME = 'registro'");
                while ($filas = mysql_fetch_array($resultadoUno)) {
                    $idRegistro=(integer)$filas['0'];
                }
                
                $nombre = $_FILES['archivoA']['name'];
                $tamanio =(integer) $_FILES['archivoA']['size'];
                $visualizable=TRUE;
                $descargable=TRUE;
                date_default_timezone_set('America/La_Paz');
                $fecha=  date('Y-m-d');
                $hora=  date("G:H:i");
                $clas->consulta("INSERT INTO `registro` (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R)  VALUES ('$UsuarioActivo','documento subido','habilitado','$DocumentoR','$fecha','$hora')");
                $clas->consulta("INSERT INTO `documento` (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D) VALUES ($idRegistro,$tamanio,'$rutaDocumento','$visualizable','$descargable')");
                echo '<script>alert("Documento subido exitosamente");
                              location.href = "../Vista/inicio_grupo_empresa.php";
                      </script>';
                
            }
            }
             catch (Exception $e) {
                    echo 'Ha ocurrido un error: ',  $e->getMessage(), "\n";
                }
            
            
        //}
        //else
        //{
            //echo 'el formato de archivo o el tamanio de archivo no son permitidos';
        //}

$clas->cerrarConexion();
    
   


?>
