!DOCTYPE html>
<?php
    include '../Modelo/conexion.php';
    $conexion = mysql_connect("localhost","root","");
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
            
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $UsuarioActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                       <li><a href="unlog.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                                    <a href="CrearModalidadEvaluacion.php">Criterio de Evaluaci&oacute;n </a>                             
                                                </li>
                                                <li>
                                                    <a href="CrearModalidadCalificacion.php"> Criterio de Calificaci&oacute;n</a>
                                                </li>
                                                 <li>
                                                    <a href="EliminarCriterioCalificacion.php"> Eliminar Criterio de Calificaci&oacute;n</a>
                                                </li>
                                                <li>
                                                    <a href="CrearFormulario.php">Crear Formulario de Evaluacion</a>
                                                </li>
                                                <li>
                                                    <a href="EliminarFormulario.php">Eliminar Formulario de Evaluacion</a>
                                                </li>
                                                <li>
                                                    <a href="SeleccionarFormulario.php"> Seleccionar Formulario de Evaluacion </a>   
                                                </li>
                                                <li>
                                                    <a href="EvaluarGrupoEmpresa.php">Evaluar Grupo Empresa </a>   
                                                </li>
                                            </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                     
                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i> Actividades<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                          <li>
                              <a href="#"><i class="fa fa-tasks fa-fw"></i>Informacion Personal<span class="fa arrow"></span> </a>  
                                              <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="modificar_asesor.php">Modificar Datos Personales </a>                             
                                                </li>       
                                            </ul>
                          </li>
                          <li>
                            <a href="lista-de-noticias.php"><i class="fa fa-comment"></i> Foro</a>
                         </li>
                          <li>
                            <a href="#"><i class="fa fa-question-circle fa-fw"></i> Ayuda <span class="fa arrow"></span></a>
   
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    
<!-------------------------------------------NUEVAS PUBLICACIONES------------------------------------------>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">FORO</h2>
                    <div class="col-lg-12" >

                          <div class="panel panel-default">
                        <div class="panel-heading">
                            <i ></i><h2> Temas</h2>
                        </div>
                            


                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">

                                   <?php
 

                                       // include('config.php');
                                         // Seleciona la tabla de noticias
                                        $selecionar_db = "SELECT * FROM noticias ORDER BY ID_N DESC";

                                        $final = mysql_query($selecionar_db)
                                        or die ("<h1>Error</h1>");


                                        while ($noticias=mysql_fetch_array($final)) { 
                                        $id = $noticias["ID_N"];
                                        $usuario = $noticias["NOMBRE_U"];
                                        $titulo = $noticias["TITULO"];

                                        $f = $noticias["FECHA_N"];

                                        $views = $noticias["VIEWS"];



                                     // numero de comentarios
                                      $comentarios_db = "SELECT * FROM comentarios WHERE ID_N='$id'";
                                      $comentarios_db = mysql_query($comentarios_db);
                                      $comentarios = mysql_num_rows($comentarios_db);

                                    ?>



                                <a href="#" class="list-group-item">
                                    <i ></i> <p size="5"><font size="3"><b><?php echo $titulo?></b><p></p>
                                    <i ></i> Posteado por <b><?php echo $usuario?></b> -
                                    <i ></i> <b> <?php echo $views?></b> Visualizaciones -
                                    <i ></i> <b><?php echo $comentarios?></b> Comentarios -
                                   
                                    <i ></i> <?php echo $f?>
                                    <span class="pull-right text-muted small"><em><?php echo "<td> <a  class='link-dos'href=\"excluir-noticia.php?id=$id\">Eliminar</a></td>"; ?></em>
                                    </span>
                                    <span class="pull-right text-muted small"><em><?php echo"<td> <a  class='link-dos' href=\"noticia.php?id=$id\">Ver </a></td>";?></em>
                                    </span>
                                </a>
                                
                                <?php
                                 }
                                 ?>
                                
                            </div>
                            <!-- /.list-group -->
                           <!--<a href="#" class="btn btn-default btn-block">Ver Todas las Alertas</a>-->
                        </div>
                        <!-- /.panel-body -->
                    </div>





                       
      
            

            
<br>
<b><a  class='link-dos' href="adicionar-noticia.php">Adicionar nuevo  tema</a></b>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        

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