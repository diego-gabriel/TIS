<?php
      include '../Modelo/conexion.php';
    $conectar = new conexion();
session_start();
// obtener variables
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];
$permiso="administrador";
$permiso2="asesor";
$permiso3="grupoEmpresa";
//crear conexion---------------------------

//Peticion
$peticion =$conectar->consulta("SELECT u.NOMBRE_U,u.ESTADO_E, u.PASSWORD_U, r.ROL_R FROM usuario u, usuario_rol r
WHERE u.NOMBRE_U=r.NOMBRE_U");

$peticion1 = $conectar->consulta("SELECT `LOGIN_S`,`PASSWORD_S` FROM `socio`");


while(($fila = mysql_fetch_array($peticion)) or ($fila = mysql_fetch_array($peticion1)))
{
	
	$usuariobd=$fila['NOMBRE_U'];
        $estadobd=$fila['ESTADO_E'];
	$contrasenabd=$fila['PASSWORD_U'];
        $permisosenbase = $fila['ROL_R'];   


	if($usuario == $usuariobd && $contrasena == $contrasenabd && $permiso==$permisosenbase && "Habilitado" == $estadobd )
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
  	if($usuario == $usuariobd && $contrasena == $contrasenabd && $permiso2==$permisosenbase && "Habilitado" == $estadobd )
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
            	if($usuario == $usuariobd && $contrasena == $contrasenabd && $permiso3==$permisosenbase && "Habilitado" == $estadobd )
	{   
	//Si el resultado es positivo, entonces asignar

		
		$_SESSION['usuario'] = $usuario;
		$_SESSION['contrasena'] = $contrasena;
                $_SESSION['grupoEmpresa'] = $permisosenbase;
		

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
            
               while($fila = mysql_fetch_array($peticion1))
{
		$sociol=$fila['LOGIN_S'];
	     $sociop=$fila['PASSWORD_S'];

         if($usuario == $sociol && $contrasena == $sociop )
	{   
	//Si el resultado es positivo, entonces asignar

		
		$_SESSION['usuario'] = $usuario;
		$_SESSION['contrasena'] = $contrasena;
                $_SESSION['socio'] = $permisosenbase;
		

		echo'

		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=inicio_grupo_empresa.php">
                        
			</head>
		</html>

		';
          

	}else{
                       
            		echo'

		<html>
			<head>
				<meta http-equiv="REFRESH" content="1;url=../index.php">
                        
			</head>
		</html>

		';
            
               }
                    
            
 
            
          }

                   
            
      }
                   
            
 
            
   }



 }




}
//Cerramos base de datos

?>
