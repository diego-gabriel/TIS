!DOCTYPE html>
<?php
    //include '../Modelo/conexion.php';
    $conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	mysql_select_db("saetis",$conexion);
   session_start();
 $UsuarioActivo = $_SESSION['usuario'];

?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Apoyo a la Empresa TIS</title>

    <!-- Core CSS - Include with every page -->
    <link href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
   

    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="../Librerias/js/subir_documento.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

   
    <div id="wrapper">
       
        
        <!--<h2>design by <a href="#" title="flash templates">flash-templates-today.com</a></h2>-->
        
    
               
	
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio_asesor.php">Inicio </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $UsuarioActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
  
                        <li><a href="modificar_asesor.php"><i class="fa fa-user fa-fw"></i> Modificar Datos personales</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="unlog.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="AdministrarGrupoEmpresa.php"><i class="fa fa-book"></i> Administrar Grupo Empresas</a>
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-files-o "></i> Documentos <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                            <a href="../Vista/subirarchivoasesor.php">Subir Documentos</a>
                                </li>
                                <li>
                                    <a href="../Vista/RegistrarDocumentosRequeridos.php">Registrar Documentos</a>
                                </li>
                                
                                <li>
                                    <a href="#">Publicaci&oacute;n Documentos <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
                                        
                                        <li>
                                            <a href="../Vista/publicar_asesor.php">Nueva Publicaci&oacute;n </a>
                                        </li>
                                        <li>
                                            <a href="../Controlador/publicaciones.php">Publicaciones </a>
                                        </li>
                                       
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Recepci&oacute;n Documentos <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="documentos_recibidos.php">Documentos Recibidos</a>
                                        </li>
                                        <li>
                                            <a href="ConfiguracionFechasRecepcion.php" ><span class="fa fa-calendar-o"></span> Configuraci&oacute;n de Fechas para la Recepci&oacute;n de Documentos</a>
                                            
                                        </li>
         
                                    </ul>
                                </li>
                               
                            </ul>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                         <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="contrato.php">Emitir Contrato </a>
                                </li>
                                <li>
                                    <a href="ordenDeCambio.php">Emitir Orden de Cambio</a>
                                </li>
                                <li>
                                    <a href="notificacion_conformidad.php">Emitir Notificaci&oacute;n de Conformidad</a>
                                </li>
                                <li>
                                    <a href="InscripcionProyecto.php">Registrar Proyecto</a>
                                </li>
                                <li>
                                    <a href="#">Seguimiento Grupo Empresa <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
                                        <li>
                                            <a id="Seguimiento" href="#">Seguimiento</a>
                                        </li>
  
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                        <a href="#">Evaluacion Grupo Empresa<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="../Vista/CrearModalidadEvaluacion.php">Criterio de Evaluaci&oacute;n </a>                             
                                                </li>
                                                
                                                <li>
                                                    <a href="#">Criterio de Calificaci&oacute;n<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        <li>
                                                            <a href="../Vista/CrearModalidadCalificacion.php"> Crear Criterio de Calificaci&oacute;n</a>
                                                        </li>
                                                        <li>
                                                            <a href="../Vista/EliminarCriterioCalificacion.php"> Eliminar Criterio de Calificaci&oacute;n</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                 
                                                <li>
                                                    <a href="#">Formulario de Evaluacion<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        <li>
                                                            <a href="../Vista/CrearFormulario.php">Crear Formulario de Evaluacion</a>
                                                        </li>
                                                        <li>
                                                            <a href="../Vista/SeleccionarFormulario.php"> Habilitar Formulario de Evaluacion </a>   
                                                        </li>
                                                        <li>
                                                            <a href="../Vista/EliminarFormulario.php">Eliminar Formulario de Evaluacion</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="../Vista/EvaluarGrupoEmpresa.php">Evaluar Grupo Empresa </a>   
                                                </li>
                                            </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                              <a href="lista_doc_subidos.php"><i class="fa fa-tasks fa-fw"></i>Documentos Subidos </a>  
                                              
                          </li>
                      
                        <li>
                            <a href="lista-de-noticias.php"><i class="fa fa-comment"></i> Foro</a>
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div class="modal fade modalRegistroAsistencia" role="dialog" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Asistencia</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade modalRegistroReportes" role="dialog" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Reportes</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>
       
  <!---------------------------------------------------------------------------------------------->
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   
                    <div class="col-lg-6" >
                         <div class="mainbar">
                                            <div class="article"><br><br>
                            <h2><span>Foro</span></h2>   
                            
                        </div>
                        
                    </div>
                        <?php

include('config.php');

$id = $_GET['id'];
// Adiciona +1 de Visualizaciones a cada pessoa que acessar a noticia
$views_db = mysql_query("SELECT * FROM noticias WHERE ID_N = '$id'");
$row = mysql_fetch_array($views_db);
$view = $row['VIEWS'];
$views = $view + 1;
$views_db = mysql_query("UPDATE noticias SET VIEWS = '$views' WHERE ID_N = '$id'");

// Seleciona  noticia 
$selecionar_db = "SELECT * FROM noticias WHERE ID_N = '$id'";
$final = mysql_query($selecionar_db);

// Pega los valores de noticia noticia
while ($new=mysql_fetch_array($final)) { 
$id = $new["ID_N"];
$autor = $new["NOMBRE_U"];
$titulo = $new["TITULO"];
$date = $new["FECHA_N"];
$views = $new["VIEWS"];
$texto = $new["TEXTO"];


$comentarios_db = "SELECT * FROM comentarios WHERE ID_N='$id'";
$comentarios_db = mysql_query($comentarios_db);
$comentarios = mysql_num_rows($comentarios_db);



echo "<title>$titulo</title>";
echo "<h1>$titulo</h1><p>Postado por <b>$autor</b>  <b>$date</b> - <b>$views</b> Visualizaciones | <b>$comentarios</b> Comentarios | ";
//echo "______________________________________________________________________________________________________________________________________________________________________";
?>
 <div class="mainbar">
                                            <div class="article"><br><br>
                            <h2><span>Comentarios</span></h2>   
                            
                        </div>

<?php
}


$id = $_GET['id'];
$selecionar_db_comentarios = "SELECT * FROM comentarios WHERE ID_N = '$id' ORDER BY ID_N DESC";
$selecionar_db_comentarios_final = mysql_query($selecionar_db_comentarios);

// muestra los valores da tabla 'comentarios'
while ($comentario_db=mysql_fetch_array($selecionar_db_comentarios_final)) { 
$id = $comentario_db["ID_C"];
$autor = $comentario_db["NOMBRE_U"];
$nor = $comentario_db["ID_N"];
$comentario = $comentario_db["COMENTARIO"];
$date = $comentario_db["FECHA_C"];
$autor_c=$comentario_db["AUTOR_C"];

echo "<b>$autor_c</b> el <b>$date</b> comento:$comentario</br>";
echo "</br>";
}
?>
______________________________________________________________________________________________________________________________________________________________________
<h3>Comentar:</h3>
<?php
// Mensage  campos vacios
if (!empty($_POST) AND empty($_POST['comentario'])) {
    echo "<font color=\"#ff0000\">Por Favor llene los campos vacios</font>";
} else {
//$id = $_GET['id'];
    if (empty($_POST['comentario'])) { $mensagem="";} else { $mensagem=$_POST['comentario'];}
//$mensagem = $_POST["comentario"];o

if($mensagem == ""){} else {
// Adiciona comentario
    
$comentario_add = "INSERT INTO comentarios (NOMBRE_U,ID_N,COMENTARIO,FECHA_C,AUTOR_C) VALUES ('$autor','".addslashes(mysql_real_escape_string($_GET['id']))."', '".addslashes(mysql_real_escape_string(strip_tags($_POST['comentario'])))."', NOW(), '$UsuarioActivo')";

$comentario_add = mysql_query($comentario_add)
or die ("Error al Adicionar Comentario.");
//echo "Comentario Adicionado  | <a  class='link-dos' href=\"noticia.php?id=".$_GET['id']."\">Actualizar Página para ver su comentario</a>";
echo'
    <html>
    <head>
        <meta http-equiv="REFRESH" content="0;url=lista_asesores.php">
    </head>
    </html>

    ';
?>

<script>
  location.href="noticia.php?id=<?php echo $_GET['id']; ?>";
</script>
<?php
}
}

?>
<form name="input" action="noticia.php?id=<?php echo $_GET['id']; ?>" method="post">

<label>Comentario:</label>
<br>
<textarea name="comentario" rows="5" cols="50"></textarea>
<br>
<br>
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <input type="submit" class="btn btn-primary" value="Enviar Comentario">
</form>
                      
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="../Librerias/js/jquery-1.10.2.js"></script>
    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="../Librerias/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../Librerias/js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>

</body>

</html>