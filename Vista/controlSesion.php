<?php
    

$usuariolog = $_SESSION['usuario'];
$contrasenalog = $_SESSION['contrasena'];

//Crear variables--------------------------

 $hora = date("h:i:s");
$fecha= date ("Y-m-d");
 

@$ip = getenv(REMOTE_ADDR);
$navegador = $_SERVER["HTTP_USER_AGENT"];
//conexion-------------		
    
	$conexion = mysql_connect("192.168.2.5","mbittle","5rtZAGYq");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("tis_mbittle",$conexion);
	//Peticion
	$peticion = mysql_query("INSERT INTO `sesion` (`ID_S`, `NOMBRE_U`, `FECHA_S`, `HORA_S`, `IP_S`)"
                . " VALUES (NULL, '$usuariolog', '$fecha', '$hora', '$ip');");
	//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------

?>
