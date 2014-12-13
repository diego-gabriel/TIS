<?php

include '../Modelo/conexion.php';
session_start();
$conect = new conexion();
         $UsuarioActivo = $_SESSION['usuario'];
         $grupo=$_POST['grupoempresa'];
         $identificador="*";
	
	if(isset($_POST["enviar"])){
            $titulo      = $_POST["campoTitulo"];
            $descripcion   = $_POST["campoDescripcion"];
            $fechap   = $_POST["fecha1"];
            $horap        = $_POST["hora1"];
            $ruta        = $_POST["recurso"];
            $tam=strlen($ruta);
            $new_ruta=substr($ruta, 16,$tam-1);
            $eshora=strftime($horap).":00";

            $fecha       = date('Y-m-d');
            $hora        =  date("G:H:i");
            $des=$descripcion;
            $visualizable="TRUE";
            $descargable="TRUE";	
	}
        echo $eshora."</br>";
	echo $fechap;
	//echo $horap;		 
	$comentario_add = $conect->consulta("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('$UsuarioActivo','publicaciones','Habilitado','$titulo','$fecha','$hora')")or
			die("Error al s");
//var_dump($comentario_add);
	$query= $conect->consulta("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
 if ($row = mysql_fetch_row($query)) 
 {
   $id = trim($row[0]);
 }
 var_dump($row);
 echo $id;
 $guardar_doc = $conect->consulta("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D)
		VALUES('$id','1024','$ruta','$visualizable','$descargable')");
 $des_D=$conect->consulta("INSERT INTO descripcion (ID_R,DESCRIPCION_D)
		VALUES('$id','$descripcion')");
  $destinatario=$conect->consulta("INSERT INTO receptor (ID_R,RECEPTOR_R)
		VALUES('$id','$grupo')");
$guardar = $conect->consulta("INSERT INTO periodo (ID_R,fecha_p,hora_p) VALUES ('$id','$fechap','$horap')") or
			die("Error al s");

        header("location:../Vista/publicar_asesor.php");
	
?>