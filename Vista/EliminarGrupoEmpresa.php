<?php  

include '../Modelo/conexion.php';
$conect = new conexion();

$GrupoEmpresa = $_GET['id_us'];

$SeleccionarIdRegistroGE = $conect->consulta("SELECT ID_R FROM registro WHERE NOMBRE_U='$GrupoEmpresa'");
$IdRegistroGE = mysql_fetch_row($SeleccionarIdRegistroGE);

if(isset($_GET['op']))
{
	$operacion = $_GET['op'];

	if($operacion == 'si')
	{
   
		//Eliminar Los puntajes
		$SeleccionarIdFormulario = $conect->consulta("SELECT ID_N FROM nota WHERE NOMBRE_U='$GrupoEmpresa'"); 

		$IdFormulario = mysql_fetch_row($SeleccionarIdFormulario);



		$EliminarPuntajes = $conect->consulta("DELETE FROM puntaje_ge WHERE ID_N = '$IdFormulario[0]'");
		//Eliminar nota
		$EliminarNotaGE = $conect->consulta("DELETE FROM nota WHERE NOMBRE_U = '$GrupoEmpresa' ");



                /****************************************************/
                $SeleccionarIdRegistroGE = $conect->consulta("SELECT ID_R FROM registro WHERE NOMBRE_U='$GrupoEmpresa'");
        
                while ($rowIdRegistroGE = mysql_fetch_row($SeleccionarIdRegistroGE))
                {
                    //Eliminar de documento
                    $EliminarDocumentoGE = $conect->consulta("DELETE FROM documento WHERE ID_R = '$rowIdRegistroGE[0]' ");
                    $EliminarFechaRealizacion = $conect->consulta("DELETE FROM fecha_realizacion WHERE ID_R='$rowIdRegistroGE[0]'");

                    //Eliminar de entrega
                    $EliminarEntregaGE = $conect->consulta("DELETE FROM entrega WHERE ID_R='$rowIdRegistroGE[0]'");

                    //Eliminar de asistencia//con id registro
                    $EliminarAsistencia = $conect->consulta("DELETE FROM asistencia WHERE ID_R='$rowIdRegistroGE[0]'");
                    $EliminarPago = $conect->consulta("DELETE FROM pago WHERE ID_R='$rowIdRegistroGE[0]'");
                    $EliminarReporte = $conect->consulta("DELETE FROM reporte WHERE ID_R='$rowIdRegistroGE[0]'");


                }
                /*****************************************************/


            
		//Eliminar Registro
		$EliminarRegistroGE = $conect->consulta("DELETE FROM registro WHERE NOMBRE_U = '$GrupoEmpresa' ");
		//Eliminar Planificacion
		$EliminarPrecio = $conect->consulta("DELETE FROM precio WHERE NOMBRE_U='$GrupoEmpresa'");
		//Eliminar Entregable
		$EliminarEntregable = $conect->consulta("DELETE FROM entregable WHERE NOMBRE_U='$GrupoEmpresa'");
		$EliminarPlanificacionGE = $conect->consulta("DELETE FROM planificacion WHERE NOMBRE_U = '$GrupoEmpresa' ");


		
		
		
		//comentarios
		$EliminarComentarioGE = $conect->consulta("DELETE FROM comentarios WHERE NOMBRE_U = '$GrupoEmpresa' ");
		//noticia
		$EliminarNoticia = $conect->consulta("DELETE FROM noticias WHERE NOMBRE_U = '$GrupoEmpresa' ");
	
		//inscripcion
		$EliminarInscripcionGE = $conect->consulta("DELETE FROM inscripcion WHERE NOMBRE_UGE = '$GrupoEmpresa' ");
		//inscripcion_proyecto
		$EliminarInscripcionProyecto = $conect->consulta("DELETE FROM inscripcion_proyecto WHERE NOMBRE_U = '$GrupoEmpresa' ");
		//sesion
		$EliminarSesionGE = $conect->consulta("DELETE FROM sesion WHERE NOMBRE_U = '$GrupoEmpresa' ");
		//Eliminar Socios
		$EliminarSocioGE = $conect->consulta("DELETE FROM socio WHERE NOMBRE_U = '$GrupoEmpresa' ");
	
		//grupo_empresa
		$EliminarGE =$conect->consulta("DELETE FROM grupo_empresa WHERE NOMBRE_U = '$GrupoEmpresa' ");
		//Eliminar de usuario_rol
		$EliminarRolGE = $conect->consulta("DELETE FROM usuario_rol WHERE NOMBRE_U = '$GrupoEmpresa' ");
		//elimiar de usuario
		$EliminarUsuarioGE = $conect->consulta("DELETE FROM usuario WHERE NOMBRE_U = '$GrupoEmpresa' ");


		echo '<script>alert("Se elimino la grupo empresa correctamente!!")</script>';
		echo '<script>window.location="../Vista/ListaGrupoEmpresas.php";</script>';
		die();
	}

	if($operacion == 'no')
	{
		header('location:../Vista/ListaGrupoEmpresas.php');
                die();
	}

}

if(is_array($IdRegistroGE))
{
	echo '<script>

			var pagina =  "EliminarGrupoEmpresa.php?id_us='.$GrupoEmpresa.'&op=si"
			var pagina2 = "EliminarGrupoEmpresa.php?id_us='.$GrupoEmpresa.'&op=no"
			if(confirm("La grupo empresa tiene registros...desea eliminarla de todas formas??"))
			{

				location.href = pagina
			}
			else{

				location.href = pagina2
			}
		  </script>';


}
else
{

	$SeleccionarIdFormulario = $conect->consulta("SELECT ID_N FROM nota WHERE NOMBRE_U='$GrupoEmpresa'"); 
	$IdFormulario = mysql_fetch_row($SeleccionarIdFormulario);
	$EliminarPuntajes = $conect->consulta("DELETE FROM puntaje_ge WHERE ID_N = '$IdFormulario[0]'");
	$EliminarNotaGE = $conect->consulta("DELETE FROM nota WHERE NOMBRE_U = '$GrupoEmpresa' ");
	
	$EliminarPlanificacionGE = $conect->consulta("DELETE FROM planificacion WHERE NOMBRE_U = '$GrupoEmpresa' ");
	$EliminarNoticia = $conect->consulta("DELETE FROM noticias WHERE NOMBRE_U = '$GrupoEmpresa' ");

    $EliminarComentarioGE = $conect->consulta("DELETE FROM comentarios WHERE NOMBRE_U = '$GrupoEmpresa' ");

    $EliminarInscripcionProyecto = $conect->consulta("DELETE FROM inscripcion_proyecto WHERE NOMBRE_U = '$GrupoEmpresa' ");
    $EliminarInscripcionGE = $conect->consulta("DELETE FROM inscripcion WHERE NOMBRE_UGE = '$GrupoEmpresa' ");
    $EliminarSesionGE = $conect->consulta("DELETE FROM sesion WHERE NOMBRE_U = '$GrupoEmpresa' ");
    $EliminarSocioGE = $conect->consulta("DELETE FROM socio WHERE NOMBRE_U = '$GrupoEmpresa' ");
    $EliminarGE =$conect->consulta("DELETE FROM grupo_empresa WHERE NOMBRE_U = '$GrupoEmpresa' ");
    $EliminarRolGE = $conect->consulta("DELETE FROM usuario_rol WHERE NOMBRE_U = '$GrupoEmpresa' ");
    $EliminarUsuarioGE = $conect->consulta("DELETE FROM usuario WHERE NOMBRE_U = '$GrupoEmpresa' ");

	echo '<script>alert("Se elimino la grupo empresa correctamente!!")</script>';
	echo '<script>window.location="../Vista/ListaGrupoEmpresas.php";</script>';

}

?>	