<?php
session_start();
// obtener variables
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];
$permiso="administrador";
$permiso2="asesor";
$permiso3="grupoEmpresa";
//crear conexion---------------------------
$conexion = mysql_connect("localhost","root","");
//Control
if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
//Seleccion
mysql_select_db("saetis",$conexion);
//Peticion
$peticion = mysql_query("SELECT u.NOMBRE_U, u.PASSWORD_U, r.ROL_R FROM usuario u, usuario_rol r
WHERE u.NOMBRE_U=r.NOMBRE_U");

while($fila = mysql_fetch_array($peticion))
{
	
	$usuariobd=$fila['NOMBRE_U'];
	$contrasenabd=$fila['PASSWORD_U'];
        $permisosenbase = $fila['ROL_R'];   

	if($usuario == $usuariobd && $contrasena == $contrasenabd && $permiso==$permisosenbase )
	{   
	//Si el resultado es positivo, entonces asignar

		
		$_SESSION['usuario'] = $usuario;
		$_SESSION['contrasena'] = $contrasena;
                $_SESSION['administrador'] = $permisosenbase;
		

		echo'

		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=principal.php">
                        
			</head>
		</html>

		';
          

	}
        else{
  	if($usuario == $usuariobd && $contrasena == $contrasenabd && $permiso2==$permisosenbase )
	{   
	//Si el resultado es positivo, entonces asignar

		
		$_SESSION['usuario'] = $usuario;
		$_SESSION['contrasena'] = $contrasena;
                $_SESSION['asesor'] = $permisosenbase;
		

		echo'

		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=inicio_asesor.php">
                        
			</head>
		</html>

		';
          

        }  else
            {
            	if($usuario == $usuariobd && $contrasena == $contrasenabd && $permiso3==$permisosenbase )
	{   
	//Si el resultado es positivo, entonces asignar

		
		$_SESSION['grupoEmpresa'] = $usuario;
		$_SESSION['contrasena'] = $contrasena;
                $_SESSION['administrador'] = $permisosenbase;
		

		echo'

		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=inicio_grupo_empresa.php">
                        
			</head>
		</html>

		';
          

	}
        else
            {
                       
            		echo'

		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=../index2.php">
                        
			</head>
		</html>

		';
            
            }
            }        
            
 
            
        }



}


//Cerramos base de datos

?>
