<?php
//header('Location: http://localhost/ProyectoSprint3/Vista/publicar_asesor.php'); 
	//require_once('../Modelo/publicacion_class.php');
	
	
	 $conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	mysql_select_db("saetis",$conexion);
   
    //$con=new conexion();
$ana=$_POST['grupoempresa'];
$identificador="*";
	
	if(isset($_POST["enviar"])){
	
	
	$titulo      = $_POST["campoTitulo"];
	$descripcion   = $_POST["campoDescripcion"];
	$fechap   = $_POST["fecha1"];
	$horap        = $_POST["hora1"];
	$ruta        = $_POST["recurso"];
$eshora=strftime($horap).":00";
	$fecha       = date('Y-m-d');
	$hora        =  date("G:H:i");
	$des=$descripcion.$identificador.$ana;
	$visualizable="TRUE";
	$descargable="TRUE";
		
		
	}
	echo $fecha."</br>";
	echo $hora."</br>";
//$publicacion = new Publicacion('leticia','publicaciones','habilitado',$titulo,$fecha,$hora,1024,$ruta,TRUE,TRUE,$des);
	echo $eshora;
	echo $fechap;
	//echo $horap;		 
	$comentario_add = mysql_query("INSERT INTO registro (NOMBRE_U,TIPO_T,ESTADO_E,NOMBRE_R,FECHA_R,HORA_R) VALUES ('leticia','publicaciones','habilitado','$titulo','$fecha','$hora')")or
			die("Error al s");
var_dump($comentario_add);
	$query= mysql_query("SELECT MAX(ID_R) AS 'ID_R' FROM registro");
 if ($row = mysql_fetch_row($query)) 
 {
   $id = trim($row[0]);
 }
 var_dump($row);
 echo $id;
 $guardar_doc = mysql_query("INSERT INTO documento (ID_R,TAMANIO_D,RUTA_D,VISUALIZABLE_D,DESCARGABLE_D)
		VALUES('$id','1024','$ruta','$visualizable','$descargable')");
 $des_D=mysql_query("INSERT INTO descripcion (ID_R,DESCRIPCION_D)
		VALUES('$id','$des')");
$guardar = mysql_query("INSERT INTO `saetis`.`periodo` (ID_R,fecha_p,hora_p) VALUES ('$id','$fechap','$eshorap')") or
			die("Error al s");
 //$guardar = mysql_query("INSERT INTO `saetis`.`descripcion` (ID_R,DESCARGABLE_D) VALUES ('$id','$des')");
var_dump($guardar);
	
	echo $titulo."</br>";
	echo $id;
	mysql_close($conexion);
	
 //echo"<script type=\"text/javascript\">alert('el registro se realizo exitosamente');
?>