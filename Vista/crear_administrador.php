
<?php

session_start();

//Crear variables--------------------------


$contador = 0;

$addUsuario = $_POST['usuario'];
$addContrasena = $_POST['contrasena'];
$addNombre = $_POST['nombre'];
$addApellido = $_POST['apellido'];
$addTelefono = $_POST['telefono'];
$addEmail= $_POST['email'];




//comprobar si el usuario Existe
$conexion = mysql_connect("localhost","root","");
if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
mysql_select_db("saetis",$conexion);
$peticion1 = mysql_query("SELECT * FROM usuario");
$peticion2 = mysql_query("SELECT * FROM usuario_rol");
$peticion3 = mysql_query("SELECT * FROM asesor");
	while($fila = mysql_fetch_array($peticion1))
	{
		if($fila['NOMBRE_U']==$addUsuario)
		{
			$contador++;
		}
		else{}
	}
if($contador == 0){
//conexion-------------		
    
	$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
	//Peticion
	
        
        $peticion1 = mysql_query("INSERT INTO `saetis`.`usuario` (`NOMBRE_U`, `ESTADO_E`, `PASSWORD_U`, `TELEFONO_U`, `CORREO_ELECTRONICO_U`) VALUES ('$addUsuario', 'Habilitado', '$addContrasena', '$addTelefono', '$addEmail');");
        $peticion2 = mysql_query("INSERT INTO `saetis`.`usuario_rol` (`NOMBRE_U`, `ROL_R`) VALUES ('$addUsuario', 'administrador');");
        $peticion3 = mysql_query("INSERT INTO `saetis`.`administrador` (`NOMBRE_U`, `NOMBRES_AD`, `APELLIDOS_AD`) VALUES ('$addUsuario', '$addNombre ', '$addApellido');");
	
         //cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
         
    echo"<script type=\"text/javascript\">alert('el registro se realizo exitosamente'); window.location='principal.php';</script>";
	
 }
 else{
     
   echo"<script type=\"text/javascript\">alert('el login ya fue registrado por favor cambie de nombre'); window.location='registro_administrador.php';</script>";  
 }

