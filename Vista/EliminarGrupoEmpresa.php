<?php  

include '../Modelo/conexion.php';
$conect = new conexion();
$GrupoEmpresa = $_GET['id_us'];

//comentarios
$EliminarComentarioGE = $conect->consulta("DELETE FROM comentarios WHERE NOMBRE_U = '$GrupoEmpresa' ");

//Eliminar Los puntajes
$SeleccionarIdFormulario = $conect->consulta("SELECT ID_N FROM NOTA WHERE NOMBRE_U='$GrupoEmpresa'"); 

$IdFormulario = mysql_fetch_row($SeleccionarIdFormulario);

$EliminarPuntajes = $conect->consulta("DELETE FROM PUNTAJE_GE WHERE ID_N = '$IdFormulario[0]'");
//Eliminar nota
$EliminarNotaGE = $conect->consulta("DELETE FROM nota WHERE NOMBRE_U = '$GrupoEmpresa' ");

//Eliminar Socios
$EliminarSocioGE = $conect->consulta("DELETE FROM socio WHERE NOMBRE_U = '$GrupoEmpresa' ");
//inscripcion
$EliminarInscripcionGE = $conect->consulta("DELETE FROM inscripcion WHERE NOMBRE_UGE = '$GrupoEmpresa' ");
//grupo_empresa
$EliminarGE =$conect->consulta("DELETE FROM grupo_empresa WHERE NOMBRE_U = '$GrupoEmpresa' ");
//sesion
$EliminarSesionGE = $conect->consulta("DELETE FROM sesion WHERE NOMBRE_U = '$GrupoEmpresa' ");
//Eliminar de usuario_rol
$EliminarRolGE = $conect->consulta("DELETE FROM usuario_rol WHERE NOMBRE_U = '$GrupoEmpresa' ");

//Eliminar de Registro
$SeleccionarIdRegistroGE = $conect->consulta("SELECT ID_R FROM REGISTRO WHERE NOMBRE_U='$GrupoEmpresa'");
$IdRegistroGE = mysql_fetch_row($SeleccionarIdRegistroGE);

//Eliminar de documento
$EliminarDocumentoGE = $conect->consulta("DELETE FROM documento WHERE ID_R = '$IdRegistroGE[0]' ");
$EliminarFechaRealizacion = $conect->consulta("DELETE FROM fecha_realizacion WHERE ID_R='$IdRegistroGE'");
$EliminarRegistroGE = $conect->consulta("DELETE FROM registro WHERE NOMBRE_U = '$GrupoEmpresa' ");
//elimiar de usuario
$EliminarUsuarioGE = $conect->consulta("DELETE FROM usuario WHERE NOMBRE_U = '$GrupoEmpresa' ");

//Eliminar Planificacion
$EliminarPlanificacionGE = $conect->consulta("DELETE FROM planificacion WHERE NOMBRE_U = '$GrupoEmpresa' ");

/*********************************************/
//Eliminar de entrega??
//Eliminar Entregable
$EliminarEntregable = $conect->consulta("DELETE FROM entregable WHERE NOMBRE_U='$GrupoEmpresa'");

echo '<script>alert("Se Elimino a la Grupo Empresa Correctamente");</script>';
echo '<script>window.location="../Vista/ListaGrupoEmpresas.php";</script>';
?>